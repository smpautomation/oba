<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\SimpleLogRotationService;
use Illuminate\Support\Facades\Log;

class SimpleLogRotationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $tries = 1;

    public function __construct(
        public int $keepTables = 5,
        public int $minRecords = 1000
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Check if rotation is needed
            $stats = SimpleLogRotationService::getRotationStats();
            
            if ($stats['current_table']['records'] < $this->minRecords) {
                Log::info('Log rotation skipped - not enough records', [
                    'current_records' => $stats['current_table']['records'],
                    'minimum_required' => $this->minRecords
                ]);
                return;
            }

            // Perform rotation
            $result = SimpleLogRotationService::rotateLogs($this->keepTables);

            Log::info('Automated log rotation completed', [
                'result' => $result,
                'keep_tables' => $this->keepTables
            ]);

        } catch (\Exception $e) {
            Log::error('Automated log rotation failed', [
                'error' => $e->getMessage(),
                'keep_tables' => $this->keepTables
            ]);

            throw $e;
        }
    }
}