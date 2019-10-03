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


Route::post('cal/add', 'CalculatorController@add')->name('add');
Route::post('cal/sub', 'CalculatorController@sub')->name('sub');
Route::post('cal/mul', 'CalculatorController@mul')->name('mul');
Route::post('cal/div', 'CalculatorController@div')->name('div');
Route::post('cal/sqt', 'CalculatorController@sqt')->name('sqt');
Route::post('cal/cut', 'CalculatorController@cut')->name('cut');
Route::post('cal/pow', 'CalculatorController@pow')->name('pow');
Route::post('cal/fac', 'CalculatorController@fac')->name('fac');


