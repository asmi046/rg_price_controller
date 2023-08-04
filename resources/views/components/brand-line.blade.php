
@foreach ($pricelist as $key => $item)
@if (!isset($item[$width]))
    @continue
@endif
<tr>
    <x-td>{{$key}}</x-td>
    @php
        $summ = 0;
        $count = 0;
    @endphp
    @foreach ($marcetplaces as $item_mp)
        @if (isset($item[$width][$item_mp]) )
            @php
                if ($item[$width][$item_mp] !=0) {
                    $summ+=$item[$width][$item_mp];
                    $count++;
                }
            @endphp
            <x-td>{{$item[$width][$item_mp]}}</x-td>
        @else
            <x-td></x-td>
        @endif
    @endforeach
    @if ($summ != 0)
        <x-td>{{ round($summ / $count, 2)}}</x-td>
    @else
        <x-td></x-td>
    @endif
</tr>

@endforeach
