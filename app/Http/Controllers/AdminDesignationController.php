<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminDesignationController extends Controller
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
        $designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_NAME', 'LIKE', '%'.$request->get('designation_title').'%')
                    ->orderBy('DESIGNATION_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.designation.designation_list')->with('designations', $designations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.designation.designation_create');
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
            'designation' => 'required',
            'designation_type' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('bg_designation')
                    ->select('bg_designation.DESIGNATION_ID')
                    ->max('DESIGNATION_ID');

        if (isset($primary_key)) {
            $designation_id = $primary_key + '1';
        }
        else {
            $designation_id = '20190001';
        }


        $insert = DB::table('bg_designation')
            ->insert([
                'DESIGNATION_ID' => $designation_id,
                'DESIGNATION_NAME' => $request->get('designation'),
                'DESIGNATION_TYPE' => $request->get('designation_type'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Designation Created Successfully!'); 

        //
        return redirect()->route('designation.create');
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
        $designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_ID', $id)
                    ->get();

        //
        return view('admin.designation.designation_edit')->with('designations', $designations);
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
            'designation' => 'required',
            'designation_type' => 'required',
        ]);


        $update = DB::table('bg_designation')
                ->where('DESIGNATION_ID', $id)
                ->update([
                    'DESIGNATION_NAME' => $request->get('designation'),
                    'DESIGNATION_TYPE' => $request->get('designation_type'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Designation Updated Successfully!'); 

        //
        return redirect()->route('designation.edit', [$id]);
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
        $designations = DB::table('bg_designation')
                ->select('bg_designation.*')
                ->where('bg_designation.DESIGNATION_ID', '=', $id)
                ->get();

        foreach( $designations as $designation ){
            if ($designation->ACTIVE_STATUS == '1') {
                $update = DB::table('bg_designation')
                        ->where('DESIGNATION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($designation->ACTIVE_STATUS == '0') {
                $update = DB::table('bg_designation')
                        ->where('DESIGNATION_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_ID', $id)
                    ->paginate(1);

        //
        return view('admin.designation.designation_list')->with('designations', $designations);

    }
}
