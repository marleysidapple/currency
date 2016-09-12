<?php namespace Marleysid\Currency\Facade;
 
use Illuminate\Support\Facades\Facade;
 
class CurrencyFacade extends Facade {
 
    protected static function getFacadeAccessor() { return 'Currency'; }
 
}