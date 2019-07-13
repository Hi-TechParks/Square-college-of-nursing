<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminEventController extends Controller
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
        $events = DB::table('scn_event')
                    ->select('scn_event.*')
                    ->where('EVENT_TITLE', 'LIKE', '%'.$request->get('event_title').'%')
                    ->orderBy('EVENT_ID', 'DESC')
                    ->paginate(10);
        //
        return view('admin.event.event_list')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.event.event_create');
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
            'event_title' => 'required',
            'content' => 'required',
            'event_image' => 'nullable|image',
            'publish_start' => 'required|date|after_or_equal:today',
            'publish_end' => 'required|date|after_or_equal:publish_start',
            'event_date' => 'required|date|after_or_equal:publish_start',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_event')
                    ->select('scn_event.EVENT_ID')
                    ->max('EVENT_ID');

        if (isset($primary_key)) {
            $event_id = $primary_key + '1';
        }
        else {
            $event_id = '20190001';
        }

        
        // image upload, fit and store inside public folder 
        if($request->hasFile('event_image')){
            $filenameWithExt = $request->file('event_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('event_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (500 width, 280 height)
            $thumbnailpath = 'uploads/images/event/'.$fileNameToStore;
            $img = Image::make($request->file('event_image')->getRealPath())->resize(500, 280)->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        //
        $insert = DB::table('scn_event')
                    ->insert([
                        'EVENT_ID' => $event_id,
                        'EVENT_TITLE' => $request->get('event_title'),
                        'EVENT_DESC' => $request->get('content'),
                        'IMAGE_PATH' => $fileNameToStore,
                        'EVENT_DATE' => $request->get('event_date'),
                        'EVENT_TIME' => $request->get('event_time'),
                        'EVENT_LOCATION' => $request->get('event_location'),
                        'PUBLISH_START_DATE' => $request->get('publish_start'),
                        'PUBLISH_END_DATE' => $request->get('publish_end'),
                        'ACTIVE_STATUS' => '1',
                        'ENTERED_BY' => Auth::user()->id,
                        'ENTRY_TIMESTAMP' => Carbon::now()
                    ]);

        Session::flash('success', 'Event Created Successfully!');


        //
        return redirect()->route('event.create');
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
        $events = DB::table('scn_event')
                    ->select('scn_event.*')
                    ->where('EVENT_ID', $id)
                    ->get();

        //
        return view('admin.event.event_view')->with('events', $events);
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
        $events = DB::table('scn_event')
                    ->select('scn_event.*')
                    ->where('EVENT_ID', $id)
                    ->get();

        //
        return view('admin.event.event_edit')->with('events', $events);
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
            'event_title' => 'required',
            'content' => 'required',
            'event_image' => 'nullable|image',
            'publish_start' => 'required|date',
            'publish_end' => 'required|date|after_or_equal:publish_start',
            'event_date' => 'required|date|after_or_equal:publish_start',
        ]);

        
        // image upload, fit and store inside public folder 
        if($request->hasFile('event_image')){
            $filenameWithExt = $request->file('event_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('event_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (500 width, 280 height)
            $thumbnailpath = 'uploads/images/event/'.$fileNameToStore;
            $img = Image::make($request->file('event_image')->getRealPath())->resize(500, 280)->save($thumbnailpath);

            //
            $update = DB::table('scn_event')
                        ->where('EVENT_ID', $id)
                        ->update([
                            'EVENT_TITLE' => $request->get('event_title'),
                            'EVENT_DESC' => $request->get('content'),
                            'IMAGE_PATH' => $fileNameToStore,
                            'EVENT_DATE' => $request->get('event_date'),
                            'EVENT_TIME' => $request->get('event_time'),
                            'EVENT_LOCATION' => $request->get('event_location'),
                            'PUBLISH_START_DATE' => $request->get('publish_start'),
                            'PUBLISH_END_DATE' => $request->get('publish_end'),
                            'UPDATED_BY' => Auth::user()->id,
                            'UPDATE_TIMESTAMP' => Carbon::now()
                        ]);
        }
        else{
            
            //
            $update = DB::table('scn_event')
                        ->where('EVENT_ID', $id)
                        ->update([
                            'EVENT_TITLE' => $request->get('event_title'),
                            'EVENT_DESC' => $request->get('content'),
                            'EVENT_DATE' => $request->get('event_date'),
                            'EVENT_TIME' => $request->get('event_time'),
                            'EVENT_LOCATION' => $request->get('event_location'),
                            'PUBLISH_START_DATE' => $request->get('publish_start'),
                            'PUBLISH_END_DATE' => $request->get('publish_end'),
                            'UPDATED_BY' => Auth::user()->id,
                            'UPDATE_TIMESTAMP' => Carbon::now()
                        ]);

        }


        Session::flash('success', 'Event Updated Successfully!');


        //
        return redirect()->route('event.edit', [$id]);
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
        $events = DB::table('scn_event')
                ->select('scn_event.*')
                ->where('scn_event.EVENT_ID', '=', $id)
                ->get();

        foreach( $events as $event ){
            if ($event->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_event')
                        ->where('EVENT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($event->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_event')
                        ->where('EVENT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $events = DB::table('scn_event')
                    ->select('scn_event.*')
                    ->where('EVENT_ID', $id)
                    ->orderBy('EVENT_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.event.event_list')->with('events', $events);

    }
}
