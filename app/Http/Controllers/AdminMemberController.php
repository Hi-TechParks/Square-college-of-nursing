<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminMemberController extends Controller
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
        $members = DB::table('users')
                    ->join('bg_designation', function ($join) {
                        $join->on('users.DESIGNATION_ACADEMIC', '=', 'bg_designation.DESIGNATION_ID')
                            ->orOn('users.DESIGNATION_ADMIN', '=', 'bg_designation.DESIGNATION_ID');
                    })
                    ->select('users.*', 'bg_designation.DESIGNATION_NAME')
                    ->where('users.name', 'LIKE', '%'.$request->get('full_name').'%')
                    ->where('bg_designation.DESIGNATION_NAME', 'LIKE', '%'.$request->get('designation').'%')
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

        //
        return view('admin.member.member_list')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aca_designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_TYPE', '1')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $adm_designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_TYPE', '2')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();
        //
        return view('admin.member.member_create')
                    ->with('aca_designations', $aca_designations)
                    ->with('adm_designations', $adm_designations);
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
            'full_name' => 'required',
            'qualification' => 'required',
            'email' => 'email|unique:users',
            'phone' => 'required',
            'birth_date' => 'date|required|before:today',
            'gender' => 'required',
            'profile_image' => 'image|required',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('profile_image')){
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (150 width, 150 height)
            $thumbnailpath = 'uploads/images/profile/'.$fileNameToStore;
            $img = Image::make($request->file('profile_image')->getRealPath())->resize(150, 150)->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('users')
            ->insert([
                'name' => $request->get('full_name'),
                'DESIGNATION_ACADEMIC' => $request->get('academic_designation'),
                'DESIGNATION_ADMIN' => $request->get('admin_designation'),
                'QUALIFICATION' => $request->get('qualification'),
                'PROFILE' => $request->get('content'),
                'email' => $request->get('email'),
                'CONTACT_PHONE' => $request->get('phone'),
                'DOB' => $request->get('birth_date'),
                'GENDER' => $request->get('gender'),
                'PROFILE_IMAGE_PATH' => $fileNameToStore,
                'USER_TYPE_ID' => $request->get('member_type'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Member Created Successfully!'); 

        //
        return redirect()->route('member.create');
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
        $members = DB::table('users')
                    ->join('bg_designation', function ($join) {
                        $join->on('users.DESIGNATION_ACADEMIC', '=', 'bg_designation.DESIGNATION_ID')
                            ->orOn('users.DESIGNATION_ADMIN', '=', 'bg_designation.DESIGNATION_ID');
                    })
                    ->select('users.*', 'bg_designation.DESIGNATION_NAME')
                    ->where('id', $id)
                    ->limit(1)
                    ->get();

        //
        return view('admin.member.member_view')->with('members', $members);
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
        $aca_designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_TYPE', '1')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $adm_designations = DB::table('bg_designation')
                    ->select('bg_designation.*')
                    ->where('DESIGNATION_TYPE', '2')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        $members = DB::table('users')
                    ->select('users.*')
                    ->where('id', $id)
                    ->get();
        //
        return view('admin.member.member_edit')->with('members', $members)
                    ->with('aca_designations', $aca_designations)
                    ->with('adm_designations', $adm_designations);

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
            'full_name' => 'required',
            'qualification' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'birth_date' => 'date|required|before:today',
            'gender' => 'required',
            'profile_image' => 'image|nullable',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('profile_image')){
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (150 width, 150 height)
            $thumbnailpath = 'uploads/images/profile/'.$fileNameToStore;
            $img = Image::make($request->file('profile_image')->getRealPath())->resize(150, 150)->save($thumbnailpath);



            $update = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->get('full_name'),
                    'DESIGNATION_ACADEMIC' => $request->get('academic_designation'),
                    'DESIGNATION_ADMIN' => $request->get('admin_designation'),
                    'QUALIFICATION' => $request->get('qualification'),
                    'PROFILE' => $request->get('content'),
                    'email' => $request->get('email'),
                    'CONTACT_PHONE' => $request->get('phone'),
                    'DOB' => $request->get('birth_date'),
                    'GENDER' => $request->get('gender'),
                    'PROFILE_IMAGE_PATH' => $fileNameToStore,
                    'USER_TYPE_ID' => $request->get('member_type'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{

            $update = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->get('full_name'),
                    'DESIGNATION_ACADEMIC' => $request->get('academic_designation'),
                    'DESIGNATION_ADMIN' => $request->get('admin_designation'),
                    'QUALIFICATION' => $request->get('qualification'),
                    'PROFILE' => $request->get('content'),
                    'email' => $request->get('email'),
                    'CONTACT_PHONE' => $request->get('phone'),
                    'DOB' => $request->get('birth_date'),
                    'GENDER' => $request->get('gender'),
                    'USER_TYPE_ID' => $request->get('member_type'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
            
        }

        Session::flash('success', 'Member Updated Successfully!'); 

        //
        return redirect()->route('member.edit', [$id]);
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
        $members = DB::table('users')
                ->select('users.*')
                ->where('users.id', '=', $id)
                ->get();

        foreach( $members as $member ){
            if ($member->ACTIVE_STATUS == '1') {
                $update = DB::table('users')
                        ->where('id', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            else {
                $update = DB::table('users')
                        ->where('id', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $members = DB::table('users')
                    ->join('bg_designation', function ($join) {
                        $join->on('users.DESIGNATION_ACADEMIC', '=', 'bg_designation.DESIGNATION_ID')
                            ->orOn('users.DESIGNATION_ADMIN', '=', 'bg_designation.DESIGNATION_ID');
                    })
                    ->select('users.*', 'bg_designation.DESIGNATION_NAME')
                    ->where('id', $id)
                    ->paginate(1);

        //
        return view('admin.member.member_list')->with('members', $members);

    }
}
