<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\job;
use App\AI;

class TranslateJob implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels, InteractsWithQueue;

    /**
     * Create a new job instance.
     */
    public function __construct(public job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         logger  ('Translate'.$this->jobListing->title.'to French');
        // AI::translate($this->jobListing->decription, 'fr');
    }
}
