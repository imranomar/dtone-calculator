<?php

namespace App\Http\Middleware;

use App\MathLog;
use Closure;

class HttpMathLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {

      $caption = array(
        'add'=>'Addition',
        'sub'=>'Subtraction',
        'mul'=>'Multiplication',
        'div'=>'Division',
        'fac'=>'Factorial',
        'sqt'=>'Square Root',
        'cut'=>'Cube Root',
      );


      //return $next($request);
      $response = $next($request);
      $mlog  = new MathLog();
      $mlog->endpoint = $caption[collect(request()->segments())->last()];
      $mlog->num1 = $request->num1;
      $mlog->num2 = $request->num2;
      $mlog->response = $response->content();
      $mlog->save();
      return $response;
    }


}
