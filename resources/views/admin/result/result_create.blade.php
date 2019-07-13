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
                <li class="breadcrumb-item"><a href="#">Result</a></li>
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
                    <a href="{{ URL('/admin/result/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/result/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Exam Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="exam_type" required>
                        <option value="">Select</option>
                        <option value="0">In-course</option>
                        <option value="1">Final</option>
                      </select>

                      @if ($errors->has('exam_type'))
                          <span class="error_msg">
                            {{ $errors->first('exam_type') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name" required>
                        <option value="">Select Program</option>
                        @foreach( $programs as $program )
                        <option value="{{ $program->PROGRAM_ID }}">{{ $program->PROGRAM_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('program_name'))
                          <span class="error_msg">
                            {{ $errors->first('program_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Session</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name" required>
                        <option value="">Select Session</option>
                        @foreach( $sessions as $session )
                        <option value="{{ $session->SESSION_ID }}">{{ $session->SESSION_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('session_name'))
                          <span class="error_msg">
                            {{ $errors->first('session_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Year</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="year_name" required>
                        <option value="">Select Year</option>
                        @foreach( $years as $year )
                        <option value="{{ $year->YEAR_ID }}">{{ $year->YEAR_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('year_name'))
                          <span class="error_msg">
                            {{ $errors->first('year_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Upload File</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="file" placeholder="Upload File" required>

                      @if ($errors->has('file'))
                          <span class="error_msg">
                            {{ $errors->first('file') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Publish Start</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="publish_start" placeholder="Publish Start">

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
                      <input type="date" class="form-control" name="publish_end" placeholder="Publish End">

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

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection