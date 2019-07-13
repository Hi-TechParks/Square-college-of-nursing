@extends('layouts.master')
@section('content')

  	<!--== Chairman Area Start ==-->
    <section class="section pd-btm mg-tp" id="about-page">
      <div class="container">

            <div class="contact-header">
              <h4>Submit Your Application</h4>
            </div>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
            </div>
            @endif

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admission/store')}}" method="post" enctype="multipart/form-data" class="admission_form">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="applicant_name" placeholder="Applicant Name">

                      @if ($errors->has('applicant_name'))
                          <span class="error_msg">
                            {{ $errors->first('applicant_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                <div class="form-row">
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name <span>*</span></label>
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
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Session Name <span>*</span></label>
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
                  </div>
                </div>


                <fieldset class="form-row">
                  <legend>Parents Information:</legend>
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_name" placeholder="Father Name">

                      @if ($errors->has('father_name'))
                          <span class="error_msg">
                            {{ $errors->first('father_name') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Profession <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_profession" placeholder="Father Profession">

                      @if ($errors->has('father_profession'))
                          <span class="error_msg">
                            {{ $errors->first('father_profession') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>


                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">

                      @if ($errors->has('mother_name'))
                          <span class="error_msg">
                            {{ $errors->first('mother_name') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Profession <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession">

                      @if ($errors->has('mother_profession'))
                          <span class="error_msg">
                            {{ $errors->first('mother_profession') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>
                </fieldset>

                <div class="">
                  <fieldset class="form-row">
                  <legend>Personal Information:</legend>
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date Of Birth <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" placeholder="Birth Date">

                      @if ($errors->has('birth_date'))
                          <span class="error_msg">
                            {{ $errors->first('birth_date') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Photo <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="photo" placeholder="Applicant Photo">

                      @if ($errors->has('photo'))
                          <span class="error_msg">
                            {{ $errors->first('photo') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Birth Place <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="birth_place" placeholder="Birth Place">

                      @if ($errors->has('birth_place'))
                          <span class="error_msg">
                            {{ $errors->first('birth_place') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Marital Status <span>*</span></label>
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
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nationality <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nationality" placeholder="Nationality">

                      @if ($errors->has('nationality'))
                          <span class="error_msg">
                            {{ $errors->first('nationality') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">National ID</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="national_id" placeholder="National Id">

                      @if ($errors->has('national_id'))
                          <span class="error_msg">
                            {{ $errors->first('national_id') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Religion <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="religion" placeholder="Religion">

                      @if ($errors->has('religion'))
                          <span class="error_msg">
                            {{ $errors->first('religion') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
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
                  </div>
                  </fieldset>
                </div>


                <div class="form-row">
                <div class="col-md-6">
                  <fieldset>
                  <legend>Permanent Detals:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Address <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Upazila Name <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">District Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="district" placeholder="Permanent District">

                      @if ($errors->has('district'))
                          <span class="error_msg">
                            {{ $errors->first('district') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <legend>Contact Details:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Address <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Contact No <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Email <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" placeholder="Email Address">

                      @if ($errors->has('email'))
                          <span class="error_msg">
                            {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  </fieldset>
                </div>
                </div>


                <div class="form-row">
                  <div class="col-md-6">
                  <fieldset>
                  <legend>Guardian 1 Information:</legend>
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
                  </div>


                  <div class="col-md-6">
                  <fieldset>
                  <legend>Guardian 2 Information:</legend>
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
                  </div>
                </div>


                <fieldset class="form-row">
                  <legend>Educational Qualifications:</legend>
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name Of Exam</th>
                        <th scope="col">Group</th>
                        <th scope="col">Passing Year</th>
                        <th scope="col">Roll No.</th>
                        <th scope="col">Reg. No.</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Total GPA</th>
                        <th scope="col">Biology Mark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <li name="ssc" value="SSC">SSC</li>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_group" required="">

                          @if ($errors->has('ssc_group'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_group') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_year" required="">

                          @if ($errors->has('ssc_year'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_year') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_roll" required="">

                          @if ($errors->has('ssc_roll'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_roll') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_reg" required="">

                          @if ($errors->has('ssc_reg'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_reg') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_board" required="">

                          @if ($errors->has('ssc_board'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_board') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_gpa" required="">

                          @if ($errors->has('ssc_gpa'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_gpa') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_biology" required="">

                          @if ($errors->has('ssc_biology'))
                              <span class="error_msg">
                                {{ $errors->first('ssc_biology') }}
                              </span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <li name="hsc" value="HSC">HSC</li>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_group" required="">

                          @if ($errors->has('hsc_group'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_group') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_year" required="">

                          @if ($errors->has('hsc_year'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_year') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_roll" required="">

                          @if ($errors->has('hsc_roll'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_roll') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_reg" required="">

                          @if ($errors->has('hsc_reg'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_reg') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_board" required="">

                          @if ($errors->has('hsc_board'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_board') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_gpa" required="">

                          @if ($errors->has('hsc_gpa'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_gpa') }}
                              </span>
                          @endif
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_biology" required="">

                          @if ($errors->has('hsc_biology'))
                              <span class="error_msg">
                                {{ $errors->first('hsc_biology') }}
                              </span>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>

                </fieldset>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div class="card">
                        @foreach( $declarations as $declaration )
                        <div class="card-header contact-header">
                          <h4>Application Declaration</h4>
                          <input type="hidden" name="declaration_title" value="{{ $declaration->ADMISSION_APP_FORM_DECLARATION_ID }}">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $declaration->DECLARATION_TITLE }}</h5>
                          {!! $declaration->DECLARATION !!}
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-defoult">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>

      </div>
    </section>
    <!--== Chairman Area End ==-->

@endsection