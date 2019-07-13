<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminCountryController extends Controller
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
        $countries = DB::table('bg_country')
                    ->select('bg_country.*')
                    ->where('COUNTRY_NAME', 'LIKE', '%'.$request->get('country_name').'%')
                    ->orderBy('COUNTRY_NAME', 'ASC')
                    ->paginate(10);
        //
        return view('admin.country.country_list')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.country.country_create');
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
            'country_name' => 'required',
            'short_code' => 'max:2',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('bg_country')
                    ->select('bg_country.COUNTRY_ID')
                    ->max('COUNTRY_ID');

        if (isset($primary_key)) {
            $country_id = $primary_key + '1';
        }
        else {
            $country_id = '20190001';
        }


        //
        $insert = DB::table('bg_country')
                ->insert([
                    'COUNTRY_ID' => $country_id,
                    'COUNTRY_NAME' => $request->get('country_name'),
                    'SHORT_CODE_ISO' => $request->get('short_code'),
                    'ACTIVE_STATUS' => '1',
                    'ENTERED_BY' => Auth::user()->id,
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Country Created Successfully!');


        //
        return redirect()->route('country.create');
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
        $countries = DB::table('bg_country')
                    ->select('bg_country.*')
                    ->where('COUNTRY_ID', $id)
                    ->get();

        //
        return view('admin.country.country_edit')->with('countries', $countries);
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
            'country_name' => 'required',
            'short_code' => 'max:2',
        ]);

            
        //
        $update = DB::table('bg_country')
                ->where('COUNTRY_ID', $id)
                ->update([
                    'COUNTRY_NAME' => $request->get('country_name'),
                    'SHORT_CODE_ISO' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);


        Session::flash('success', 'Country Updated Successfully!');


        //
        return redirect()->route('country.edit', [$id]);
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
        $countries = DB::table('bg_country')
                ->select('bg_country.*')
                ->where('bg_country.COUNTRY_ID', '=', $id)
                ->get();

        foreach( $countries as $country ){
            if ($country->ACTIVE_STATUS == '1') {
                $update = DB::table('bg_country')
                        ->where('COUNTRY_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($country->ACTIVE_STATUS == '0') {
                $update = DB::table('bg_country')
                        ->where('COUNTRY_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $countries = DB::table('bg_country')
                    ->select('bg_country.*')
                    ->where('COUNTRY_ID', $id)
                    ->orderBy('COUNTRY_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.country.country_list')->with('countries', $countries);

    }
}
