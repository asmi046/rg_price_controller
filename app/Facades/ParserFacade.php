<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ParserFacade extends Facade {

	protected static function getFacadeAccessor() { return 'Parser'; }

}
