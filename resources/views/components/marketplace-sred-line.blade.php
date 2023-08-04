<tr>
    <x-td bold bg>диаметр: 50 мм</x-td>

    @php
            $total_summ = 0;
            $total_count = 0;
    @endphp

    @foreach ($marcetplaces as $item_mp)
        @php
            $summ = 0;
            $count = 0;
        @endphp

        @foreach ($pricelist as $key => $item)
            @if (!isset($item[$width]))
                @continue
            @endif

            @if (isset($item[$width][$item_mp]) )
                @php
                    if ($item[$width][$item_mp] !=0) {
                        $summ+=$item[$width][$item_mp];
                        $count++;
                    }
                @endphp
            @endif


        @endforeach

        @if ($summ != 0)
             @php
                $sred = round($summ / $count, 2);
                $total_summ += $sred;
                $total_count++;
             @endphp
            <x-td bold bg>{{ round($summ / $count, 2)}}</x-td>
        @else
            <x-td bold bg></x-td>
        @endif

    @endforeach

    @if ($total_summ != 0)
        <x-td bold bg>{{ round($total_summ / $total_count, 2) }}</x-td>
    @else
        <x-td bold bg></x-td>
    @endif

</tr>
