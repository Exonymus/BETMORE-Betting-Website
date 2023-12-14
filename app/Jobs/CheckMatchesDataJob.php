<?php

namespace App\Jobs;

use App\Models\GameMatch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CheckMatchesDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(120);

        $matches = GameMatch::whereNull('results')->get();
        foreach ($matches as $match)
        {
            if ($match->live == '1') {
                $match->loadDetails();
            }
            else
            {
                $currentDateTime = Carbon::now();
                $matchDateTime = Carbon::parse($match->date . ' ' . $match->time);

                if ($matchDateTime->lessThan($currentDateTime)) {
                    $match->loadDetails();
                }
            }
        }

        CheckMatchesDataJob::dispatch();
    }
}
