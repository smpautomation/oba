<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class SimpleLogRotationService
{
    /**
     * Rotate logs by renaming current table and creating new one
     */
    public static function rotateLogs(int $keepTables = 5): array
    {
        $currentTable = 'logs';
        $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
        $archivedTable = "logs_archived_{$timestamp}";

        if (!Schema::hasTable($currentTable)) {
            throw new \Exception("Table '{$currentTable}' does not exist!");
        }

        $recordCount = DB::table($currentTable)->count();

        if ($recordCount === 0) {
            return [
                'success' => true,
                'message' => 'No records to rotate',
                'records_archived' => 0,
                'archived_table' => null,
            ];
        }

        try {
            DB::beginTransaction();

            // Rename current table
            DB::statement("RENAME TABLE `{$currentTable}` TO `{$archivedTable}`");

            // Create new table
            self::createNewLogsTable();

            // Clean up old tables
            $deletedTables = self::cleanupOldTables($keepTables);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Log rotation completed successfully',
                'records_archived' => $recordCount,
                'archived_table' => $archivedTable,
                'deleted_tables' => $deletedTables,
            ];

        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Log rotation failed: " . $e->getMessage());
        }
    }

    /**
     * Get rotation statistics
     */
    public static function getRotationStats(): array
    {
        $currentTable = 'logs';
        $archivedTables = self::getOldLogTables();

        $stats = [
            'current_table' => [
                'name' => $currentTable,
                'exists' => Schema::hasTable($currentTable),
                'records' => Schema::hasTable($currentTable) ? DB::table($currentTable)->count() : 0,
                'size_mb' => self::getTableSizeMB($currentTable),
            ],
            'archived_tables' => [],
            'total_archived_records' => 0,
            'total_archived_size_mb' => 0,
        ];

        foreach ($archivedTables as $table) {
            $records = DB::table($table)->count();
            $sizeMB = self::getTableSizeMB($table);
            
            $stats['archived_tables'][] = [
                'name' => $table,
                'records' => $records,
                'size_mb' => $sizeMB,
                'created_at' => self::extractDateFromTableName($table),
            ];
            
            $stats['total_archived_records'] += $records;
            $stats['total_archived_size_mb'] += $sizeMB;
        }

        return $stats;
    }

    /**
     * Create new logs table
     */
    private static function createNewLogsTable(): void
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
                KEY `logs_logname_index` (`LogName`),
                KEY `logs_created_at_index` (`created_at`),
                KEY `logs_action_index` (`action`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }

    /**
     * Get old log tables
     */
    private static function getOldLogTables(): array
    {
        $tables = DB::select("SHOW TABLES LIKE 'logs_archived_%'");
        $tableNames = [];
        
        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];
            $tableNames[] = $tableName;
        }
        
        rsort($tableNames); // Sort newest first
        
        return $tableNames;
    }

    /**
     * Clean up old tables
     */
    private static function cleanupOldTables(int $keepTables): array
    {
        $oldTables = self::getOldLogTables();
        
        if (count($oldTables) <= $keepTables) {
            return [];
        }

        $tablesToDelete = array_slice($oldTables, $keepTables);
        $deletedTables = [];

        foreach ($tablesToDelete as $table) {
            DB::statement("DROP TABLE `{$table}`");
            $deletedTables[] = $table;
        }

        return $deletedTables;
    }

    /**
     * Get table size in MB
     */
    private static function getTableSizeMB(string $tableName): float
    {
        if (!Schema::hasTable($tableName)) {
            return 0;
        }

        $result = DB::select("
            SELECT 
                ROUND(((data_length + index_length) / 1024 / 1024), 2) AS size_mb
            FROM information_schema.tables 
            WHERE table_schema = DATABASE() 
            AND table_name = ?
        ", [$tableName]);

        return $result[0]->size_mb ?? 0;
    }

    /**
     * Extract date from archived table name
     */
    private static function extractDateFromTableName(string $tableName): ?string
    {
        if (preg_match('/logs_archived_(\d{4}_\d{2}_\d{2}_\d{2}_\d{2}_\d{2})/', $tableName, $matches)) {
            return Carbon::createFromFormat('Y_m_d_H_i_s', $matches[1])->toDateTimeString();
        }
        
        return null;
    }
}