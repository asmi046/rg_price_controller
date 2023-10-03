<?php

namespace App\Actions;

use App\Models\ProductInformation;

class GetAnalogTableAction {
    public function handle($analog) {
        $base = ProductInformation::with('tovar_price')->where('analog_rg', $analog)->get();

        $marcetplaces = [];
        $price_list = [];

        foreach ($base as $elem) {
            $marcetplaces[$elem->marketplace] = $elem->marketplace;
            $element = $elem->tovar_price()->orderBy("load_id", 'desc')->first();
            if ($element)
                $price_list[$elem->manufacture][$elem->diametr][$elem->marketplace] = $elem->tovar_price()->orderBy("load_id", 'desc')->first()->one_price_value;
        }

        return ['marcetplaces' => $marcetplaces, 'price_list' => $price_list];
    }
}
