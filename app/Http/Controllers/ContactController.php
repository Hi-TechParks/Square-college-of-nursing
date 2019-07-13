<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class ContactController extends Controller
{
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
        $addresses = DB::table('scn_contact_address')
                    ->select('scn_contact_address.*')
                    ->get();
        //
        return view('contact')->with('addresses', $addresses);
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
            'subject' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('scn_contact_email')
                    ->select('scn_contact_email.CONTACT_EMAIL_ID')
                    ->max('CONTACT_EMAIL_ID');

        if (isset($primary_key)) {
            $email_id = $primary_key + '1';
        }
        else {
            $email_id = '20190001';
        }


        //
        $insert = DB::table('scn_contact_email')
                    ->insert([
                        'CONTACT_EMAIL_ID' => $email_id,
                        'FROM_EMAIL_ID' => $request->get('email'),
                        'SUBJECT' => $request->get('subject'),
                        'EMAIL_CONTENT' => $request->get('content'),
                        'ACTIVE_STATUS' => '1',
                        'ENTRY_TIMESTAMP' => Carbon::now()
                    ]);

        Session::flash('success', 'Mail Send Successfully!');


        //
        return redirect()->route('email.create');
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
