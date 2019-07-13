<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminCalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $calendars = DB::table('scn_academic_calendar')
                    ->join('scn_event_type', 'scn_event_type.EVENT_TYPE_ID', '=', 'scn_academic_calendar.EVENT_TYPE_ID')
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME')
                    ->where('EVENT_DATE', 'LIKE', '%'.$request->get('event_date').'%')
                    ->orderBy('CALENDAR_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.calendar.calendar_list')->with('calendars', $calendars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $event_types = DB::table('scn_event_type')
                    ->select('scn_event_type.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();
        //
        return view('admin.calendar.calendar_create')->with('event_types', $event_types);
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
        $request->validate([
            'event_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'class_status' => 'required',
        ]);


        /*foreach($request->get('days') as $result) {
            echo $result.'<br>';
        }*/

        //
        /*$start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        //
        for( $start_date; $start_date <= $end_date; $start_date++ )
        {
            echo $start_date.'working <br/>';
        }*/






        // Set timezone
        date_default_timezone_set('UTC');
      
        // Start date
        $date = $request->get('start_date');
        // End date
        $end_date = $request->get('end_date');
      
        while (strtotime($date) <= strtotime($end_date)) {
            //echo "$date\n";
            $day = date('D', strtotime($date));

            foreach($request->get('days') as $result) {
                //echo $result.'<br>';
                if($day == $result){
                    //echo $date. '<br>';


                    // Primary Key Generator
                    $primary_key = DB::table('scn_academic_calendar')
                                ->select('scn_academic_calendar.CALENDAR_ID')
                                ->max('CALENDAR_ID');

                    if (isset($primary_key)) {
                        $calendar_id = $primary_key + '1';
                    }
                    else {
                        $calendar_id = '20190001';
                    }


                    $insert = DB::table('scn_academic_calendar')
                        ->insert([
                            'CALENDAR_ID' => $calendar_id,
                            //'EVENT_DATE' => $request->get('event_date'),
                            'EVENT_DATE' => $date,
                            'EVENT_TYPE_ID' => $request->get('event_type'),
                            'EVENT_DESC' => $request->get('content'),
                            'CLASS_OFF' => $request->get('class_status'),
                            'ACTIVE_STATUS' => '1',
                            'ENTERED_BY' => Auth::user()->id,
                            'ENTRY_TIMESTAMP' => Carbon::now()
                        ]);

                    //
                    Session::flash('success', 'Event Calendar Created Successfully!'); 


                }
                else{
                    Session::flash('error', 'Calendar Date And Day Are Not Matching!'); 
                }
            }




            //use +1 month to loop through months between start and end dates
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        }


        return redirect()->route('calendar.create');


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
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME')
                    ->where('CALENDAR_ID', $id)
                    ->get();

        //
        return view('admin.calendar.calendar_view')->with('calendars', $calendars);
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
        $event_types = DB::table('scn_event_type')
                    ->select('scn_event_type.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $calendars = DB::table('scn_academic_calendar')
                    ->select('scn_academic_calendar.*')
                    ->where('CALENDAR_ID', $id)
                    ->get();

        //
        return view('admin.calendar.calendar_edit')->with('event_types', $event_types)->with('calendars', $calendars);
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
        $request->validate([
            'event_type' => 'required',
            'event_date' => 'required',
            'class_status' => 'required',
        ]);


        $update = DB::table('scn_academic_calendar')
                ->where('CALENDAR_ID', $id)
                ->update([
                    'EVENT_DATE' => $request->get('event_date'),
                    'EVENT_TYPE_ID' => $request->get('event_type'),
                    'EVENT_DESC' => $request->get('content'),
                    'CLASS_OFF' => $request->get('class_status'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Event Calendar Updated Successfully!'); 

        //
        return redirect()->route('calendar.edit', [$id]);
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


    public function status(Request $request, $id)
    {
        //
        $calendars = DB::table('scn_academic_calendar')
                ->select('scn_academic_calendar.*')
                ->where('scn_academic_calendar.CALENDAR_ID', '=', $id)
                ->get();

        foreach( $calendars as $calendar ){
            if ($calendar->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_academic_calendar')
                        ->where('CALENDAR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($calendar->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_academic_calendar')
                        ->where('CALENDAR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $calendars = DB::table('scn_academic_calendar')
                    ->join('scn_event_type', 'scn_event_type.EVENT_TYPE_ID', '=', 'scn_academic_calendar.EVENT_TYPE_ID')
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME')
                    ->paginate(1);

        //
        return view('admin.calendar.calendar_list')->with('calendars', $calendars);

    }
}
