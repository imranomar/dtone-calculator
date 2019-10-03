<?php


namespace App;
use App\iCalc;

//A simple calculator class implmenting the iCalc interface
class SimpleCal implements iCalc
{
    public static function add($num1, $num2)
    {
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

    public static function sqt($num1)
    {
        return sqrt($num1) ;
    }

    public static function cut($num1)
    {
        return pow($num1,1/3);
    }

    public static function pow($num1, $power)
    {
        return pow($num1,$power);
    }

    public static function fac($num1)
    {
        $result = 1;

        if($num1 > 1)
        {

            for($i = 2; $i <= $num1; $i++)
            {
                $result *= $i;
            }
        }
        return $result;
    }


}
