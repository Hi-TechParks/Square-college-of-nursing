@extends('layouts.master')
@section('content')

    @foreach( $events as $event )
    <!--== Page Header Start ==-->
    <section class="section mt-50" id="page-header" style="background-image:url('{{ asset('/uploads/images/event/'.$event->IMAGE_PATH) }}')">
      
    </section>
    <!--== Page Header End ==-->


    <!--== Details Page Start ==-->
    <section class="section" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1>{{ $event->EVENT_TITLE }}</h1>
            <div class="blog-box-meta">
              <span class="date"><i class="far fa-calendar-alt"></i> : {{ date('d M', strtotime($event->EVENT_DATE)) }}</span>

              @if(!empty($event->EVENT_TIME))
              <span class="time"><i class="far fa-clock"></i> : {{ date('h:i A', strtotime($event->EVENT_TIME)) }}</span>
              @endif

              @if(!empty($event->EVENT_LOCATION))
              <span class="location"><i class="fas fa-map-marked-alt"></i> : {{ $event->EVENT_LOCATION }}</span>
              @endif
            </div>
            <p>{!! $event->EVENT_DESC !!}</p>

          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    @endforeach


@endsection