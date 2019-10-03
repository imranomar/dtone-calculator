<?php

namespace App;


//interface to be implemented by any calculator
interface iCalc
{
    public static function add($num1, $num2);
    public static function sub($num1, $num2);
    public static function mul($num1, $num2);
    public static function div($num1, $num2);
    public static function sqt($num1);
    public static function cut($num1);
    public static function pow($num1,$power);
    public static function fac($num1);
}
