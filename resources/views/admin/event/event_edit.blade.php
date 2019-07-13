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
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

            @foreach ($events as $event)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/event/edit/'.$event->EVENT_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/event/update/'.$event->EVENT_ID) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="event_title" value="{{ $event->EVENT_TITLE }}" placeholder="Event Title">

                      @if ($errors->has('event_title'))
                          <span class="error_msg">
                            {{ $errors->first('event_title') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Event Content" rows="15">{{ $event->EVENT_DESC }}</textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="event_date" value="{{ $event->EVENT_DATE }}" placeholder="Event Date">

                      @if ($errors->has('event_date'))
                          <span class="error_msg">
                            {{ $errors->first('event_date') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Time</label>
                    <div class="col-sm-8">
                      <input type="time" class="form-control" name="event_time" value="{{ $event->EVENT_TIME }}" placeholder="Event Time">

                      @if ($errors->has('event_time'))
                          <span class="error_msg">
                            {{ $errors->first('event_time') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Location</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="event_location" value="{{ $event->EVENT_LOCATION }}" placeholder="Event Location">

                      @if ($errors->has('event_location'))
                          <span class="error_msg">
                            {{ $errors->first('event_location') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="event_image" placeholder="Event Image">

                      @if ($errors->has('event_image'))
                          <span class="error_msg">
                            {{ $errors->first('event_image') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Publish Start</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="publish_start" value="{{ $event->PUBLISH_START_DATE }}" placeholder="Publish Start">

                      @if ($errors->has('publish_start'))
                          <span class="error_msg">
                            {{ $errors->first('publish_start') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Publish End</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="publish_end" value="{{ $event->PUBLISH_END_DATE }}" placeholder="Publish End">

                      @if ($errors->has('publish_end'))
                          <span class="error_msg">
                            {{ $errors->first('publish_end') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>
            @endforeach

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection