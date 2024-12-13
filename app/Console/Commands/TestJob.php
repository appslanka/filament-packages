<?php

namespace App\Console\Commands;

use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use App\Jobs\TestJob as JobsTestJob;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        JobsTestJob::dispatch();

        $batch = Bus::batch([
            [
                new JobsTestJob()
            ]
        ])->then(function (Batch $batch) {
            // All jobs completed successfully...
        })->dispatch();
    }
}
