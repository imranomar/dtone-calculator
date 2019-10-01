<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MathLog;
Use Carbon\Carbon;

class ReportsController extends Controller
{

  public function index()
  {
    $selectedDate = '';
    $selectedType = '';
    $selectedMonth = '';
    $log = array();


    if(request()->selectedType)
    {
      $selectedDate = request()->selectedDate;
      $selectedMonth = request()->selectedMonth;
      $selectedType = request()->selectedType;

      if($selectedType=='day')
      {
        $log = MathLog::whereDate('created_at','=',Carbon::parse($selectedDate)->toDateString())->paginate(20);
        return view('report',compact(['log','selectedDate','selectedType','selectedMonth']));
      }
      elseif($selectedType=='month')
      {
        $log = MathLog::whereMonth('created_at',$selectedMonth)->paginate(20);
        return view('report',compact(['log','selectedDate','selectedType','selectedMonth']));
      }

    }
    else
    {
      $log =  MathLog::paginate(20);
      return view('report',compact(['log','selectedDate','selectedType','selectedMonth']));
    }





  }
}
