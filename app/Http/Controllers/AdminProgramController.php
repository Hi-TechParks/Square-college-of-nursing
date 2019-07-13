<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminProgramController extends Controller
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
        $programs = DB::table('scn_program')
                    ->join('scn_program_type', 'scn_program_type.PROGRAM_TYPE_ID', 'scn_program.PROGRAM_TYPE_ID')
                    ->select('scn_program.*','scn_program_type.TYPE_NAME')
                    ->where('scn_program.PROGRAM_NAME', 'LIKE', '%'.$request->get('program_name').'%')
                    ->where('scn_program_type.TYPE_NAME', 'LIKE', '%'.$request->get('category_name').'%')
                    ->orderBy('PROGRAM_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.program.program_list')->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $program_cates = DB::table('scn_program_type')
                    ->select('scn_program_type.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();
        //
        return view('admin.program.program_create')->with('program_cates', $program_cates);
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
            'category_name' => 'required',
            'program_name' => 'required',
            'period' => 'required',
            'period_unit' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_program')
                    ->select('scn_program.PROGRAM_ID')
                    ->max('PROGRAM_ID');

        if (isset($primary_key)) {
            $program_id = $primary_key + '1';
        }
        else {
            $program_id = '20190001';
        }


        $insert = DB::table('scn_program')
            ->insert([
                'PROGRAM_ID' => $program_id,
                'PROGRAM_NAME' => $request->get('program_name'),
                'PROGRAM_TYPE_ID' => $request->get('category_name'),
                'PROGRAM_PERIOD' => $request->get('period'),
                'PERIOD_UNIT' => $request->get('period_unit'),
                'PROGRAM_DESC' => $request->get('content'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Program Created Successfully!'); 

        //
        return redirect()->route('program.create');
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
        $programs = DB::table('scn_program')
                    ->join('scn_program_type', 'scn_program_type.PROGRAM_TYPE_ID', 'scn_program.PROGRAM_TYPE_ID')
                    ->select('scn_program.*','scn_program_type.TYPE_NAME')
                    ->where('scn_program.ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('admin.program.program_view')->with('programs', $programs);
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
        $program_cates = DB::table('scn_program_type')
                    ->select('scn_program_type.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $programs = DB::table('scn_program')
                    ->select('scn_program.*')
                    ->where('PROGRAM_ID', $id)
                    ->get();

        //
        return view('admin.program.program_edit')->with('programs', $programs)->with('program_cates', $program_cates);
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
            'category_name' => 'required',
            'program_name' => 'required',
            'period' => 'required',
            'period_unit' => 'required',
        ]);


        $update = DB::table('scn_program')
                ->where('PROGRAM_ID', $id)
                ->update([
                    'PROGRAM_NAME' => $request->get('program_name'),
                    'PROGRAM_TYPE_ID' => $request->get('category_name'),
                    'PROGRAM_PERIOD' => $request->get('period'),
                    'PERIOD_UNIT' => $request->get('period_unit'),
                    'PROGRAM_DESC' => $request->get('content'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Program Updated Successfully!'); 

        //
        return redirect()->route('program.edit', [$id]);
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
        $programs = DB::table('scn_program')
                ->select('scn_program.*')
                ->where('scn_program.PROGRAM_ID', '=', $id)
                ->get();

        foreach( $programs as $program ){
            if ($program->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_program')
                        ->where('PROGRAM_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($program->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_program')
                        ->where('PROGRAM_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $programs = DB::table('scn_program')
                    ->join('scn_program_type', 'scn_program_type.PROGRAM_TYPE_ID', 'scn_program.PROGRAM_TYPE_ID')
                    ->select('scn_program.*','scn_program_type.TYPE_NAME')
                    ->where('PROGRAM_ID', $id)
                    ->paginate(1);

        //
        return view('admin.program.program_list')->with('programs', $programs);

    }
}
