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
                <li class="breadcrumb-item"><a href="#">Member</a></li>
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

            @foreach($members as $member)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/member/edit/'.$member->id) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/member/update/'.$member->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Full Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="full_name" value="{{ $member->name }}" placeholder="Full Name">

                      @if ($errors->has('full_name'))
                          <span class="error_msg">
                            {{ $errors->first('full_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Academic Designation</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="academic_designation">
                        <option value="">Select Academic Designation</option>
                        @foreach( $aca_designations as $aca_designation )
                        <option value="{{ $aca_designation->DESIGNATION_ID }}"  @if( $aca_designation->DESIGNATION_ID == $member->DESIGNATION_ACADEMIC ) selected @endif>
                          {{ $aca_designation->DESIGNATION_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('academic_designation'))
                          <span class="error_msg">
                            {{ $errors->first('academic_designation') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Admin Designation</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="admin_designation">
                        <option value="">Select Admin Designation</option>
                        @foreach( $adm_designations as $adm_designation )
                        <option value="{{ $adm_designation->DESIGNATION_ID }}"  @if( $adm_designation->DESIGNATION_ID == $member->DESIGNATION_ADMIN ) selected @endif>
                          {{ $adm_designation->DESIGNATION_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('admin_designation'))
                          <span class="error_msg">
                            {{ $errors->first('admin_designation') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Qualification</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="qualification" value="{{ $member->QUALIFICATION }}" placeholder="Qualification">

                      @if ($errors->has('qualification'))
                          <span class="error_msg">
                            {{ $errors->first('qualification') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Profile Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Profile Content" rows="15">{{ $member->PROFILE }}</textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email Address</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="email" value="{{ $member->email }}" placeholder="Email Address">

                      @if ($errors->has('email'))
                          <span class="error_msg">
                            {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" value="{{ $member->CONTACT_PHONE }}" placeholder="Phone Number">

                      @if ($errors->has('phone'))
                          <span class="error_msg">
                            {{ $errors->first('phone') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date of Birth</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" value="{{ $member->DOB }}" placeholder="Date of Birth">

                      @if ($errors->has('birth_date'))
                          <span class="error_msg">
                            {{ $errors->first('birth_date') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="gender">
                        <option value="1" @if( $member->GENDER == '1' ) selected @endif>Male</option>
                        <option value="2"  @if( $member->GENDER == '2' ) selected @endif>Female</option>
                      </select>

                      @if ($errors->has('gender'))
                          <span class="error_msg">
                            {{ $errors->first('gender') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Profile Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="profile_image" placeholder="Profile Image">

                      @if ($errors->has('profile_image'))
                          <span class="error_msg">
                            {{ $errors->first('profile_image') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Member Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="member_type">
                        <option value="">Select Type</option>
                        <option value="1" @if( $member->USER_TYPE_ID == '1' ) selected @endif>Faculty</option>
                        <option value="2" @if( $member->USER_TYPE_ID == '2' ) selected @endif>Staff</option>
                      </select>

                      @if ($errors->has('member_type'))
                          <span class="error_msg">
                            {{ $errors->first('member_type') }}
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