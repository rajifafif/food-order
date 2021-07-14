<?php

namespace App\Helpers;

class Helper
{
    public static function deSlug($slug)
    {
        return ucwords(str_replace('-', ' ', $slug));
    }

    public static function moneyFormat($number, $currency = 'Rp')
    {
        return $currency.' '.number_format($number, 2, ',', '.');
    }
}
