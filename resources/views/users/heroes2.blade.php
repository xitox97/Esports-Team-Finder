@if ( $player['hero_id'] == null)
            <img src="
            {{  asset('img/heroes/default.png') }}" alt="">
@else
            <img  src="
            {{  asset('img/heroes/' . $player['hero_id'] . '.png') }}" alt="">
@endif
<br>
