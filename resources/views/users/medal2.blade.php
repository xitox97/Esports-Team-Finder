@if ( $player->accounts->medal == null)

    <div class="rankTierContainer">
            <div class="rankMedal">
                <img class="rankMedal-icon" src="
                {{  asset('img/medal/rank_icon_0.png') }}" alt="">


            </div>
        </div>
    @else
    <div class="rankTierContainer">
            <div class="rankMedal">
                <img class="rankMedal-icon" src="
                {{  asset('img/medal/rank_icon_' . $player->accounts->medal[0] . '.png') }}" alt="">
                <img class="rankMedal-star" src="{{  asset('img/medal/rank_star_' . $player->accounts->medal[1] . '.png') }}" alt="">

            </div>
        </div>
    @endif
