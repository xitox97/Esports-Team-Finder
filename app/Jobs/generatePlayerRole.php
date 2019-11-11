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
        //generate player role
        foreach ($this->user->statistic->heroes_played as $playedHero) {
            foreach ($roles->hero_roles as $role) {
                //dd($role['id']);
                if ($playedHero['games'] != 0 and $playedHero['hero_id'] == $role['id']) {
                    if ($role['lane'] == "Midlane" and $role['roles'] == "Carry") {
                        $mid = $mid + $playedHero['games'];
                    } elseif ($role['lane'] == "Safelane" and $role['roles'] == "Carry") {
                        $carry = $carry + $playedHero['games'];
                    } elseif ($role['lane'] == "Safelane" and $role['roles'] == "Support") {
                        $support = $support + $playedHero['games'];
                    } elseif ($role['lane'] == "Safelane" and $role['roles'] == "Roamer") {
                        $roamer = $roamer + $playedHero['games'];
                    } elseif ($role['lane'] == "Offlane" and $role['roles'] == "Tanker") {
                        $offlaner = $offlaner + $playedHero['games'];
                    }
                }
            }
        }


        //generate percentage

        $win = 0;
        $lose = 0;
        $winrate = 0;
        $gpm = 0;
        $counter = 0;

        //generate winrate
        foreach ($this->user->matches as $match) {

            foreach ($match->match_details['players'] as $player) {

                if ($this->user->accounts->dota_id == $player['account_id']) {

                    //winrate
                    if ($player['radiant_win'] == true and $player['isRadiant'] == true) {
                        //radian win and user is radiant = win
                        //dd($player['match_id']);
                        $win++;
                    } elseif ($player['radiant_win'] == false and $player['isRadiant'] == false) {
                        //dire win and user is dire = win
                        $win++;
                    } elseif ($player['radiant_win'] == true and $player['isRadiant'] == false) {
                        //radiant win and user is dire = lose
                        $lose++;
                    } elseif ($player['radiant_win'] == false and $player['isRadiant'] == true) {
                        //dire win and user is radiant = lose
                        //dd($player['match_id']);
                        $lose++;
                    }

                    //gpm
                    $gpm += $player['gold_per_min'];
                    $counter++;
                    //dd($player['gold_per_min']);
                }
            }
        }

        $avg_gpm = round(($gpm / $counter),0);
        //dd($avg_gpm);
        $total = $win + $lose;
        $winrate = intval(((round(($win / $total), 2)) * 100));


        //coding masuk dalam database data itu
        $knowledge = $this->user->knowledge()->create([
            'mid' => $mid,
            'carry' => $carry,
            'roamer' => $roamer,
            'support' => $support,
            'offlaner' => $offlaner,
            'winrate' => $winrate,
            'gpm' => $avg_gpm,
        ]);
    }
}
