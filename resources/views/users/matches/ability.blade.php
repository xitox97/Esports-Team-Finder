@foreach ($player['ability_upgrades_arr'] as $ability)

{{-- coding panjang --}}
{{-- {{dd($itemsData->ability_id)}} --}}
    {{-- {{dd($itemsData->abilities[$itemsData->ability_id[$ability]]["img"])}} --}}

    {{-- @foreach ($itemsData->ability_id as $key => $id)
        @if($ability == $key)
            @foreach ($itemsData->abilities as $key2 => $item)

                @if($id == $key2)
                    @foreach($item  as $key3 => $img)
                    @if($key3 == "img")
                    <td class="border-b border-gray-300 "><img src="http://cdn.dota2.com{{$img}}" class="w-10"></td>
                    @endif
                    @endforeach

                @endif

            @endforeach



        @break
        @endif

    @endforeach --}}

    {{-- coding pendek --}}
    @if(array_key_exists("img",$itemsData->abilities[$itemsData->ability_id[$ability]]))
        @foreach($itemsData->abilities[$itemsData->ability_id[$ability]] as $key => $img)
            @if($key == "img")
            <td class="border-b border-gray-300 "><img src="http://cdn.dota2.com{{$img}}" class="w-10"></td>
            @endif
        @endforeach
    @else
        <td class="border-b border-gray-300">
        <img src="{{asset('img/talent.jpg')}}" class="w-10">
        </td>
    @endif

@endforeach
     {{-- @if(array_key_exists(0,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][0]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(1,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][1]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(2,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][2]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(3,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][3]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(4,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][4]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(5,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][5]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(6,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][6]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(7,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][7]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(8,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][8]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(9,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][9]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(10,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][10]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(11,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][11]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(12,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][12]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(13,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][13]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(14,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][14]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        @if(array_key_exists(15,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][15]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        <td class="border-b border-gray-300 "></td>
        @if(array_key_exists(16,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][16]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        <td class="border-b border-gray-300 "></td>
        @if(array_key_exists(17,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][17]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif
        <td class="border-b border-gray-300 "></td>
        <td class="border-b border-gray-300 "></td>
        <td class="border-b border-gray-300 "></td>
        <td class="border-b border-gray-300 "></td>
        @if(array_key_exists(18,$player['ability_upgrades_arr']))
        <td class="border-b border-gray-300 ">{{$player['ability_upgrades_arr'][18]}}</td>
        @else
        <td class="border-b border-gray-300 "></td>
        @endif --}}


