<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminStudentController extends Controller
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
        $applications = DB::table('scn_student')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_student.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_student.SESSION_ID')
                    ->select('scn_student.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_student.STUDENT_NAME', 'LIKE', '%'.$request->get('student_name').'%')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->orderBy('STUDENT_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.student.student_list')->with('applications', $applications);
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
        $countries = DB::table('bg_country')
                    ->select('bg_country.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('COUNTRY_NAME', 'ASC')
                    ->get();

        //
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->select('scn_admission_app_form_declartion.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('admin.student.student_create')
                    ->with('programs', $programs)
                    ->with('sessions', $sessions)
                    ->with('countries', $countries)
                    ->with('declarations', $declarations);
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
            'program_name' => 'required',
            'session_name' => 'required',
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image',
            'birth_place' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'country_name' => 'required',
            'permanent_address' => 'required',
            'upazila' => 'required',
            'district' => 'required',
            'contact_address' => 'required',
            'contact_no' => 'required',
            'email' => 'email',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_student')
                    ->select('scn_student.STUDENT_ID')
                    ->max('STUDENT_ID');

        if (isset($primary_key)) {
            $application_id = $primary_key + '1';
        }
        else {
            $application_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (450 width, 450 height)
            $thumbnailpath = 'uploads/images/student/'.$fileNameToStore;
            $img = Image::make($request->file('photo')->getRealPath())->fit(450, 450, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('scn_student')
            ->insert([
                'STUDENT_ID' => $application_id,
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'STUDENT_NAME' => $request->get('student_name'),
                'FATHER_NAME' => $request->get('father_name'),
                'MOTHER_NAME' => $request->get('mother_name'),
                'DOB' => $request->get('birth_date'),
                'APPLICANT_PHOTO_PATH' => $fileNameToStore,
                'BIRTH_PLACE' => $request->get('birth_place'),
                'MARITAL_STATUS' => $request->get('marital_status'),
                'NATIONALITY' => $request->get('nationality'),
                'NATIONAL_ID' => $request->get('national_id'),
                'RELIGION' => $request->get('religion'),
                'PERMANENT_COUNTRY_ID' => $request->get('country_name'),
                'PERMANENT_ADDRESS' => $request->get('permanent_address'),
                'PERMANENT_UPAZILLA' => $request->get('upazila'),
                'PERMANENT_DISTRICT' => $request->get('district'),
                'CONTACT_ADDRESS' => $request->get('contact_address'),
                'CONTACT_NO' => $request->get('contact_no'),
                'EMAIL_ID' => $request->get('email'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);



        /*//
        $insert = DB::table('scn_student_edu_past')
            ->insert([
                'STUDENT_ID' => $application_id,
                'EXAM_NAME' => 'SSC',
                'GROUP_NAME' => $request->get('ssc_group'),
                'YEAR_PASSED' => $request->get('ssc_year'),
                'ROLL_NO' => $request->get('ssc_roll'),
                'REG_NO' => $request->get('ssc_reg'),
                'BOARD_NAME' => $request->get('ssc_board'),
                'GPA_WITH_OPTIONAL_SUBJECT' => $request->get('ssc_gpa'),
                'MARKS_BIOLOGY' => $request->get('ssc_biology'),
                'ACTIVE_STATUS' => '1',
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        //
        $insert = DB::table('scn_student_edu_past')
            ->insert([
                'STUDENT_ID' => $application_id,
                'EXAM_NAME' => 'HSC',
                'GROUP_NAME' => $request->get('hsc_group'),
                'YEAR_PASSED' => $request->get('hsc_year'),
                'ROLL_NO' => $request->get('hsc_roll'),
                'REG_NO' => $request->get('hsc_reg'),
                'BOARD_NAME' => $request->get('hsc_board'),
                'GPA_WITH_OPTIONAL_SUBJECT' => $request->get('hsc_gpa'),
                'MARKS_BIOLOGY' => $request->get('hsc_biology'),
                'ACTIVE_STATUS' => '1',
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);*/


        Session::flash('success', 'Student Created Successfully!'); 

        //
        return redirect()->route('student.create');
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
        $applications = DB::table('scn_student')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_student.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_student.SESSION_ID')
                    ->join('bg_country', 'bg_country.COUNTRY_ID', 'scn_student.PERMANENT_COUNTRY_ID')
                    ->select('scn_student.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME', 'bg_country.COUNTRY_NAME')
                    ->where('scn_student.STUDENT_ID', $id)
                    ->get();


        $educations = DB::table('scn_student_edu_past')
            ->join('scn_student', 'scn_student_edu_past.STUDENT_ID', '=', 'scn_student.STUDENT_ID')
            ->select('scn_student_edu_past.*')
            ->where('scn_student.STUDENT_ID', $id)
            ->get();

        //
        return view('admin.student.student_view')->with('applications', $applications)->with('educations', $educations);
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
        $applications = DB::table('scn_student')
                    ->select('scn_student.*')
                    ->where('STUDENT_ID', $id)
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
        $countries = DB::table('bg_country')
                    ->select('bg_country.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('COUNTRY_NAME', 'ASC')
                    ->get();

        //
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->select('scn_admission_app_form_declartion.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('admin.student.student_edit')
                    ->with('applications', $applications)
                    ->with('programs', $programs)
                    ->with('sessions', $sessions)
                    ->with('countries', $countries)
                    ->with('declarations', $declarations);
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
            'program_name' => 'required',
            'session_name' => 'required',
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image',
            'birth_place' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'country_name' => 'required',
            'permanent_address' => 'required',
            'upazila' => 'required',
            'district' => 'required',
            'contact_address' => 'required',
            'contact_no' => 'required',
            'email' => 'email',
        ]);



        // image upload, fit and store inside public folder 
        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (450 width, 450 height)
            $thumbnailpath = 'uploads/images/student/'.$fileNameToStore;
            $img = Image::make($request->file('photo')->getRealPath())->fit(450, 450, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);



            $update = DB::table('scn_student')
            ->where('STUDENT_ID', $id)
            ->update([
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'STUDENT_NAME' => $request->get('student_name'),
                'FATHER_NAME' => $request->get('father_name'),
                'MOTHER_NAME' => $request->get('mother_name'),
                'DOB' => $request->get('birth_date'),
                'APPLICANT_PHOTO_PATH' => $fileNameToStore,
                'BIRTH_PLACE' => $request->get('birth_place'),
                'MARITAL_STATUS' => $request->get('marital_status'),
                'NATIONALITY' => $request->get('nationality'),
                'NATIONAL_ID' => $request->get('national_id'),
                'RELIGION' => $request->get('religion'),
                'PERMANENT_COUNTRY_ID' => $request->get('country_name'),
                'PERMANENT_ADDRESS' => $request->get('permanent_address'),
                'PERMANENT_UPAZILLA' => $request->get('upazila'),
                'PERMANENT_DISTRICT' => $request->get('district'),
                'CONTACT_ADDRESS' => $request->get('contact_address'),
                'CONTACT_NO' => $request->get('contact_no'),
                'EMAIL_ID' => $request->get('email'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);

        }
        else{
            
            $update = DB::table('scn_student')
            ->where('STUDENT_ID', $id)
            ->update([
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'STUDENT_NAME' => $request->get('student_name'),
                'FATHER_NAME' => $request->get('father_name'),
                'MOTHER_NAME' => $request->get('mother_name'),
                'DOB' => $request->get('birth_date'),
                //'APPLICANT_PHOTO_PATH' => $fileNameToStore,
                'BIRTH_PLACE' => $request->get('birth_place'),
                'MARITAL_STATUS' => $request->get('marital_status'),
                'NATIONALITY' => $request->get('nationality'),
                'NATIONAL_ID' => $request->get('national_id'),
                'RELIGION' => $request->get('religion'),
                'PERMANENT_COUNTRY_ID' => $request->get('country_name'),
                'PERMANENT_ADDRESS' => $request->get('permanent_address'),
                'PERMANENT_UPAZILLA' => $request->get('upazila'),
                'PERMANENT_DISTRICT' => $request->get('district'),
                'CONTACT_ADDRESS' => $request->get('contact_address'),
                'CONTACT_NO' => $request->get('contact_no'),
                'EMAIL_ID' => $request->get('email'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);
        }


        

        Session::flash('success', 'Student Updated Successfully!'); 

        //
        return redirect()->route('student.edit', [$id]);
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
        $applications = DB::table('scn_student')
                ->select('scn_student.*')
                ->where('scn_student.STUDENT_ID', '=', $id)
                ->get();

        foreach( $applications as $application ){
            if ($application->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_student')
                        ->where('STUDENT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($application->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_student')
                        ->where('STUDENT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $applications = DB::table('scn_student')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_student.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_student.SESSION_ID')
                    ->select('scn_student.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_student.STUDENT_ID', $id)
                    ->paginate(1);

        //
        return view('admin.student.student_list')->with('applications', $applications);

    }
}
