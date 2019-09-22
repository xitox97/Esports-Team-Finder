<?php

namespace App\Jobs;

use App\DotaJson;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
            $roles = DotaJson::first();
            $carry = 0;
            $mid = 0;
            $support = 0;
            $roamer = 0;
            $offlaner = 0;
           foreach($this->user->statistic->heroes_played as $playedHero)
           {
               foreach($roles->hero_roles as $role){
                //dd($role['id']);
                if ($playedHero['games'] != 0 and $playedHero['hero_id'] == $role['id'])
                    {
                        if($role['lane'] == "Midlane" and $role['roles'] == "Carry"){
                            $mid = $mid + $playedHero['games'];
                        }
                        elseif($role['lane'] == "Safelane" and $role['roles'] == "Carry"){
                            $carry = $carry + $playedHero['games'];
                        }
                        elseif($role['lane'] == "Safelane" and $role['roles'] == "Support"){
                            $support = $support + $playedHero['games'];
                        }
                        elseif($role['lane'] == "Safelane" and $role['roles'] == "Roamer"){
                            $roamer = $roamer + $playedHero['games'];
                        }
                        elseif($role['lane'] == "Offlane" and $role['roles'] == "Tanker"){
                            $offlaner = $offlaner + $playedHero['games'];
                        }
                    }
               }

           }

        //coding masuk dalam database data itu
           $knowledge = $this->user->knowledge()->create([
               'mid' => $mid,
               'carry' => $carry,
               'roamer' => $roamer,
               'support' => $support,
               'offlaner' => $offlaner
           ]);
    }
}
