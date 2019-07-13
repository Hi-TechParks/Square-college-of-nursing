<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminDeclarationController extends Controller
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
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_app_form_declartion.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_app_form_declartion.SESSION_ID')
                    ->select('scn_admission_app_form_declartion.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_admission_app_form_declartion.DECLARATION_TITLE', 'LIKE', '%'.$request->get('declartion_title').'%')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->orderBy('ADMISSION_APP_FORM_DECLARATION_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.declaration.declaration_list')->with('declarations', $declarations);
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
        return view('admin.declaration.declaration_create')->with('programs', $programs)->with('sessions', $sessions);
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
            'declaration_title' => 'required',
            'content' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_admission_app_form_declartion')
                    ->select('scn_admission_app_form_declartion.ADMISSION_APP_FORM_DECLARATION_ID')
                    ->max('ADMISSION_APP_FORM_DECLARATION_ID');

        if (isset($primary_key)) {
            $declartion_id = $primary_key + '1';
        }
        else {
            $declartion_id = '20190001';
        }


        $insert = DB::table('scn_admission_app_form_declartion')
            ->insert([
                'ADMISSION_APP_FORM_DECLARATION_ID' => $declartion_id,
                'PROGRAM_ID' => $request->get('program_name'),
                'SESSION_ID' => $request->get('session_name'),
                'DECLARATION_TITLE' => $request->get('declaration_title'),
                'DECLARATION' => $request->get('content'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Declaration Created Successfully!'); 

        //
        return redirect()->route('declaration.create');
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
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_app_form_declartion.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_app_form_declartion.SESSION_ID')
                    ->select('scn_admission_app_form_declartion.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_admission_app_form_declartion.ADMISSION_APP_FORM_DECLARATION_ID', $id)
                    ->get();

        //
        return view('admin.declaration.declaration_view')->with('declarations', $declarations);
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
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->select('scn_admission_app_form_declartion.*')
                    ->where('ADMISSION_APP_FORM_DECLARATION_ID', $id)
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
        return view('admin.declaration.declaration_edit')
                    ->with('declarations', $declarations)
                    ->with('programs', $programs)
                    ->with('sessions', $sessions);
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
            'declaration_title' => 'required',
            'content' => 'required',
        ]);


        $update = DB::table('scn_admission_app_form_declartion')
                ->where('ADMISSION_APP_FORM_DECLARATION_ID', $id)
                ->update([
                    'PROGRAM_ID' => $request->get('program_name'),
                    'SESSION_ID' => $request->get('session_name'),
                    'DECLARATION_TITLE' => $request->get('declaration_title'),
                    'DECLARATION' => $request->get('content'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Declaration Updated Successfully!'); 

        //
        return redirect()->route('declaration.edit', [$id]);
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
        $declarations = DB::table('scn_admission_app_form_declartion')
                ->select('scn_admission_app_form_declartion.*')
                ->where('scn_admission_app_form_declartion.ADMISSION_APP_FORM_DECLARATION_ID', '=', $id)
                ->get();

        foreach( $declarations as $declaration ){
            if ($declaration->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_admission_app_form_declartion')
                        ->where('ADMISSION_APP_FORM_DECLARATION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($declaration->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_admission_app_form_declartion')
                        ->where('ADMISSION_APP_FORM_DECLARATION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $declarations = DB::table('scn_admission_app_form_declartion')
                    ->join('scn_program', 'scn_program.PROGRAM_ID', 'scn_admission_app_form_declartion.PROGRAM_ID')
                    ->join('scn_session', 'scn_session.SESSION_ID', 'scn_admission_app_form_declartion.SESSION_ID')
                    ->select('scn_admission_app_form_declartion.*','scn_program.PROGRAM_NAME','scn_session.SESSION_NAME')
                    ->where('scn_admission_app_form_declartion.ADMISSION_APP_FORM_DECLARATION_ID', $id)
                    ->paginate(1);

        //
        return view('admin.declaration.declaration_list')->with('declarations', $declarations);

    }
}
