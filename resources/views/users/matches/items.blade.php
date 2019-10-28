{{-- {{$player['item_0']}} {{$player['item_1']}} {{$player['item_2']}}
                    {{$player['item_3']}} {{$player['item_4']}} {{$player['item_5']}} --}}


    @foreach($itemsData->items as $indexKey => $item)
    @php
        $random = rand();
    @endphp
        @if($item['id'] == $player['item_0'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">

            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>

        @elseif($item['id'] == $player['item_1'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">
            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>

        @elseif($item['id'] == $player['item_2'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">
            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>

        @elseif($item['id'] == $player['item_3'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">
            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>

        @elseif($item['id'] == $player['item_4'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">
            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>

        @elseif($item['id'] == $player['item_5'])
            <img src="http://cdn.dota2.com{{ $item['img'] }}" class="h-10 cursor-pointer" v-tooltip.bottom="{ html: '{{$indexKey}}{{$item['id']}}{{$random}}' }">
            <div id="{{$indexKey}}{{$item['id']}}{{$random}}" class="tooltip-content">
                <div class="p-2">
                    <p>{{$item['dname']}}</p>
                </div>
            </div>
        @endif

    @endforeach

