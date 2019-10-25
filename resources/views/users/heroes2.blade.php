@if ( $player['hero_id'] == null)
            <img src="
            {{  asset('img/heroes/default.png') }}" class="h-12">
@else
            <img  src="
            {{  asset('img/heroes/' . $player['hero_id'] . '.png') }}" class="h-12">
@endif
<br>
