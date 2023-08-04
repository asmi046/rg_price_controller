<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\GettingPrice;
use App\Models\Load;
use App\Models\ProductInformation;

class IndexController extends Controller
{
    public function index() {

        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $load_index = Load::select()->orderBy("id", 'desc')->first();
        $load_index = $load_index->id;

        $IRRIGATION = ProductInformation::with('tovar_price')->where('analog_rg', "IRRIGATION")->get();

        $marcetplaces = [];
        $sizes = [];
        $brands = [];
        $price_list = [];

        foreach ($IRRIGATION as $elem) {
            $marcetplaces[$elem->marketplace] = $elem->marketplace;
            $sizes[$elem->diametr] = $elem->diametr;
            $brands[$elem->manufacture] = $elem->manufacture;
            $price_list[$elem->manufacture][$elem->diametr][$elem->marketplace] = $elem->tovar_price()->orderBy("load_id", 'desc')->first()->one_price_value;
        }

        // dd($load_index, $marcetplaces, $sizes, $brands, $price_list);

        return view('index', ['marcetplaces' => $marcetplaces, 'price_list' => $price_list]);
    }
}
