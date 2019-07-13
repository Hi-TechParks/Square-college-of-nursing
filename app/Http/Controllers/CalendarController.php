<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calendars = DB::table('scn_academic_calendar')
                    ->join('scn_event_type', 'scn_event_type.EVENT_TYPE_ID', '=', 'scn_academic_calendar.EVENT_TYPE_ID')
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME', 'scn_event_type.COLOR_CODE')
                    ->where('scn_academic_calendar.ACTIVE_STATUS', '1')
                    ->get();

        return view('calendar')->with('calendars', $calendars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $calendars = DB::table('scn_academic_calendar')
                    ->join('scn_event_type', 'scn_event_type.EVENT_TYPE_ID', '=', 'scn_academic_calendar.EVENT_TYPE_ID')
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME', 'scn_event_type.COLOR_CODE')
                    ->where('CALENDAR_ID', $id)
                    ->get();

        //
        return view('calendar_event')->with('calendars', $calendars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
