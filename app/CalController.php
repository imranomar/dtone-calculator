<?php


namespace App;


class CalController
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

    public function sqt($num1)
    {
        return $this->cal->sqt($num1);
    }

    public function cut($num1)
    {
        return $this->cal->cut($num1);
    }

    public function pow($num1,$num2)
    {
        return $this->cal->pow($num1,$num2);
    }

    public function fac($num1)
    {
        //todo: check for negative number, test for 0
        return $this->cal->fac($num1);
    }

}
