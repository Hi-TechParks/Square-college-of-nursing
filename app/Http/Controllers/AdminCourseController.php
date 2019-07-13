<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminCourseController extends Controller
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
        $courses = DB::table('scn_course')
                    ->select('scn_course.*')
                    ->where('COURSE_NAME', 'LIKE', '%'.$request->get('course_name').'%')
                    ->orderBy('COURSE_ID', 'ASC')
                    ->paginate(10);
        //
        return view('admin.course.course_list')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.course.course_create');
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
            'short_code' => 'max:10',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_course')
                    ->select('scn_course.COURSE_ID')
                    ->max('COURSE_ID');

        if (isset($primary_key)) {
            $course_id = $primary_key + '1';
        }
        else {
            $course_id = '20190001';
        }


        //
        $insert = DB::table('scn_course')
                ->insert([
                    'COURSE_ID' => $course_id,
                    'COURSE_NAME' => $request->get('course_name'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'ACTIVE_STATUS' => '1',
                    'ENTERED_BY' => Auth::user()->id,
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Course Created Successfully!');


        //
        return redirect()->route('course.create');
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
        $courses = DB::table('scn_course')
                    ->select('scn_course.*')
                    ->where('COURSE_ID', $id)
                    ->get();

        //
        return view('admin.course.course_edit')->with('courses', $courses);
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
            'short_code' => 'max:10',
        ]);

            
        //
        $update = DB::table('scn_course')
                ->where('COURSE_ID', $id)
                ->update([
                    'COURSE_NAME' => $request->get('course_name'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);


        Session::flash('success', 'Course Updated Successfully!');


        //
        return redirect()->route('course.edit', [$id]);
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
        $courses = DB::table('scn_course')
                ->select('scn_course.*')
                ->where('scn_course.COURSE_ID', '=', $id)
                ->get();

        foreach( $courses as $course ){
            if ($course->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_course')
                        ->where('COURSE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($course->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_course')
                        ->where('COURSE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $courses = DB::table('scn_course')
                    ->select('scn_course.*')
                    ->where('COURSE_ID', $id)
                    ->orderBy('COURSE_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.course.course_list')->with('courses', $courses);

    }
}
