<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class SimpleLogRotation extends Command
{
    protected $signature = 'logs:simple-rotate 
                            {--dry-run : Show what would happen without actually rotating}
                            {--keep=5 : Number of old log tables to keep}';

    protected $description = 'Rotate logs by renaming current table and creating a new one';

    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $keepTables = (int) $this->option('keep');
        
        $currentTable = 'logs';
        $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
        $archivedTable = "logs_archived_{$timestamp}";

        $this->info("Simple Log Rotation");
        $this->info("Current table: {$currentTable}");
        $this->info("Will be renamed to: {$archivedTable}");

        // Check if logs table exists and has data
        if (!Schema::hasTable($currentTable)) {
            $this->error("Table '{$currentTable}' does not exist!");
            return 1;
        }

        $recordCount = DB::table($currentTable)->count();
        $this->info("Records in current table: {$recordCount}");

        if ($recordCount === 0) {
            $this->warn("Current logs table is empty. No rotation needed.");
            return 0;
        }

        if ($dryRun) {
            $this->warn("DRY RUN: No actual changes will be made.");
            $this->line("Would rename '{$currentTable}' to '{$archivedTable}'");
            $this->line("Would create new '{$currentTable}' table");
            
            // Show cleanup info
            $oldTables = $this->getOldLogTables();
            if (count($oldTables) >= $keepTables) {
                $tablesToDelete = array_slice($oldTables, $keepTables);
                $this->line("Would delete old tables: " . implode(', ', $tablesToDelete));
            }
            
            return 0;
        }

        // Confirm the action
        if (!$this->confirm("Are you sure you want to rotate the logs table? This will rename the current table and create a new empty one.")) {
            $this->info('Log rotation cancelled.');
            return 0;
        }

        try {
            DB::beginTransaction();

            // Step 1: Rename current logs table
            $this->info("Renaming '{$currentTable}' to '{$archivedTable}'...");
            DB::statement("RENAME TABLE `{$currentTable}` TO `{$archivedTable}`");

            // Step 2: Create new logs table with the same structure
            $this->info("Creating new '{$currentTable}' table...");
            $this->createNewLogsTable();

            // Step 3: Clean up old archived tables
            $this->cleanupOldTables($keepTables);

            DB::commit();

            $this->info("✅ Log rotation completed successfully!");
            $this->info("📊 {$recordCount} records archived to '{$archivedTable}'");
            $this->info("🆕 New empty '{$currentTable}' table created");

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("❌ Log rotation failed: " . $e->getMessage());
            return 1;
        }

        return 0;
    }

    /**
     * Create a new logs table with the same structure
     */
    private function createNewLogsTable(): void
    {
        DB::statement("
            CREATE TABLE `logs` (
                `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `LogName` varchar(255) NOT NULL,
                `LogType` varchar(255) NOT NULL,
                `action` varchar(255) NOT NULL,
                `description` text DEFAULT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `logs_logtype_index` (`LogType`),
                KEY `logs_created_at_index` (`created_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }

    /**
     * Get list of old log tables
     */
    private function getOldLogTables(): array
    {
        $tables = DB::select("SHOW TABLES LIKE 'logs_archived_%'");
        $tableNames = [];
        
        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];
            $tableNames[] = $tableName;
        }
        
        // Sort by name (which includes timestamp) in descending order
        rsort($tableNames);
        
        return $tableNames;
    }

    /**
     * Clean up old archived tables
     */
    private function cleanupOldTables(int $keepTables): void
    {
        $oldTables = $this->getOldLogTables();
        
        if (count($oldTables) <= $keepTables) {
            $this->info("No old tables to clean up.");
            return;
        }

        $tablesToDelete = array_slice($oldTables, $keepTables);
        
        foreach ($tablesToDelete as $table) {
            $recordCount = DB::table($table)->count();
            
            if ($this->confirm("Delete table '{$table}' ({$recordCount} records)?")) {
                DB::statement("DROP TABLE `{$table}`");
                $this->info("🗑️ Deleted table: {$table}");
            }
        }
    }
}