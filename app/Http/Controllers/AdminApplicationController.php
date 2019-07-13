<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminApplicationController extends Controller
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
        $applications = DB::table('scn_admission_application_form')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_application_form.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_application_form.SESSION_ID')
                    ->select('scn_admission_application_form.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_admission_application_form.APPLICANT_NAME', 'LIKE', '%'.$request->get('applicant_name').'%')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->orderBy('ADMISSION_APPLICATION_FORM_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.application.application_list')->with('applications', $applications);
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
        return view('admin.application.application_create')
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
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Application Created Successfully!'); 

        //
        return redirect()->route('application.create');
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
        $applications = DB::table('scn_admission_application_form')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_application_form.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_application_form.SESSION_ID')
                    ->join('bg_country', 'bg_country.COUNTRY_ID', 'scn_admission_application_form.PERMANENT_COUNTRY_ID')
                    ->join('scn_admission_app_form_declartion', 'scn_admission_app_form_declartion.ADMISSION_APP_FORM_DECLARATION_ID', 'scn_admission_application_form.ADMISSION_APP_FORM_DECLARATION_ID')
                    ->select('scn_admission_application_form.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME', 'bg_country.COUNTRY_NAME', 'scn_admission_app_form_declartion.DECLARATION_TITLE')
                    ->where('scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID', $id)
                    ->get();


        $educations = DB::table('scn_admission_app_form_edu_past')
            ->join('scn_admission_application_form', 'scn_admission_app_form_edu_past.ADMISSION_APPLICATION_FORM_ID', '=', 'scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID')
            ->select('scn_admission_app_form_edu_past.*')
            ->where('scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID', $id)
            ->get();

        //
        return view('admin.application.application_view')->with('applications', $applications)->with('educations', $educations);
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
        $applications = DB::table('scn_admission_application_form')
                    ->select('scn_admission_application_form.*')
                    ->where('ADMISSION_APPLICATION_FORM_ID', $id)
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
        return view('admin.application.application_edit')
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
            'applicant_name' => 'required',
            'father_name' => 'required',
            'father_profession' => 'required',
            'mother_name' => 'required',
            'mother_profession' => 'required',
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
            'email' => 'required|email',
        ]);



        // image upload, fit and store inside public folder 
        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (450 width, 450 height)
            $thumbnailpath = 'uploads/images/applicant/'.$fileNameToStore;
            $img = Image::make($request->file('photo')->getRealPath())->fit(450, 450, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);



            $update = DB::table('scn_admission_application_form')
            ->where('ADMISSION_APPLICATION_FORM_ID', $id)
            ->update([
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
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);

        }
        else{
            
            $update = DB::table('scn_admission_application_form')
            ->where('ADMISSION_APPLICATION_FORM_ID', $id)
            ->update([
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'APPLICANT_NAME' => $request->get('applicant_name'),
                'FATHER_NAME' => $request->get('father_name'),
                'FATHER_PROFESSION' => $request->get('father_profession'),
                'MOTHER_NAME' => $request->get('mother_name'),
                'MOTHER_PROFESSION' => $request->get('mother_profession'),
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
                'LEGAL_GUARDIAN_NAME1' => $request->get('guardian_name_1'),
                'LEGAL_GUARDIAN_CONTACT_ADDRESS1' => $request->get('guardian_address_1'),
                'LEGAL_GUARDIAN_CONTACT_NO1' => $request->get('guardian_phone_1'),
                'LEGAL_GUARDIAN_RELATION1' => $request->get('guardian_relation_1'),
                'LEGAL_GUARDIAN_NAME2' => $request->get('guardian_name_2'),
                'LEGAL_GUARDIAN_CONTACT_ADDRESS2' => $request->get('guardian_address_2'),
                'LEGAL_GUARDIAN_CONTACT_NO2' => $request->get('guardian_phone_2'),
                'LEGAL_GUARDIAN_RELATION2' => $request->get('guardian_relation_2'),
                'ADMISSION_APP_FORM_DECLARATION_ID' => $request->get('declaration_title'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);
        }


        

        Session::flash('success', 'Application Updated Successfully!'); 

        //
        return redirect()->route('application.edit', [$id]);
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
        $applications = DB::table('scn_admission_application_form')
                ->select('scn_admission_application_form.*')
                ->where('scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID', '=', $id)
                ->get();

        foreach( $applications as $application ){
            if ($application->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_admission_application_form')
                        ->where('ADMISSION_APPLICATION_FORM_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($application->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_admission_application_form')
                        ->where('ADMISSION_APPLICATION_FORM_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $applications = DB::table('scn_admission_application_form')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_application_form.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_application_form.SESSION_ID')
                    ->select('scn_admission_application_form.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_admission_application_form.ADMISSION_APPLICATION_FORM_ID', $id)
                    ->paginate(1);

        //
        return view('admin.application.application_list')->with('applications', $applications);

    }
}
