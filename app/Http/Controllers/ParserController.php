<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Parser;

class ParserController extends Controller
{
    public function index(Request $request) {

        dd(Parser::parse());
    }
}
