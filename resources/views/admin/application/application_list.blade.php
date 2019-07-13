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
                <li class="breadcrumb-item active" aria-current="page">List</li>
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
                <!--== Search Form Start ==-->
                <form action="{{ url('/admin/application') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="applicant_name" placeholder="Applicant Name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="program_name" placeholder="Program Name">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form>
                <!--== Search Form End ==-->
              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Applications</caption>
                <thead>
                  <tr>
                    <th scope="col">Applicant</th>
                    <th scope="col">Program Name</th>
                    <th scope="col">Session Name</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $applications as $application )
                  <tr>
                    <td>{{ $application->APPLICANT_NAME }}</td>
                    <td>{{ $application->PROGRAM_NAME }}</td>
                    <td>{{ $application->SESSION_NAME }}</td>
                    <td>
                      @if( $application->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/application/status/'.$application->ADMISSION_APPLICATION_FORM_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/application/status/'.$application->ADMISSION_APPLICATION_FORM_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/application/show/'.$application->ADMISSION_APPLICATION_FORM_ID) }}" class="btn btn-success">View</a>
                      <a href="{{ url('/admin/application/edit/'.$application->ADMISSION_APPLICATION_FORM_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $applications->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection