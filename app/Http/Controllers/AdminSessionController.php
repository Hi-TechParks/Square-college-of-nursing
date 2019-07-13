<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminSessionController extends Controller
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
        //
        $sessions = DB::table('scn_session')
                    ->select('scn_session.*')
                    ->where('SESSION_NAME', 'LIKE', '%'.$request->get('session_name').'%')
                    ->orderBy('SESSION_ID', 'DESC')
                    ->paginate(10);
        //
        return view('admin.session.session_list')->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.session.session_create');
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
            'session_name' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_session')
                    ->select('scn_session.SESSION_ID')
                    ->max('SESSION_ID');

        if (isset($primary_key)) {
            $session_id = $primary_key + '1';
        }
        else {
            $session_id = '20190001';
        }


        //
        $insert = DB::table('scn_session')
                ->insert([
                    'SESSION_ID' => $session_id,
                    'SESSION_NAME' => $request->get('session_name'),
                    'START_DATE' => $request->get('start_date'),
                    'END_DATE' => $request->get('end_date'),
                    'ACTIVE_STATUS' => '1',
                    'ENTERED_BY' => Auth::user()->id,
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Session Created Successfully!');


        //
        return redirect()->route('session.create');
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
        $sessions = DB::table('scn_session')
                    ->select('scn_session.*')
                    ->where('SESSION_ID', $id)
                    ->get();

        //
        return view('admin.session.session_edit')->with('sessions', $sessions);
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
            'session_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

            
        //
        $update = DB::table('scn_session')
                ->where('SESSION_ID', $id)
                ->update([
                    'SESSION_NAME' => $request->get('session_name'),
                    'START_DATE' => $request->get('start_date'),
                    'END_DATE' => $request->get('end_date'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);


        Session::flash('success', 'Session Updated Successfully!');


        //
        return redirect()->route('session.edit', [$id]);
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
        $sessions = DB::table('scn_session')
                ->select('scn_session.*')
                ->where('scn_session.SESSION_ID', '=', $id)
                ->get();

        foreach( $sessions as $session ){
            if ($session->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_session')
                        ->where('SESSION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($session->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_session')
                        ->where('SESSION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $sessions = DB::table('scn_session')
                    ->select('scn_session.*')
                    ->where('SESSION_ID', $id)
                    ->orderBy('SESSION_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.session.session_list')->with('sessions', $sessions);

    }
}
