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
            @foreach( $applications as $application )
            <div class="card">
              <img src="{{ asset('/uploads/images/student/'.$application->APPLICANT_PHOTO_PATH) }}" class="card-img-top" alt="Applicant">
              <div class="card-body">
                <h5 class="card-title">{{ $application->STUDENT_NAME }}</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Program Name: {{ $application->PROGRAM_NAME }}</li>
                <li class="list-group-item">Session Name: {{ $application->SESSION_NAME }}</li>


                <li class="list-group-item">Father Name: {{ $application->FATHER_NAME }}</li>
                <li class="list-group-item">Mother Name: {{ $application->MOTHER_NAME }}</li>
                <li class="list-group-item">Date Of Birth: {{ $application->DOB }}</li>
                <li class="list-group-item">Birth Place: {{ $application->BIRTH_PLACE }}</li>
                <li class="list-group-item">
                  Marital Status: 
                  @if( $application->MARITAL_STATUS == 'S' )
                    Single
                  @elseif( $application->MARITAL_STATUS == 'M' )
                    Married
                  @elseif( $application->MARITAL_STATUS == 'W' )
                    Widowed
                  @elseif( $application->MARITAL_STATUS == 'T' )
                    Separated
                  @elseif( $application->MARITAL_STATUS == 'D' )
                    Divorced
                  @endif
                </li>
                <li class="list-group-item">Nationality: {{ $application->NATIONALITY }}</li>
                <li class="list-group-item">National ID: {{ $application->NATIONAL_ID }}</li>
                <li class="list-group-item">Religion: {{ $application->RELIGION }}</li>
                <li class="list-group-item">Country: {{ $application->COUNTRY_NAME }}</li>
                <li class="list-group-item">Permanent Address: {{ $application->PERMANENT_ADDRESS }}</li>
                <li class="list-group-item">Permanent Upazilla: {{ $application->PERMANENT_UPAZILLA }}</li>
                <li class="list-group-item">Permanent Distrct: {{ $application->PERMANENT_DISTRICT }}</li>
                <li class="list-group-item">Contact Address: {{ $application->CONTACT_ADDRESS }}</li>
                <li class="list-group-item">Phone No: {{ $application->CONTACT_NO }}</li>
                <li class="list-group-item">Email ID: {{ $application->EMAIL_ID }}</li>

                <!-- <fieldset class="form-row">
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
                      @foreach( $educations as $education )
                      <tr>
                        <td>
                          {{ $education->EXAM_NAME }}
                        </td>
                        <td>
                          {{ $education->GROUP_NAME }}
                        </td>
                        <td>
                          {{ $education->YEAR_PASSED }}
                        </td>
                        <td>
                          {{ $education->ROLL_NO }}
                        </td>
                        <td>
                          {{ $education->REG_NO }}
                        </td>
                        <td>
                          {{ $education->BOARD_NAME }}
                        </td>
                        <td>
                          {{ $education->GPA_WITH_OPTIONAL_SUBJECT }}
                        </td>
                        <td>
                          {{ $education->MARKS_BIOLOGY }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>

                </fieldset> -->

                <li class="list-group-item">
                  @if( $application->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="{{ url('/admin/student/edit/'.$application->STUDENT_ID) }}" class="btn btn-primary">Edit</a>
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