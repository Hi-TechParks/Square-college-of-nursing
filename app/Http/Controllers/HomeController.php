<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    public function dateFormat(){
        $today = Carbon::now();
        return $today->toDateString();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //
        $slides = DB::table('scn_slide_image')
                    ->select('scn_slide_image.*')
                    ->orderBy('SLIDE_IMAGE_ID', 'DESC')
                    ->where('ACTIVE_STATUS', '1')
                    ->take(6)
                    ->get();

        //
        $c_messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'users.PROFILE_IMAGE_PATH', 'bg_designation.DESIGNATION_NAME')
                    ->where('bg_designation.SHORT_CODE', 'C')
                    ->where('scn_message.ACTIVE_STATUS', '1')
                    ->orderBy('MESSAGE_ID', 'DESC')
                    ->take(1)
                    ->get();

        //
        $md_messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'users.PROFILE_IMAGE_PATH', 'bg_designation.DESIGNATION_NAME')
                    ->where('bg_designation.SHORT_CODE', 'MD')
                    ->where('scn_message.ACTIVE_STATUS', '1')
                    ->orderBy('MESSAGE_ID', 'DESC')
                    ->take(1)
                    ->get();

        //
        $gb_messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'users.PROFILE_IMAGE_PATH', 'bg_designation.DESIGNATION_NAME')
                    ->where('bg_designation.SHORT_CODE', 'GB')
                    ->where('scn_message.ACTIVE_STATUS', '1')
                    ->orderBy('MESSAGE_ID', 'DESC')
                    ->take(1)
                    ->get();

        //
        $p_messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'users.PROFILE_IMAGE_PATH', 'bg_designation.DESIGNATION_NAME')
                    ->where('bg_designation.SHORT_CODE', 'P')
                    ->where('scn_message.ACTIVE_STATUS', '1')
                    ->orderBy('MESSAGE_ID', 'DESC')
                    ->take(1)
                    ->get();

        //
        $events = DB::table('scn_event')
                    ->select('scn_event.*')
                    ->where('PUBLISH_START_DATE', '<=', $this->dateFormat())
                    ->where('PUBLISH_END_DATE', '>=', $this->dateFormat())
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('EVENT_DATE', 'ASC')
                    ->take(6)
                    ->get();

        //
        $notices = DB::table('scn_notice')
                    ->select('scn_notice.*')
                    ->where('PUBLISH_START_DATE', '<=', $this->dateFormat())
                    ->where('PUBLISH_END_DATE', '>=', $this->dateFormat())
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('PUBLISH_START_DATE', 'DESC')
                    ->orderBy('NOTICE_ID', 'DESC')
                    ->take(5)
                    ->get();

        //
        $images = DB::table('scn_image_gallery')
                    ->select('scn_image_gallery.*')
                    ->where('HOME_PAGE_SHOW_FLAG', '1')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->get();

        //
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->get();

        //
        $calendars = DB::table('scn_academic_calendar')
                    ->join('scn_event_type', 'scn_event_type.EVENT_TYPE_ID', '=', 'scn_academic_calendar.EVENT_TYPE_ID')
                    ->select('scn_academic_calendar.*', 'scn_event_type.TYPE_NAME', 'scn_event_type.COLOR_CODE')
                    ->where('scn_academic_calendar.ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('index')->with('slides', $slides)
                            ->with('c_messages', $c_messages)
                            ->with('md_messages', $md_messages)
                            ->with('gb_messages', $gb_messages)
                            ->with('p_messages', $p_messages)
                            ->with('events', $events)
                            ->with('notices', $notices)
                            ->with('images', $images)
                            ->with('calendars', $calendars)
                            ->with('testimonials', $testimonials);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function message($id)
    {
        //
        $messages = DB::table('scn_message')
                    ->join('users', 'users.id', '=', 'scn_message.USER_ID')
                    ->join('bg_designation', 'bg_designation.DESIGNATION_ID', '=', 'users.DESIGNATION_ADMIN')
                    ->select('scn_message.*', 'users.name', 'users.PROFILE_IMAGE_PATH', 'bg_designation.DESIGNATION_NAME')
                    ->where('scn_message.MESSAGE_ID', $id)
                    ->get();

        //
        return view('message')->with('messages', $messages);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function testimonial($id)
    {
        //
        $testimonials = DB::table('scn_testimonial')
                    ->select('scn_testimonial.*')
                    ->where('TESTIMONIAL_ID', $id)
                    ->get();

        //
        return view('testimonial')->with('testimonials', $testimonials);
    }

}
