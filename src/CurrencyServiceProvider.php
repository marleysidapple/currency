<?php

namespace Marleysid\Currency;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        AliasLoader::getInstance()->alias('Currency', 'Marleysid\Currency\Facade\CurrencyFacade');
        $this->publishes([
            __DIR__ . '/config/currency.php' => config_path('currency.php'),
        ]);
    }

    public function register()
    {
        $this->app['Currency'] = $this->app->share(function ($app) {
            $config                 = array();
            $config['url']          = Config::get('currency.url');
            $config['baseCurrency'] = Config::get('currency.baseCurrency');

            return new Currency($config);
        });
    }
}
