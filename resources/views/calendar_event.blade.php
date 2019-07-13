@extends('layouts.master')
@section('content')

    @foreach( $calendars as $calendar )
    <!--== Details Page Start ==-->
    <section class="section mg-tp" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1>{{ $calendar->TYPE_NAME }}</h1>

            Class : 
            @if( $calendar->CLASS_OFF == '1' )
              <span class="active_status">On</span>
            @else
              <span class="inactive_status">Off</span>
            @endif

            <div class="blog-box-meta">
              <h4 class="date"><i class="far fa-calendar-alt"></i> : {{ date('d M Y', strtotime($calendar->EVENT_DATE)) }}</h4>
            </div>
            <p>{!! $calendar->EVENT_DESC !!}</p>

          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    @endforeach


@endsection