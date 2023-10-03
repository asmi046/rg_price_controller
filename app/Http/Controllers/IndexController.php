<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\GettingPrice;
use App\Models\Load;
use App\Models\ProductInformation;

use App\Actions\GetAnalogTableAction;

class IndexController extends Controller
{
    public function index( GetAnalogTableAction $analogTable) {

        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $load_index = Load::select()->orderBy("id", 'desc')->first();
        $load_index = $load_index->id;

        $IRRIGATION_param = $analogTable->handle("IRRIGATION");
        $CLEAN_NORD_param = $analogTable->handle("CLEAN NORD");
        $TRANS_FOOD_param = $analogTable->handle("TRANS FOOD");

        return view('index', ['IRRIGATION' => $IRRIGATION_param, "CLEAN_NORD" => $CLEAN_NORD_param, "TRANS_FOOD" => $TRANS_FOOD_param]);

    }
}
