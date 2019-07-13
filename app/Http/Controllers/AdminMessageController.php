<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminMessageController extends Controller
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
        $messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'bg_designation.DESIGNATION_NAME')
                    ->where('users.name', 'LIKE', '%'.$request->get('full_name').'%')
                    ->orderBy('MESSAGE_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.message.message_list')->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = DB::table('users')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('users.*', 'bg_designation.SHORT_CODE')
                    ->where('bg_designation.SHORT_CODE', 'C')
                    ->orWhere('bg_designation.SHORT_CODE', 'MD')
                    ->orWhere('bg_designation.SHORT_CODE', 'GB')
                    ->orWhere('bg_designation.SHORT_CODE', 'P')
                    ->where('users.ACTIVE_STATUS', '1')
                    ->get();
        //
        return view('admin.message.message_create')->with('members', $members);
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
            'content' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('scn_message')
                    ->select('scn_message.MESSAGE_ID')
                    ->max('MESSAGE_ID');

        if (isset($primary_key)) {
            $message_id = $primary_key + '1';
        }
        else {
            $message_id = '20190001';
        }


        $insert = DB::table('scn_message')
            ->insert([
                'MESSAGE_ID' => $message_id,
                'USER_ID' => $request->get('full_name'),
                'MESSAGE_CONTENT' => $request->get('content'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Message Created Successfully!'); 

        //
        return redirect()->route('message.create');
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
        $messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'bg_designation.DESIGNATION_NAME')
                    ->where('MESSAGE_ID', $id)
                    ->get();

        //
        return view('admin.message.message_view')->with('messages', $messages);
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
        $members = DB::table('users')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('users.*', 'bg_designation.SHORT_CODE')
                    ->where('bg_designation.SHORT_CODE', 'C')
                    ->orWhere('bg_designation.SHORT_CODE', 'MD')
                    ->orWhere('bg_designation.SHORT_CODE', 'GB')
                    ->orWhere('bg_designation.SHORT_CODE', 'P')
                    ->where('users.ACTIVE_STATUS', '1')
                    ->get();

        //
        $messages = DB::table('scn_message')
                    ->select('scn_message.*')
                    ->where('MESSAGE_ID', $id)
                    ->get();

        //
        return view('admin.message.message_edit')->with('members', $members)
                                        ->with('messages', $messages);
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
            'content' => 'required',
        ]);

        $update = DB::table('scn_message')
            ->where('MESSAGE_ID', $id)
            ->update([
                'USER_ID' => $request->get('full_name'),
                'MESSAGE_CONTENT' => $request->get('content'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Message Updated Successfully!'); 

        //
        return redirect()->route('message.edit', [$id]);
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
        $messages = DB::table('scn_message')
                ->select('scn_message.*')
                ->where('scn_message.MESSAGE_ID', '=', $id)
                ->get();

        foreach( $messages as $message ){
            if ($message->ACTIVE_STATUS == '1') {
                $update = DB::table('scn_message')
                        ->where('MESSAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($message->ACTIVE_STATUS == '0') {
                $update = DB::table('scn_message')
                        ->where('MESSAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'bg_designation.DESIGNATION_NAME')
                    ->where('MESSAGE_ID', $id)
                    ->paginate(1);

        //
        return view('admin.message.message_list')->with('messages', $messages);

    }
}
