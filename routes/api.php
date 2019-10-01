<?php

use App\Cts;
use Illuminate\Http\Request;
use App\CalController;
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

//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
////Route::get('phpinfo', function () {
////    echo phpinfo();
////});
//
//Route::middleware('httpmathlog')->post('/add', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->add($req->num1, $req->num2);
//});
//
//Route::post('/sub', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->sub($req->num1, $req->num2);
//});
//
//Route::post('/mul', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->mul($req->num1, $req->num2);
//});
//
//Route::post('/div', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->div($req->num1, $req->num2);
//});
//
//
//Route::post('/sqt', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->sqt($req->num1);
//});
//
//Route::post('/cut', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->cut($req->num1);
//});
//
//Route::post('/pow', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    return $cal->pow($req->num1,$req->num2);
//});
//
//Route::post('/fac', function (Request $req)
//{
//    //todo: check if numbers, convert to numbers, raise error if not
//    $cal = new CalController(new SimpleCal());
//    if($req->num1<0 || $req->num1>170)
//    {
//      return response('Enter a number a positive integer less than 170',CTS::HTTP_UNPROCESSABLE_ENTITY);
//    }
//
//    return $cal->fac($req->num1);
//});



Route::post('cal/add', 'CalculatorController@add');
Route::post('cal/sub', 'CalculatorController@sub');
Route::post('cal/mul', 'CalculatorController@mul');
Route::post('cal/div', 'CalculatorController@div');
Route::post('cal/sqt', 'CalculatorController@sqt');
Route::post('cal/cut', 'CalculatorController@cut');
Route::post('cal/pow', 'CalculatorController@pow');
Route::post('cal/fac', 'CalculatorController@fac');


