<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class generatePlayerRole implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user, $stats;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Statistic $stats)
    {
        $this->stats = $stats;
        $this->user = $user;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //coding utk dapatkan role dia
            //dd($fetchHP);
            //coding masuk dalam database data itu
           $knowledge = $this->user->knowledgebase()->create([
               'recent_match' => $fetchRM,
               'heroes_played' => $fetchHP,
               'tot_score' => $fetchTS,
           ]);
    }
}
