<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminGalleryController extends Controller
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
        $images = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.*')
                    ->where('IMAGE_TITLE', 'LIKE', '%'.$request->get('image_title').'%')
                    ->orderBy('IMAGE_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.gallery.gallery_list')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gallery.gallery_create');
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
            'image_title' => 'required',
            'gallery_image' => 'image|required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.IMAGE_ID')
                    ->max('IMAGE_ID');

        if (isset($primary_key)) {
            $image_id = $primary_key + '1';
        }
        else {
            $image_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('gallery_image')){
            $filenameWithExt = $request->file('gallery_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('gallery_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (400 width, 250 height)
            $thumbnailpath = 'uploads/images/gallery/thumb/'.$fileNameToStore;
            $img = Image::make($request->file('gallery_image')->getRealPath())->resize(100, 60)->save($thumbnailpath);

            //Resize And Crop as Fit image here (400 width, 250 height)
            $imagepath = 'uploads/images/gallery/'.$fileNameToStore;
            $img = Image::make($request->file('gallery_image')->getRealPath())->
            resize(800, null, function ($constraint) { $constraint->aspectRatio(); })->save($imagepath);

        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('scn_image_gallery')
            ->insert([
                'IMAGE_ID' => $image_id,
                'IMAGE_TITLE' => $request->get('image_title'),
                'IMAGE_DESC' => $request->get('content'),
                'HOME_PAGE_SHOW_FLAG' => $request->get('show_home'),
                'SL_NO' => $request->get('serial_no'),
                'IMAGE_FILE_PATH' => $fileNameToStore,
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Gallery Created Successfully!'); 

        //
        return redirect()->route('gallery.create');

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
        $images = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.*')
                    ->where('IMAGE_ID', $id)
                    ->get();

        //
        return view('admin.gallery.gallery_view')->with('images', $images);
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
        $images = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.*')
                    ->where('IMAGE_ID', $id)
                    ->get();

        //
        return view('admin.gallery.gallery_edit')->with('images', $images);
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
            'image_title' => 'required',
            'gallery_image' => 'image|nullable',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('gallery_image')){
            $filenameWithExt = $request->file('gallery_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('gallery_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (400 width, 250 height)
            $thumbnailpath = 'uploads/images/gallery/thumb/'.$fileNameToStore;
            $img = Image::make($request->file('gallery_image')->getRealPath())->resize(100, 60)->save($thumbnailpath);

            //Resize And Crop as Fit image here (400 width, 250 height)
            $imagepath = 'uploads/images/gallery/'.$fileNameToStore;
            $img = Image::make($request->file('gallery_image')->getRealPath())->
            resize(800, null, function ($constraint) { $constraint->aspectRatio(); })->save($imagepath);


            $update = DB::table('scn_image_gallery')
                ->where('IMAGE_ID', $id)
                ->update([
                    'IMAGE_TITLE' => $request->get('image_title'),
                    'IMAGE_DESC' => $request->get('content'),
                    'HOME_PAGE_SHOW_FLAG' => $request->get('show_home'),
                    'SL_NO' => $request->get('serial_no'),
                    'IMAGE_FILE_PATH' => $fileNameToStore,
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{

            $update = DB::table('scn_image_gallery')
                ->where('IMAGE_ID', $id)
                ->update([
                    'IMAGE_TITLE' => $request->get('image_title'),
                    'IMAGE_DESC' => $request->get('content'),
                    'HOME_PAGE_SHOW_FLAG' => $request->get('show_home'),
                    'SL_NO' => $request->get('serial_no'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
            
        }

        Session::flash('success', 'Gallery Updated Successfully!'); 

        //
        return redirect()->route('gallery.edit', [$id]);
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
        $images = DB::table('scn_image_gallery')
                ->select('scn_image_gallery.*')
                ->where('scn_image_gallery.IMAGE_ID', '=', $id)
                ->get();

        foreach( $images as $image ){
            if ($image->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_image_gallery')
                        ->where('IMAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($image->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_image_gallery')
                        ->where('IMAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $images = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.*')
                    ->where('IMAGE_ID', $id)
                    ->paginate(1);

        //
        return view('admin.gallery.gallery_list')->with('images', $images);

    }
}
