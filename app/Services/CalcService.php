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


}
