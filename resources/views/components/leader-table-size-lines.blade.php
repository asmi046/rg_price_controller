@foreach ($sizes as  $key => $value)

    <tr>
        <x-td>{{$key}}</x-td>
        <x-td>{{ $value['code_1c_rg'] }}</x-td>
        <x-td>{{ $value['min_info_procent'] }}</x-td>
        <x-td>{{ $value['no_nds'] }}</x-td>
        <x-td>{{ $value['vc_plan'] }}</x-td>
        <x-td>{{ $value['rent'] }}</x-td>
        <x-td>{{ $value['buhta'] }}</x-td>
    </tr>

@endforeach

