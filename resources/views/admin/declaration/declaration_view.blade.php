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
                <li class="breadcrumb-item"><a href="#">Declaration</a></li>
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
            @foreach( $declarations as $declaration )
            <div class="card">
              <!-- <img src="/uploads/images/profile/" class="card-img-top" alt="Event"> -->
              <div class="card-body">
                <h5 class="card-title">{{ $declaration->DECLARATION_TITLE }}</h5>
                <p class="card-text">{!! $declaration->DECLARATION !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Program Name: {{ $declaration->PROGRAM_NAME }}</li>
                <li class="list-group-item">Session Name: {{ $declaration->SESSION_NAME }}</li>
                <li class="list-group-item">
                  @if( $declaration->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="{{ url('/admin/declaration/edit/'.$declaration->ADMISSION_APP_FORM_DECLARATION_ID) }}" class="btn btn-primary">Edit</a>
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