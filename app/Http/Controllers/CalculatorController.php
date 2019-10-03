<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\SimpleCal;
use App\Http\Requests\MathRequest;
use App\Cts;


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
      try
      {
        return $this->cal->add($request->num1, $request->num2);
      }
      catch(\Exception $e)
      {

        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function sub(MathRequest $request)
    {
      try
      {
        return $this->cal->sub($request->num1, $request->num2);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function mul(MathRequest $request)
    {
      try
      {
        return $this->cal->mul($request->num1, $request->num2);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function div(MathRequest $request)
    {
      try
      {
        return $this->cal->div($request->num1, $request->num2);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }

    }

    public function sqt(MathRequest $request)
    {

      try
      {
        return $this->cal->sqt($request->num1);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function cut(MathRequest $request)
    {
      try
      {
        return $this->cal->cut($request->num1);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function fac(MathRequest $request)
    {
      try
      {
        if($request->num1<0 || $request->num1>170)
        {
          return response('Enter a number a positive integer less than 170',CTS::HTTP_UNPROCESSABLE_ENTITY);
        }
        else
        {
          return $this->cal->fac($request->num1);
        }
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function pow(MathRequest $request)
    {
      try
      {
        return $this->cal->pow($request->num1, $request->num2);
      }
      catch(\Exception $e)
      {
        return response( $e->getMessage(), Cts::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

}
