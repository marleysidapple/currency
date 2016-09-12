<?php namespace Marleysid\Currency;

use GuzzleHttp\Client;

class Currency
{

    /*
     *
     * Application base url
     * url endpoint will fetch the currency details
     *
     */
    protected $url;

    /*
     *
     * Base currency.
     * Base currency is set in config.
     */
    protected $baseCurrency;

    public function __construct($config)
    {
        $this->url          = $config['url'];
        $this->baseCurrency = $config['baseCurrency'];
    }

    public function exchangeRate($base = null, $date = null, $conversion = null)
    {

        if (!empty($base) && $base != $this->baseCurrency) {
            $this->baseCurrency = $base;
        }

        if (!empty($conversion) && $this->baseCurrency == $conversion) {
            throw new Exception("Base currency and conversion currency cannot be same");
        }

        if (empty($date)){
        	$date = date('Y-m-d');
        }

        $parameters = array(
            'base'       => $this->baseCurrency,
            'date'       => $date,
            'conversion' => $conversion,
        );

        $client        = new \GuzzleHttp\Client();
        $response      = $client->get('http://api.fixer.io/latest', array('query' => $parameters));
        $response_json = $response->json();

        if (!empty($conversion)) {
            return $response_json['rates'][$conversion];
        }

        return $response_json;
    }

}
