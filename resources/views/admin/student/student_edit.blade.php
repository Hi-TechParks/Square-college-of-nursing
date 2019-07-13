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
                <li class="breadcrumb-item"><a href="#">Student</a></li>
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

            @foreach ($applications as $application)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/student/edit/'.$application->STUDENT_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/student/update/'.$application->STUDENT_ID) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name">
                        @foreach( $programs as $program )
                        <option value="{{ $program->PROGRAM_ID }}" @if( $program->PROGRAM_ID == $application->PROGRAM_ID ) selected @endif>{{ $program->PROGRAM_NAME }}</option>
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
                    <label class="col-sm-4 col-form-label">Session Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name">
                        @foreach( $sessions as $session )
                        <option value="{{ $session->SESSION_ID }}" @if( $session->SESSION_ID == $application->SESSION_ID ) selected @endif>{{ $session->SESSION_NAME }}</option>
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
                    <label class="col-sm-4 col-form-label">Student Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="student_name" value="{{ $application->STUDENT_NAME }}" placeholder="Student Name">

                      @if ($errors->has('student_name'))
                          <span class="error_msg">
                            {{ $errors->first('student_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_name" value="{{ $application->FATHER_NAME }}" placeholder="Father Name">

                      @if ($errors->has('father_name'))
                          <span class="error_msg">
                            {{ $errors->first('father_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_name" value="{{ $application->MOTHER_NAME }}" placeholder="Mother Name">

                      @if ($errors->has('mother_name'))
                          <span class="error_msg">
                            {{ $errors->first('mother_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date Of Birth</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" value="{{ $application->DOB }}" placeholder="Birth Date">

                      @if ($errors->has('birth_date'))
                          <span class="error_msg">
                            {{ $errors->first('birth_date') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Photo</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="photo" placeholder="Applicant Photo">

                      @if ($errors->has('photo'))
                          <span class="error_msg">
                            {{ $errors->first('photo') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Birth Place</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="birth_place" value="{{ $application->BIRTH_PLACE }}" placeholder="Birth Place">

                      @if ($errors->has('birth_place'))
                          <span class="error_msg">
                            {{ $errors->first('birth_place') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Marital Status</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="marital_status">
                        <option value="">Select</option>
                        <option value="S" @if( $application->MARITAL_STATUS == 'S' ) selected @endif>Single</option>
                        <option value="M" @if( $application->MARITAL_STATUS == 'M' ) selected @endif>Married</option>
                        <option value="W" @if( $application->MARITAL_STATUS == 'W' ) selected @endif>Widowed</option>
                        <option value="T" @if( $application->MARITAL_STATUS == 'T' ) selected @endif>Separated</option>
                        <option value="D" @if( $application->MARITAL_STATUS == 'D' ) selected @endif>Divorced</option>
                      </select>

                      @if ($errors->has('marital_status'))
                          <span class="error_msg">
                            {{ $errors->first('marital_status') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nationality</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nationality" value="{{ $application->NATIONALITY }}" placeholder="Nationality">

                      @if ($errors->has('nationality'))
                          <span class="error_msg">
                            {{ $errors->first('nationality') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">National Id</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="national_id" value="{{ $application->NATIONAL_ID }}" placeholder="National Id">

                      @if ($errors->has('national_id'))
                          <span class="error_msg">
                            {{ $errors->first('national_id') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Religion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="religion" value="{{ $application->RELIGION }}" placeholder="Religion">

                      @if ($errors->has('religion'))
                          <span class="error_msg">
                            {{ $errors->first('religion') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Country Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="country_name">
                        @foreach( $countries as $country )
                        <option value="{{ $country->COUNTRY_ID }}" @if( $country->COUNTRY_ID == $application->PERMANENT_COUNTRY_ID ) selected @endif>
                          {{ $country->COUNTRY_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('country_name'))
                          <span class="error_msg">
                            {{ $errors->first('country_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="permanent_address" placeholder="Permanent Address" rows="5">{{ $application->PERMANENT_ADDRESS }}</textarea>

                      @if ($errors->has('permanent_address'))
                          <span class="error_msg">
                            {{ $errors->first('permanent_address') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Upazila</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="upazila" value="{{ $application->PERMANENT_UPAZILLA }}" placeholder="Permanent Upazila">

                      @if ($errors->has('upazila'))
                          <span class="error_msg">
                            {{ $errors->first('upazila') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent District</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="district" value="{{ $application->PERMANENT_DISTRICT }}" placeholder="Permanent District">

                      @if ($errors->has('district'))
                          <span class="error_msg">
                            {{ $errors->first('district') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="contact_address" placeholder="Contact Address" rows="5">{{ $application->CONTACT_ADDRESS }}</textarea>

                      @if ($errors->has('contact_address'))
                          <span class="error_msg">
                            {{ $errors->first('contact_address') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact No</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="contact_no" value="{{ $application->CONTACT_NO }}" placeholder="Contact No">

                      @if ($errors->has('contact_no'))
                          <span class="error_msg">
                            {{ $errors->first('contact_no') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" value="{{ $application->EMAIL_ID }}" placeholder="Email Address">

                      @if ($errors->has('email'))
                          <span class="error_msg">
                            {{ $errors->first('email') }}
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