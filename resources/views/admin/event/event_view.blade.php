@extends('layouts.master')
@section('content')


    <!--== Dashboard Area Start ==-->
    <section class="section mt-50" id="deshboard">
      <div class="container">
        <!--== Dashboard Breadcrumb Start ==-->
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Event</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--== Dashboard Breadcrumb End ==-->

        <div class="row">
          <!--== Dashboard Sidebar Start ==-->
          <aside class="col-md-3">
            @include('admin.inc.sidebar')
          </aside>
          <!--== Dashboard Sidebar End ==-->

          <!--== Dashboard Main Start ==-->
          <main class="col-md-9">

            <!--== Data View Card Start ==-->
            @foreach( $events as $event )
            <div class="card">
              <img src="{{ asset('/uploads/images/event/'.$event->IMAGE_PATH) }}" class="card-img-top" alt="Event">
              <div class="card-body">
                <h5 class="card-title">{{ $event->EVENT_TITLE }}</h5>
                <p class="card-text">{!! $event->EVENT_DESC !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Event Date: {{ $event->EVENT_DATE }}</li>
                <li class="list-group-item">Event Time: {{ $event->EVENT_TIME }}</li>
                <li class="list-group-item">Location: {{ $event->EVENT_LOCATION }}</li>
                <li class="list-group-item">Publish Start: {{ $event->PUBLISH_START_DATE }}</li>
                <li class="list-group-item">Publish End: {{ $event->PUBLISH_END_DATE }}</li>
                <li class="list-group-item">
                  @if( $event->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="{{ url('/admin/event/edit/'.$event->EVENT_ID) }}" class="btn btn-primary">Edit</a>
              </div>
            </div>
            @endforeach
            <!--== Data View Card End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection