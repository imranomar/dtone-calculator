<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MathLog;
Use Carbon\Carbon;

class ReportsController extends Controller
{

  //main page to show the reports
  public function index()
  {
    $selectedDate = '';
    $selectedType = '';
    $selectedMonth = '';
    $selectedWeek = '';
    $log = array();
    $from = '';
    $to = '';

    //if month , day or week is selected
    if(request()->selectedType)
    {
      $selectedDate = request()->selectedDate;
      $selectedMonth = request()->selectedMonth;
      $selectedType = request()->selectedType;
      $selectedWeek = request()->selectedWeek;

      if($selectedType=='day')
      {
        $log = MathLog::whereDate('created_at','=',Carbon::parse($selectedDate)->toDateString())->orderBy('created_at', 'desc')->paginate(20);

      }
      elseif($selectedType=='week')
      {
        //get the start and end of selected week
        $from = Carbon::parse($selectedWeek)->startOfWeek()->format('Y-m-d H:i');
        $to = Carbon::parse($selectedWeek)->endOfWeek()->format('Y-m-d H:i');
        $log = MathLog::whereBetween('created_at', [$from, $to])->orderBy('created_at', 'desc')->paginate(20);
      }
      elseif($selectedType=='month')
      {
        //year assumed to be 2019
        $log = MathLog::whereYear('created_at',2019)->whereMonth('created_at',$selectedMonth)->orderBy('created_at', 'desc')->paginate(20);
      }

    }
    else
    {
      $log =  MathLog::orderBy('created_at', 'desc')->paginate(20);
    }

    return view('report',compact(['log','selectedDate','selectedType','selectedMonth','selectedWeek','from','to']));

  }
}
