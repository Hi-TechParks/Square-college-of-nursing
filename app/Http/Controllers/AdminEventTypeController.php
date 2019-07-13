<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminEventTypeController extends Controller
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
        $event_types = DB::table('scn_event_type')
                    ->select('scn_event_type.*')
                    ->where('TYPE_NAME', 'LIKE', '%'.$request->get('type_name').'%')
                    ->orderBy('EVENT_TYPE_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.event_type.event_type_list')->with('event_types', $event_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.event_type.event_type_create');
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
            'type_name' => 'required',
            'color_code' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_event_type')
                    ->select('scn_event_type.EVENT_TYPE_ID')
                    ->max('EVENT_TYPE_ID');

        if (isset($primary_key)) {
            $event_type_id = $primary_key + '1';
        }
        else {
            $event_type_id = '20190001';
        }


        $insert = DB::table('scn_event_type')
            ->insert([
                'EVENT_TYPE_ID' => $event_type_id,
                'TYPE_NAME' => $request->get('type_name'),
                'TYPE_DESC' => $request->get('content'),
                'COLOR_CODE' => $request->get('color_code'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Event Type Created Successfully!'); 

        //
        return redirect()->route('event.type.create');
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
        $event_types = DB::table('scn_event_type')
                    ->select('scn_event_type.*')
                    ->where('EVENT_TYPE_ID', $id)
                    ->get();

        //
        return view('admin.event_type.event_type_view')->with('event_types', $event_types);
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
                    ->where('EVENT_TYPE_ID', $id)
                    ->get();

        //
        return view('admin.event_type.event_type_edit')->with('event_types', $event_types);
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
            'type_name' => 'required',
            'color_code' => 'required',
        ]);


        $update = DB::table('scn_event_type')
                ->where('EVENT_TYPE_ID', $id)
                ->update([
                    'TYPE_NAME' => $request->get('type_name'),
                    'TYPE_DESC' => $request->get('content'),
                    'COLOR_CODE' => $request->get('color_code'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Event Type Updated Successfully!'); 

        //
        return redirect()->route('event.type.edit', [$id]);
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
        $event_types = DB::table('scn_event_type')
                ->select('scn_event_type.*')
                ->where('scn_event_type.EVENT_TYPE_ID', '=', $id)
                ->get();

        foreach( $event_types as $event_type ){
            if ($event_type->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_event_type')
                        ->where('EVENT_TYPE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($event_type->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_event_type')
                        ->where('EVENT_TYPE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $event_types = DB::table('scn_event_type')
                    ->select('scn_event_type.*')
                    ->where('EVENT_TYPE_ID', $id)
                    ->paginate(1);

        //
        return view('admin.event_type.event_type_list')->with('event_types', $event_types);

    }
}
