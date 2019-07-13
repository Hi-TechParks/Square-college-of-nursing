<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminAboutUsController extends Controller
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
    public function edit()
    {
        //
        $abouts = DB::table('scn_about_us')
                    ->select('scn_about_us.*')
                    ->where('ABOUT_US_ID', '=', '1')
                    ->get();

        //
        return view('admin.about_us_edit')->with('abouts', $abouts);
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
            'content' => 'required',
            'about_image' => 'nullable|image',
        ]);

        
        // image upload, fit and store inside public folder 
        if($request->hasFile('about_image')){
            $filenameWithExt = $request->file('about_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('about_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (500 width, 280 height)
            $thumbnailpath = 'uploads/images/'.$fileNameToStore;
            $img = Image::make($request->file('about_image')->getRealPath())->fit(500, 280, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);

            //
            $update = DB::table('scn_about_us')
                        ->where('ABOUT_US_ID', $id)
                        ->update([
                            'ABOUT_US_CONTENT' => $request->get('content'),
                            'IMAGE_FILE_PATH' => $fileNameToStore,
                            'UPDATED_BY' => Auth::user()->id,
                            'UPDATE_TIMESTAMP' => Carbon::now()
                        ]);
        }
        else{
            
            //
            $update = DB::table('scn_about_us')
                        ->where('ABOUT_US_ID', $id)
                        ->update([
                            'ABOUT_US_CONTENT' => $request->get('content'),
                            'UPDATED_BY' => Auth::user()->id,
                            'UPDATE_TIMESTAMP' => Carbon::now()
                        ]);

        }


        Session::flash('success', 'About Details Updated Successfully!');


        //
        return redirect()->route('about.edit');
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
