








@if ( $fetchPlayers->medal == null)

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
            {{  asset('img/medal/rank_icon_' . $fetchPlayers->medal[0] . '.png') }}" alt="">
            <img class="rankMedal-star" src="{{  asset('img/medal/rank_star_' . $fetchPlayers->medal[1] . '.png') }}" alt="">

        </div>
    </div>
@endif
