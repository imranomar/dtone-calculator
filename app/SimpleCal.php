<?php


namespace App;
use App\iCalc;

class SimpleCal implements iCalc
{
    public static function add($num1, $num2)
    {
        // TODO: Implement add() method.
        return $num1 + $num2 ;
    }

    public static function sub($num1, $num2)
    {
        return $num1 - $num2 ;
    }

    public static function mul($num1, $num2)
    {
        return $num1 * $num2 ;
    }

    public static function div($num1, $num2)
    {
        return $num1 / $num2 ;
    }

}
