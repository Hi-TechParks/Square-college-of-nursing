<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminTestimonialController extends Controller
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
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('TESTIMONIAL_BY_NAME', 'LIKE', '%'.$request->get('reviewer_name').'%')
                    ->orderBy('TESTIMONIAL_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.testimonial.testimonial_list')->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonial.testimonial_create');
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
            'reviewer_name' => 'required',
            'reviewer_details' => 'required',
            'content' => 'required',
            'reviewer_image' => 'image|required',
            'serial_no' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_testimonial')
                    ->select('scn_testimonial.TESTIMONIAL_ID')
                    ->max('TESTIMONIAL_ID');

        if (isset($primary_key)) {
            $testimonial_id = $primary_key + '1';
        }
        else {
            $testimonial_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('reviewer_image')){
            $filenameWithExt = $request->file('reviewer_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('reviewer_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/reviewer/'.$fileNameToStore;
            $img = Image::make($request->file('reviewer_image')->getRealPath())->fit(100, 100, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('scn_testimonial')
            ->insert([
                'TESTIMONIAL_ID' => $testimonial_id,
                'TESTIMONIAL_BY_NAME' => $request->get('reviewer_name'),
                'TESTIMONIAL_BY_DESC' => $request->get('reviewer_details'),
                'TESTIMONIAL_CONTENT' => $request->get('content'),
                'IMAGE_PATH' => $fileNameToStore,
                'SL_NO' => $request->get('serial_no'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Testimonial Created Successfully!'); 

        //
        return redirect()->route('testimonial.create');
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
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('TESTIMONIAL_ID', $id)
                    ->get();

        //
        return view('admin.testimonial.testimonial_view')->with('testimonials', $testimonials);
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
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('TESTIMONIAL_ID', $id)
                    ->get();

        //
        return view('admin.testimonial.testimonial_edit')->with('testimonials', $testimonials);
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
            'reviewer_name' => 'required',
            'reviewer_details' => 'required',
            'content' => 'required',
            'reviewer_image' => 'image|nullable',
            'serial_no' => 'required',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('reviewer_image')){
            $filenameWithExt = $request->file('reviewer_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('reviewer_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/reviewer/'.$fileNameToStore;
            $img = Image::make($request->file('reviewer_image')->getRealPath())->fit(1920, 800, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);


            $update = DB::table('scn_testimonial')
                ->where('TESTIMONIAL_ID', $id)
                ->update([
                    'TESTIMONIAL_BY_NAME' => $request->get('reviewer_name'),
                    'TESTIMONIAL_BY_DESC' => $request->get('reviewer_details'),
                    'TESTIMONIAL_CONTENT' => $request->get('content'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'SL_NO' => $request->get('serial_no'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{

            $update = DB::table('scn_testimonial')
                ->where('TESTIMONIAL_ID', $id)
                ->update([
                    'TESTIMONIAL_BY_NAME' => $request->get('reviewer_name'),
                    'TESTIMONIAL_BY_DESC' => $request->get('reviewer_details'),
                    'TESTIMONIAL_CONTENT' => $request->get('content'),
                    'SL_NO' => $request->get('serial_no'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
            
        }

        Session::flash('success', 'Testimonial Updated Successfully!'); 

        //
        return redirect()->route('testimonial.edit', [$id]);
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
        $testimonials = DB::table('scn_testimonial')
                ->select('scn_testimonial.*')
                ->where('scn_testimonial.TESTIMONIAL_ID', '=', $id)
                ->get();

        foreach( $testimonials as $testimonial ){
            if ($testimonial->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_testimonial')
                        ->where('TESTIMONIAL_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($testimonial->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_testimonial')
                        ->where('TESTIMONIAL_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('TESTIMONIAL_ID', $id)
                    ->paginate(1);

        //
        return view('admin.testimonial.testimonial_list')->with('testimonials', $testimonials);

    }
}
