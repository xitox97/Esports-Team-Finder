<?php

namespace App\Jobs;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class consumeOpendotaApi implements ShouldQueue
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
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // logger('consuming api nom nom by ' . $this->user->name);

            $dotaId = $this->user->accounts->dota_id;
           //coding for opendota api
           $client = new Client(['base_uri'
           => 'https://api.opendota.com/api/']);



           $response = $client->get("players/$dotaId/recentMatches");
           $fetchRM = json_decode($response->getBody(), true);

           $response1 = $client->get("players/$dotaId/heroes");
           $fetchHP = json_decode($response1->getBody(), true);

           $response2 = $client->get("players/$dotaId/totals");
           $fetchTS = json_decode($response2->getBody(), true);

           $response3 = $client->get("players/$dotaId/peers");
           $fetchP = json_decode($response3->getBody(), true);

           $response4 = $client->get("players/$dotaId/counts");
           $fetchMC = json_decode($response4->getBody(), true);

            //dd($fetchHP);

           $this->user->statistic()->create([
               'recent_match' => $fetchRM,
               'heroes_played' => $fetchHP,
               'tot_score' => $fetchTS,
                'peers' => $fetchP,
                'match_counts' => $fetchMC,

           ]);
    }
}
