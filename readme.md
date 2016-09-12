# Currency Exchange Rates

Get latest currency exchange rates for different dates.


### Prerequisities

this will require guzzle. so first make sure you have installed guzzle.

```
"guzzlehttp/guzzle": "~4.0"
```

### Installing

To install, edit your `composer.json` and add the line mentioned below.

```
"marleysidapple/currency": "dev-master"

```

Then run `composer update`


### Configuration

After installation, go to `config/app.php`. Add 

```
 Marleysid\Currency\CurrencyServiceProvider::class,

```
in provider array. Add `alias` as well in alias array

```
 'Currency'=> Marleysid\Currency\Facade\CurrencyFacade::class,

```


For publishing `configuration`. Run following command

```
php artisan vendor:publish

```

Once publish is completed open `config/currency.php`. It contains two element. One is `url` which is an api endpoint and another one is `baseCurrency`. You can change `baseCurrency` and set standard currency of your own however `url` value is not meant to be changed.


##Example

add `use Currency` in the top of the controller you wish to use. 


```
$exchangeRate = Currency::exchangeRate('baseCurrency', 'date', 'conversionCurrency');

``` 
For example: if `baseCurrency` is set to `GBP`, all the conversion rates will be show in respect to `GBP` as a base. Passing `date` will give the exchange rate for that particular date. And passing `conversionCurrency` will give the exchange Rate for that particular `conversionCurrency` in respect to the specified `baseCurrency`.



##Usage

```
$exRate = Currency::exchangeRate('USD');

```
returns all available `exrates` with respect to the `USD` as a base currency for present date.


```
$exRate = Currency::exchangeRate('USD', '2015-10-23');

```

returns `ex rate` for the specified date


```
$exRate = Currency::exchangeRate('USD', '2015-10-23', 'AUD');

```

returns `ex rate` of `1 USD` to `1 AUD` on specified `date`



## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

* **Siddhartha Bhatta** - *Initial work* - [marleysidapple](https://github.com/marleysidapple)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


## Acknowledgments

* http://fixer.io/
