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
                <li class="breadcrumb-item"><a href="#">Application</a></li>
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
                    <a href="{{ URL('/admin/application/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/application/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name">
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
                    <label class="col-sm-4 col-form-label">Session Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name">
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
                    <label class="col-sm-4 col-form-label">Applicant Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="applicant_name" placeholder="Applicant Name">

                      @if ($errors->has('applicant_name'))
                          <span class="error_msg">
                            {{ $errors->first('applicant_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_name" placeholder="Father Name">

                      @if ($errors->has('father_name'))
                          <span class="error_msg">
                            {{ $errors->first('father_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Profession</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_profession" placeholder="Father Profession">

                      @if ($errors->has('father_profession'))
                          <span class="error_msg">
                            {{ $errors->first('father_profession') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">

                      @if ($errors->has('mother_name'))
                          <span class="error_msg">
                            {{ $errors->first('mother_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Profession</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession">

                      @if ($errors->has('mother_profession'))
                          <span class="error_msg">
                            {{ $errors->first('mother_profession') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date Of Birth</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" placeholder="Birth Date">

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
                      <input type="text" class="form-control" name="birth_place" placeholder="Birth Place">

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
                        <option value="S">Single</option>
                        <option value="M">Married</option>
                        <option value="W">Widowed</option>
                        <option value="T">Separated</option>
                        <option value="D">Divorced</option>
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
                      <input type="text" class="form-control" name="nationality" placeholder="Nationality">

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
                      <input type="text" class="form-control" name="national_id" placeholder="National Id">

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
                      <input type="text" class="form-control" name="religion" placeholder="Religion">

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
                        <option value="">Select Country</option>
                        @foreach( $countries as $country )
                        <option value="{{ $country->COUNTRY_ID }}">{{ $country->COUNTRY_NAME }}</option>
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
                      <textarea class="form-control" name="permanent_address" placeholder="Permanent Address" rows="5"></textarea>

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
                      <input type="text" class="form-control" name="upazila" placeholder="Permanent Upazila">

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
                      <input type="text" class="form-control" name="district" placeholder="Permanent District">

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
                      <textarea class="form-control" name="contact_address" placeholder="Contact Address" rows="5"></textarea>

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
                      <input type="text" class="form-control" name="contact_no" placeholder="Contact No">

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
                      <input type="email" class="form-control" name="email" placeholder="Email Address">

                      @if ($errors->has('email'))
                          <span class="error_msg">
                            {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                  </div>



                  <fieldset>
                  <legend>Guardian 1:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_name_1" placeholder="Guardian Name">

                      @if ($errors->has('guardian_name_1'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_name_1') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="guardian_address_1" placeholder="Guardian Address"></textarea>

                      @if ($errors->has('guardian_address_1'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_address_1') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_phone_1" placeholder="Guardian Phone">

                      @if ($errors->has('guardian_phone_1'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_phone_1') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Relation</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_relation_1" placeholder="Guardian Relation">

                      @if ($errors->has('guardian_relation_1'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_relation_1') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </fieldset>


                  <fieldset>
                  <legend>Guardian 2:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_name_2" placeholder="Guardian Name">

                      @if ($errors->has('guardian_name_2'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_name_2') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="guardian_address_2" placeholder="Guardian Address"></textarea>

                      @if ($errors->has('guardian_address_2'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_address_2') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_phone_2" placeholder="Guardian Phone">

                      @if ($errors->has('guardian_phone_2'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_phone_2') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Relation</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_relation_2" placeholder="Guardian Relation">

                      @if ($errors->has('guardian_relation_2'))
                          <span class="error_msg">
                            {{ $errors->first('guardian_relation_2') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </fieldset>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Declaration</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="declaration_title">
                        <option value="">Select Declaration</option>
                        @foreach( $declarations as $declaration )
                        <option value="{{ $declaration->ADMISSION_APP_FORM_DECLARATION_ID }}">{{ $declaration->DECLARATION_TITLE }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('declaration_title'))
                          <span class="error_msg">
                            {{ $errors->first('declaration_title') }}
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