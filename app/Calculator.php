<?php


namespace App;


class Calculator
{
    protected $cal;

    function  __construct($cal)
    {
        $this->cal = $cal;
    }

    public function add($num1,$num2)
    {
        return $this->cal->add($num1,$num2);
    }

    public function sub($num1,$num2)
    {
        return $this->cal->sub($num1,$num2);
    }

    public function mul($num1,$num2)
    {
        return $this->cal->mul($num1,$num2);
    }

    public function div($num1,$num2)
    {
        return $this->cal->div($num1,$num2);
    }
}
