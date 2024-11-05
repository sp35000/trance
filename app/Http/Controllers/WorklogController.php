<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worklog;

class WorklogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worklogs = Worklog::orderBy('date','desc')->paginate(50);
        $selectedDate = date("Y-m-d");
        return view('worklogs.index', compact('worklogs'))->with('i', (request()->input('page', 1) - 1) * 50)
        ->with('selectedDate',$selectedDate);
    }

     /**
     * Display the specified resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function show($date)
      {
        $worklogs = Worklog::where('date', '=', $date)->paginate(50);
        $selectedDate = substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2);
        return view('worklogs.index',['worklogs' => $worklogs,'selectedDate' => $selectedDate]);
      }

}
