<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\SimpleCal;
use App\Http\Requests\MathRequest;



class CalculatorController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $cal;

    function  __construct()
    {
      $this->cal = new SimpleCal();
      $this->middleware('httpmathlog');
    }

    public function add(MathRequest $request)
    {
      return $this->cal->add($request->num1, $request->num2);
    }

    public function sub(MathRequest $request)
    {
      return $this->cal->sub($request->num1, $request->num2);
    }

    public function mul(MathRequest $request)
    {
      return $this->cal->mul($request->num1, $request->num2);
    }

    public function div(MathRequest $request)
    {
      return $this->cal->div($request->num1, $request->num2);
    }

    public function sqt(MathRequest $request)
    {
      return $this->cal->sqt($request->num1);
    }

    public function cut(MathRequest $request)
    {
      return $this->cal->cut($request->num1);
    }

    public function fac(MathRequest $request)
    {
      return $this->cal->fac($request->num1);
    }

    public function pow(MathRequest $request)
    {
      return $this->cal->pow($request->num1, $request->num2);
    }

}
