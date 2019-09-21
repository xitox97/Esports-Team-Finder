<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class generatePlayerRole implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
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

       // dd($this->user->statistic->heroes_played);
            $roles = DB::table('dota_data')->first();
             dd($roles);

            foreach($roles->hero_roles as $role)
            {
                dd($role);
            }

        //    foreach($this->user->statistic->heroes_played as $playedHero)
        //    {
        //        foreach($roles as $role){

        //         dd($role['id']);
        //         //if ($playedHero['hero_id'] == $role['id'] and

        //        }
        //        //dd($playedHero['hero_id']);
        //    }

            //coding masuk dalam database data itu
           $knowledge = $this->user->knowledgebase()->create([
               'recent_match' => $fetchRM,
               'heroes_played' => $fetchHP,
               'tot_score' => $fetchTS,
           ]);
    }
}
