<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Log;

class LogAccessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 30;
    public $backoff = [1, 5, 10]; // Retry after 1, 5, and 10 seconds

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $logName,
        public string $logType,
        public string $action,
        public array $logData
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::create([
                'LogName' => $this->logName,
                'LogType' => $this->logType,
                'action' => $this->action,
                'description' => json_encode($this->logData),
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Illuminate\Support\Facades\Log::error('Failed to log access', [
                'error' => $e->getMessage(),
                'log_data' => $this->logData
            ]);
            
            // Re-throw to trigger retry mechanism
            throw $e;
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        // Log the permanent failure
        \Illuminate\Support\Facades\Log::error('LogAccessJob permanently failed', [
            'error' => $exception->getMessage(),
            'log_data' => $this->logData
        ]);
    }
}