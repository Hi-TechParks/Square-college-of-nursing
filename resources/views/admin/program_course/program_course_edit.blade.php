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
                <li class="breadcrumb-item"><a href="#">Program</a></li>
                <li class="breadcrumb-item"><a href="#">Course</a></li>
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

            @foreach ($procourses as $procourse)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/procourse/edit/'.$procourse->PROGRAM_COURSE_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/procourse/update/'.$procourse->PROGRAM_COURSE_ID) }}"" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Course Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="course_name" required>
                        <option value="">Select Course</option>
                        @foreach( $courses as $course )
                        <option value="{{ $course->COURSE_ID }}" @if( $procourse->COURSE_ID == $course->COURSE_ID ) selected @endif>
                          {{ $course->COURSE_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('course_name'))
                          <span class="error_msg">
                            {{ $errors->first('course_name') }}
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
                        <option value="{{ $program->PROGRAM_ID }}" @if( $procourse->PROGRAM_ID == $program->PROGRAM_ID ) selected @endif>
                          {{ $program->PROGRAM_NAME }}
                        </option>
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
                        <option value="{{ $session->SESSION_ID }}" @if( $procourse->SESSION_ID == $session->SESSION_ID ) selected @endif>
                          {{ $session->SESSION_NAME }}
                        </option>
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
                        <option value="{{ $year->YEAR_ID }}" @if( $procourse->YEAR_ID == $year->YEAR_ID ) selected @endif>
                          {{ $year->YEAR_NAME }}
                        </option>
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