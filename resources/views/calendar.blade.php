@extends('layouts.master')
@section('content')

    <!--== Event Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <h1 class="text-center"><span>Events </span>Calendar</h1>
          </div>
        </div>
        <div class="row">

          <!-- Calender plugin -->
          <div id='calendar'></div>

          @include('calender_data')

          <div class="event_indicator">
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #DB6600;"></div> <span>Exam</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #5D3AEE;"></div> <span>Class off</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #EB1B1B;"></div> <span>Holiday</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #01D162;"></div> <span>Others</span>
            </div>
          </div>
          <!-- Calender plugin -->

        </div>

      </div>
    </section>
    <!--== Event Area End ==-->

@endsection