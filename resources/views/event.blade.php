@extends('layouts.master')
@section('content')

    <!--== Event Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <h1 class="text-center"><span>Our All Event</span></h1>
          </div>
        </div>
        <div class="row">

          @foreach( $events as $event )
          <!--== Single Event ==-->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="event-page-single-box">
              <div class="event-page-single-box-left">
                <div class="event-page-single-box-image">
                  <img src="{{ asset('/uploads/images/event/'.$event->IMAGE_PATH) }}" class="img-fluid mx-auto d-block" alt="campus tour" />
                </div>
              </div>
              <div class="event-page-single-box-right">
                <div class="event-page-single-box-header">
                  <div class="single-notice-right">
                    <p>{{ $event->EVENT_TITLE }}</p>
                    <div class="meta-box">
                      <span><i class="far fa-calendar-alt"></i></span>
                      {{ date('d-M-y', strtotime($event->EVENT_DATE)) }}
                    </div>
                    <div class="meta-box">
                      <span><i class="far fa-clock"></i></span> {{ date('h:i A', strtotime($event->EVENT_TIME)) }}
                    </div>
                  </div>
                </div>
                <div class="event-page-single-box-footer">
                  <a href="{{ url('/event/single/'.$event->EVENT_ID) }}" class="read_more">View Details</a>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Event ==-->
          @endforeach

        </div>

        <!--== Pagination Area Start ==-->
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="mx-auto d-block d-flex">
                <nav aria-label="..." class="mx-auto d-block">
                  {{ $events->links() }}
                </nav>
              </div>
          </div>
        </div>
        <!--== Pagination Area End ==-->

      </div>
    </section>
    <!--== Event Area End ==-->

@endsection