<?php

use Illuminate\Http\Request;
use App\Calculator;
use App\SimpleCal;
App::bind('iCalc', 'Cal');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/add', function (Request $req)
{
    //todo: check if numbers, convert to numbers, raise error if not
    $cal = new Calculator(new SimpleCal());
    return $cal->add($req->num1, $req->num2);
});

Route::post('/sub', function (Request $req)
{
    //todo: check if numbers, convert to numbers, raise error if not
    $cal = new Calculator(new SimpleCal());
    return $cal->sub($req->num1, $req->num2);
});

Route::post('/mul', function (Request $req)
{
    //todo: check if numbers, convert to numbers, raise error if not
    $cal = new Calculator(new SimpleCal());
    return $cal->mul($req->num1, $req->num2);
});

Route::post('/div', function (Request $req)
{
    //todo: check if numbers, convert to numbers, raise error if not
    $cal = new Calculator(new SimpleCal());
    return $cal->div($req->num1, $req->num2);
});
