<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class FormatAmount extends Component
{
    public $amount;
    public $currency;
    public $locale;

    public function __construct(int $amount, string $currency, string $locale = null)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->locale = $locale ?? app()->getLocale();
    }

    public function render()
    {
        $money = new Money($this->amount, new Currency(Str::upper($this->currency)));

        $numberFormatter = new NumberFormatter($this->locale, NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

        return $moneyFormatter->format($money);
    }
}
