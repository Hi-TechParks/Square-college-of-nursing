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
                <li class="breadcrumb-item"><a href="#">Type</a></li>
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

            @foreach ($event_types as $event_type)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/event/type/edit/'.$event_type->EVENT_TYPE_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/event/type/update/'.$event_type->EVENT_TYPE_ID) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Type Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="type_name" value="{{ $event_type->TYPE_NAME }}" placeholder="Event Type Name">

                      @if ($errors->has('type_name'))
                          <span class="error_msg">
                            {{ $errors->first('type_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Type Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Type Details" rows="15">
                        {{ $event_type->TYPE_DESC }}
                      </textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Color Picker</label>
                    <div class="col-sm-8">
                      <input type="color" class="form-control" name="color_code" value="{{ $event_type->COLOR_CODE }}" placeholder="Color Picker">

                      @if ($errors->has('color_code'))
                          <span class="error_msg">
                            {{ $errors->first('color_code') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Short Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="short_code" value="{{ $event_type->SHORT_CODE }}" placeholder="Short Code">

                      @if ($errors->has('short_code'))
                          <span class="error_msg">
                            {{ $errors->first('short_code') }}
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