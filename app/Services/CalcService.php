<?php

namespace App\Services;

use App\Models\ProductInformation;
use App\Models\Load;

class CalcService {

    public function array2_min($array) {
        $min = PHP_INT_MAX;
        foreach ($array as $elem)
            if(($elem < $min)&&($elem != 0))
                $min = $elem;

        return $min;
    }

    public function array_median($array) {
        $count = count($array);

        sort($array);

        if ($count % 2 != 0){
            $med = floor($count/2);
            return $array[$med];
        }

        else {
            $med = $count/2;
            $two = $array[$med];
            $one = $array[$med-1];
            return ($one+$two)/2;
        }
    }

    public function calc_min_line($analog, $diametr) {
        $load = Load::select()
        ->orderBy('id', "DESC")
        ->first();

        $load_index = $load->id;

        $base = ProductInformation::select()
        ->where('analog_rg', $analog)
        ->where('diametr', $diametr)
        ->get();

        $parice_base = [];

        foreach ($base as $item)
        {
            $line = $item->tovar_price()
                ->where("load_id", $load_index)
                ->orderBy('one_price_value')->first();

            $parice_base[] = $line->one_price_value;
        }
        return ["load_index" => $load_index,
                "base" => $parice_base,
                "min" => $this->array2_min($parice_base),
            ];
    }

    public function calc_median_line($analog, $diametr) {
        $load = Load::select()
        ->orderBy('id', "DESC")
        ->first();

        $load_index = $load->id;

        $base = ProductInformation::select()
        ->where('analog_rg', $analog)
        ->where('diametr', $diametr)
        ->get();

        $parice_base = [];

        foreach ($base as $item)
        {
            $line = $item->tovar_price()
                ->where("load_id", $load_index)
                ->orderBy('one_price_value')->first();

            $parice_base[] = $line->one_price_value;
        }
        return ["load_index" => $load_index,
                "base" => $parice_base,
                "min" => $this->array_median($parice_base),
            ];
    }


    protected function get_parametrs($analog, $diametr) {
        $element = ProductInformation::where('analog_rg', $analog)
        ->where('diametr', $diametr)
        ->first();

        return [
            'vc_plan' => $element->vc_plan,
            'code_1c_rg' => $element->code_1c_rg,
        ];
    }

    protected function price_leader_get_line($analog, $diametr, $procent) {

        $min_line = $this->calc_min_line($analog, $diametr);
        $param = $this->get_parametrs($analog, $diametr);
        $price_procent = $min_line['min'] * (1 - ($procent / 100));

        return [
            'min_info' => $min_line['min'],
            'min_info_procent' => round($price_procent, 2),
            'no_nds' => round($price_procent / 1.2, 2),
            'param' => $param,
            'rent' => round(($price_procent - (float)$param['vc_plan']) / $price_procent, 2),
            'buhta' => round($price_procent * 30, 2),
            'vc_plan' => $param['vc_plan'],
            'code_1c_rg' => $param['code_1c_rg'],
        ];
    }

    protected function price_median_get_line($analog, $diametr) {

        $min_line = $this->calc_median_line($analog, $diametr);
        $param = $this->get_parametrs($analog, $diametr);
        $price_procent = $min_line['min'];

        return [
            'min_info' => $min_line['min'],
            'min_info_procent' => round($price_procent, 2),
            'no_nds' => round($price_procent / 1.2, 2),
            'param' => $param,
            'rent' => round(($price_procent - (float)$param['vc_plan']) / $price_procent, 2),
            'buhta' => round($price_procent * 30, 2),
            'vc_plan' => $param['vc_plan'],
            'code_1c_rg' => $param['code_1c_rg'],
        ];
    }

    public function price_leader_get($procent = 0) {

        $price_leader = [];

        $names = [
            "IRRIGATION" => [50,75,100],
            "CLEAN NORD" => [50,75,100],
            "TRANS FOOD"=> [50]
        ];

        foreach ($names as $key => $value) {
            foreach ($value as $size)
                $price_leader[$key][$size] = $this->price_leader_get_line($key, $size, $procent);
        }

        return $price_leader;
    }

    public function price_median_get() {

        $price_median = [];

        $names = [
            "IRRIGATION" => [50,75,100],
            "CLEAN NORD" => [50,75,100],
            "TRANS FOOD"=> [50]
        ];

        foreach ($names as $key => $value) {
            foreach ($value as $size)
                $price_median[$key][$size] = $this->price_median_get_line($key, $size);
        }

        return $price_median;
    }
}
