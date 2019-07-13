<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminResultController extends Controller
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
        $results = DB::table('scn_exam_result')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', '=', 'scn_exam_result.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', '=', 'scn_exam_result.SESSION_ID')
                    ->join('scn_year', 'scn_year.YEAR_ID', '=', 'scn_exam_result.YEAR_ID')
                    ->select('scn_exam_result.*', 'scn_program.PROGRAM_NAME', 'scn_session.SESSION_NAME', 'scn_year.YEAR_NAME')
                    ->where('scn_session.SESSION_NAME', 'LIKE', '%'.$request->get('session_name').'%')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->orderBy('EXAM_RESULT_ID', 'ASC')
                    ->paginate(10);
        //
        return view('admin.result.result_list')->with('results', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $programs = DB::table('scn_program')
                    ->select('scn_program.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $sessions = DB::table('scn_session')
                    ->select('scn_session.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $years = DB::table('scn_year')
                    ->select('scn_year.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();
        //
        return view('admin.result.result_create')
                                ->with('programs', $programs)
                                ->with('sessions', $sessions)
                                ->with('years', $years);
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
            'exam_type' => 'required',
            'program_name' => 'required',
            'session_name' => 'required',
            'year_name' => 'required',
            'file' => 'required|file',
            'publish_start' => 'required|date|after_or_equal:today',
            'publish_end' => 'required|date|after_or_equal:publish_start',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_exam_result')
                    ->select('scn_exam_result.EXAM_RESULT_ID')
                    ->max('EXAM_RESULT_ID');

        if (isset($primary_key)) {
            $result_id = $primary_key + '1';
        }
        else {
            $result_id = '20190001';
        }


        // File upload, fit and store inside public folder 
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            

            $path = 'uploads/images/result/';
            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        //
        $insert = DB::table('scn_exam_result')
                ->insert([
                    'EXAM_RESULT_ID' => $result_id,
                    'EXAM_TYPE' => $request->get('exam_type'),
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'YEAR_ID' => $request->get('year_name'),
                    'FILE_PATH' => $fileNameToStore,
                    'SHOW_FROM_DATE' => $request->get('publish_start'),
                    'SHOW_END_DATE' => $request->get('publish_end'),
                    'ACTIVE_STATUS' => '1',
                    'ENTERED_BY' => Auth::user()->id,
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Result Created Successfully!');


        //
        return redirect()->route('result.create');
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
        $results = DB::table('scn_exam_result')
                    ->select('scn_exam_result.*')
                    ->where('EXAM_RESULT_ID', $id)
                    ->get();

        //
        $programs = DB::table('scn_program')
                    ->select('scn_program.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $sessions = DB::table('scn_session')
                    ->select('scn_session.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $years = DB::table('scn_year')
                    ->select('scn_year.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('admin.result.result_edit')
                                ->with('results', $results)
                                ->with('programs', $programs)
                                ->with('sessions', $sessions)
                                ->with('years', $years);
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
            'exam_type' => 'required',
            'program_name' => 'required',
            'session_name' => 'required',
            'year_name' => 'required',
            'file' => 'nullable|file',
            'publish_start' => 'required|date',
            'publish_end' => 'required|date|after_or_equal:publish_start',
        ]);


        // File upload, fit and store inside public folder 
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            

            $path = 'uploads/images/result/';
            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);


            //
            $update = DB::table('scn_exam_result')
                ->where('EXAM_RESULT_ID', $id)
                ->update([
                    'EXAM_TYPE' => $request->get('exam_type'),
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'YEAR_ID' => $request->get('year_name'),
                    'FILE_PATH' => $fileNameToStore,
                    'SHOW_FROM_DATE' => $request->get('publish_start'),
                    'SHOW_END_DATE' => $request->get('publish_end'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{
            
            //
            $update = DB::table('scn_exam_result')
                ->where('EXAM_RESULT_ID', $id)
                ->update([
                    'EXAM_TYPE' => $request->get('exam_type'),
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'YEAR_ID' => $request->get('year_name'),
                    'SHOW_FROM_DATE' => $request->get('publish_start'),
                    'SHOW_END_DATE' => $request->get('publish_end'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
        }


        Session::flash('success', 'Result Updated Successfully!');


        //
        return redirect()->route('result.edit', [$id]);
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
        $results = DB::table('scn_exam_result')
                ->select('scn_exam_result.*')
                ->where('scn_exam_result.EXAM_RESULT_ID', '=', $id)
                ->get();

        foreach( $results as $result ){
            if ($result->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_exam_result')
                        ->where('EXAM_RESULT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($result->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_exam_result')
                        ->where('EXAM_RESULT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $results = DB::table('scn_exam_result')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', '=', 'scn_exam_result.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', '=', 'scn_exam_result.SESSION_ID')
                    ->join('scn_year', 'scn_year.YEAR_ID', '=', 'scn_exam_result.YEAR_ID')
                    ->select('scn_exam_result.*', 'scn_program.PROGRAM_NAME', 'scn_session.SESSION_NAME', 'scn_year.YEAR_NAME')
                    ->where('scn_exam_result.EXAM_RESULT_ID', $id)
                    ->orderBy('scn_exam_result.EXAM_RESULT_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.result.result_list')->with('results', $results);

    }
}
