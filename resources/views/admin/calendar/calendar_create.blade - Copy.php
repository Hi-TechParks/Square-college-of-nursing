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
                <li class="breadcrumb-item"><a href="#">Calendar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
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

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ URL('/admin/calendar/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/calendar/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="event_type" required="">
                        <option value="">Select Event Type</option>
                        @foreach( $event_types as $event_type )
                        <option value="{{ $event_type->EVENT_TYPE_ID }}">{{ $event_type->TYPE_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('event_type'))
                          <span class="error_msg">
                            {{ $errors->first('event_type') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="event_date" placeholder="Event Date">

                      @if ($errors->has('event_date'))
                          <span class="error_msg">
                            {{ $errors->first('event_date') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Event Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Event Details" rows="15"></textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Class Status</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="class_status" required="">
                        <option value="">Select</option>
                        <option value="0">Off</option>
                        <option value="1">On</option>
                      </select>

                      @if ($errors->has('class_status'))
                          <span class="error_msg">
                            {{ $errors->first('class_status') }}
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

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection