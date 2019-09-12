@if ( $recent['hero_id'] == null)
            <img src="
            {{  asset('img/heroes/default.png') }}" alt="">
@else
            <img  src="
            {{  asset('img/heroes/' . $recent['hero_id'] . '.png') }}" alt="">
@endif
