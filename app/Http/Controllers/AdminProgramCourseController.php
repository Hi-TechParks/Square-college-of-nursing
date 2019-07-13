<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminProgramCourseController extends Controller
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
        $procourses = DB::table('scn_program_course')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', '=', 'scn_program_course.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', '=', 'scn_program_course.SESSION_ID')
                    ->join('scn_year', 'scn_year.YEAR_ID', '=', 'scn_program_course.YEAR_ID')
                    ->join('scn_course', 'scn_course.COURSE_ID', '=', 'scn_program_course.COURSE_ID')
                    ->select('scn_program_course.*', 'scn_program.PROGRAM_NAME', 'scn_session.SESSION_NAME', 'scn_year.YEAR_NAME', 'scn_course.COURSE_NAME')
                    ->where('scn_course.COURSE_NAME', 'LIKE', '%'.$request->get('course_name').'%')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->orderBy('PROGRAM_COURSE_ID', 'ASC')
                    ->paginate(10);
        //
        return view('admin.program_course.program_course_list')->with('procourses', $procourses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = DB::table('scn_course')
                    ->select('scn_course.*')
                    ->where('ACTIVE_STATUS', '1')
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
        return view('admin.program_course.program_course_create')
                                ->with('courses', $courses)
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
            'course_name' => 'required',
            'program_name' => 'required',
            'session_name' => 'required',
            'year_name' => 'required',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_program_course')
                    ->select('scn_program_course.PROGRAM_COURSE_ID')
                    ->max('PROGRAM_COURSE_ID');

        if (isset($primary_key)) {
            $course_id = $primary_key + '1';
        }
        else {
            $course_id = '20190001';
        }


        //
        $insert = DB::table('scn_program_course')
                ->insert([
                    'PROGRAM_COURSE_ID' => $course_id,
                    'COURSE_ID' => $request->get('course_name'),
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'YEAR_ID' => $request->get('year_name'),
                    'ACTIVE_STATUS' => '1',
                    'ENTERED_BY' => Auth::user()->id,
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Program Course Created Successfully!');


        //
        return redirect()->route('procourse.create');
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
        $procourses = DB::table('scn_program_course')
                    ->select('scn_program_course.*')
                    ->where('PROGRAM_COURSE_ID', $id)
                    ->get();


        //
        $courses = DB::table('scn_course')
                    ->select('scn_course.*')
                    ->where('ACTIVE_STATUS', '1')
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
        return view('admin.program_course.program_course_edit')
                                ->with('procourses', $procourses)
                                ->with('courses', $courses)
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
            'course_name' => 'required',
            'program_name' => 'required',
            'session_name' => 'required',
            'year_name' => 'required',
        ]);

            
        //
        $update = DB::table('scn_program_course')
                ->where('PROGRAM_COURSE_ID', $id)
                ->update([
                    'COURSE_ID' => $request->get('course_name'),
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'YEAR_ID' => $request->get('year_name'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);


        Session::flash('success', 'Program Course Updated Successfully!');


        //
        return redirect()->route('procourse.edit', [$id]);
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
        $courses = DB::table('scn_program_course')
                ->select('scn_program_course.*')
                ->where('scn_program_course.PROGRAM_COURSE_ID', '=', $id)
                ->get();

        foreach( $courses as $course ){
            if ($course->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_program_course')
                        ->where('PROGRAM_COURSE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($course->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_program_course')
                        ->where('PROGRAM_COURSE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $procourses = DB::table('scn_program_course')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', '=', 'scn_program_course.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', '=', 'scn_program_course.SESSION_ID')
                    ->join('scn_year', 'scn_year.YEAR_ID', '=', 'scn_program_course.YEAR_ID')
                    ->join('scn_course', 'scn_course.COURSE_ID', '=', 'scn_program_course.COURSE_ID')
                    ->select('scn_program_course.*', 'scn_program.PROGRAM_NAME', 'scn_session.SESSION_NAME', 'scn_year.YEAR_NAME', 'scn_course.COURSE_NAME')
                    ->where('scn_program_course.PROGRAM_COURSE_ID', $id)
                    ->orderBy('scn_program_course.PROGRAM_COURSE_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.program_course.program_course_list')->with('procourses', $procourses);

    }
}
