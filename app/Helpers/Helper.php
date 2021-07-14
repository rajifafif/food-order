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

    public static function makeOrderNbr($id)
    {
        return now()->format('Ymd').'-'.($id+1);
    }

    public static function getOrderNbrId($order_nbr)
    {
        return explode('-', $order_nbr)[1];
    }
}
