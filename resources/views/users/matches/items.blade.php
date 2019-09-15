{{-- {{$player['item_0']}} {{$player['item_1']}} {{$player['item_2']}}
                    {{$player['item_3']}} {{$player['item_4']}} {{$player['item_5']}} --}}


    @foreach($itemsData->items as $item)
        @if($item['id'] == $player['item_0'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @elseif($item['id'] == $player['item_1'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @elseif($item['id'] == $player['item_2'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @elseif($item['id'] == $player['item_3'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @elseif($item['id'] == $player['item_4'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @elseif($item['id'] == $player['item_5'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" alt="">
        @endif
    @endforeach

