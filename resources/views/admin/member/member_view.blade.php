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
            @foreach( $members as $member )
            <div class="card">
              <img src="{{ asset('/uploads/images/profile/'.$member->PROFILE_IMAGE_PATH) }}" class="card-img-top" alt="Event">
              <div class="card-body">
                <h5 class="card-title">{{ $member->name }}</h5>
                <p class="card-text">{!! $member->PROFILE !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Designation: {{ $member->DESIGNATION_NAME }}</li>
                <li class="list-group-item">Qualification: {{ $member->QUALIFICATION }}</li>
                <li class="list-group-item">Email Address: {{ $member->email }}</li>
                <li class="list-group-item">Contact Phone: {{ $member->CONTACT_PHONE }}</li>
                <li class="list-group-item">Date Of Birth: {{ $member->DOB }}</li>
                <li class="list-group-item">Gender: 
                  @if($member->GENDER == '1')
                    Male
                  @elseif($member->GENDER == '2')
                    Female
                  @endif
                </li>
                <li class="list-group-item">User Type: 
                  @if($member->USER_TYPE_ID == '1')
                    Faculty
                  @elseif($member->USER_TYPE_ID == '2')
                    Staff
                  @endif
                </li>
                <li class="list-group-item">
                  @if( $member->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="{{ url('/admin/member/edit/'.$member->id) }}" class="btn btn-primary">Edit</a>
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