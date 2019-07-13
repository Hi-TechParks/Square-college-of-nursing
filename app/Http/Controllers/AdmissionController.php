<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use DB;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                    ->limit(1)
                    ->orderBy('ADMISSION_APP_FORM_DECLARATION_ID', 'DESC')
                    ->get();

        //
        return view('admission')
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
            'applicant_name' => 'required',
            'father_name' => 'required',
            'father_profession' => 'required',
            'mother_name' => 'required',
            'mother_profession' => 'required',
            'birth_date' => 'required|date',
            'photo' => 'required|image',
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
            'email' => 'required|email',


            'ssc_group' => 'required',
            'ssc_year' => 'required|numeric|digits_between:2,4',
            'ssc_roll' => 'required|numeric',
            'ssc_reg' => 'required|numeric',
            'ssc_board' => 'required',
            'ssc_gpa' => 'required|min:2|max:4',
            'ssc_biology' => 'required|min:2|max:6',

            'hsc_group' => 'required',
            'hsc_year' => 'required|numeric|digits_between:2,4',
            'hsc_roll' => 'required|numeric',
            'hsc_reg' => 'required|numeric',
            'hsc_board' => 'required',
            'hsc_gpa' => 'required|min:2|max:4',
            'hsc_biology' => 'required|min:2|max:6',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_admission_application_form')
                    ->select('scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID')
                    ->max('ADMISSION_APPLICATION_FORM_ID');

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
            $thumbnailpath = 'uploads/images/applicant/'.$fileNameToStore;
            $img = Image::make($request->file('photo')->getRealPath())->fit(450, 450, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('scn_admission_application_form')
            ->insert([
                'ADMISSION_APPLICATION_FORM_ID' => $application_id,
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'APPLICANT_NAME' => $request->get('applicant_name'),
                'FATHER_NAME' => $request->get('father_name'),
                'FATHER_PROFESSION' => $request->get('father_profession'),
                'MOTHER_NAME' => $request->get('mother_name'),
                'MOTHER_PROFESSION' => $request->get('mother_profession'),
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
                'LEGAL_GUARDIAN_NAME1' => $request->get('guardian_name_1'),
                'LEGAL_GUARDIAN_CONTACT_ADDRESS1' => $request->get('guardian_address_1'),
                'LEGAL_GUARDIAN_CONTACT_NO1' => $request->get('guardian_phone_1'),
                'LEGAL_GUARDIAN_RELATION1' => $request->get('guardian_relation_1'),
                'LEGAL_GUARDIAN_NAME2' => $request->get('guardian_name_2'),
                'LEGAL_GUARDIAN_CONTACT_ADDRESS2' => $request->get('guardian_address_2'),
                'LEGAL_GUARDIAN_CONTACT_NO2' => $request->get('guardian_phone_2'),
                'LEGAL_GUARDIAN_RELATION2' => $request->get('guardian_relation_2'),
                'ADMISSION_APP_FORM_DECLARATION_ID' => $request->get('declaration_title'),
                'ACTIVE_STATUS' => '1',
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);



        //
        $insert = DB::table('scn_admission_app_form_edu_past')
            ->insert([
                'ADMISSION_APPLICATION_FORM_ID' => $application_id,
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
        $insert = DB::table('scn_admission_app_form_edu_past')
            ->insert([
                'ADMISSION_APPLICATION_FORM_ID' => $application_id,
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
            ]);



        Session::flash('success', 'Application Submit Successfully!'); 

        //
        return redirect()->route('admission.create');
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
