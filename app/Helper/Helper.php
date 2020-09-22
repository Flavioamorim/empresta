<?php

namespace App\Helper;

class Helper
{
    /**
     * @param $data
     * @return array|string[]
     */
    public static function convertToUpper($data)
    {
        return array_map(function ($v) {
            $v = strtoupper($v);
            return $v;
        }, $data);
    }

    /**
     * @param $price
     * @return string
     */
    public static function formatPrice($price)
    {
        return number_format($price, 2, ",", ".");
    }

    public static function removePointsOfValue($value)
    {
        $value = str_replace(',','', $value);
        $value = str_replace('.','', $value);

        return $value;
    }
}
