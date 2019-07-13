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
                <form action="{{ url('/admin/result') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="session_name" placeholder="Session Name">
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
                <caption>List of Results</caption>
                <thead>
                  <tr>
                    <th scope="col">Exam Type</th>
                    <th scope="col">Program Name</th>
                    <th scope="col">Session</th>
                    <th scope="col">Year</th>
                    <th scope="col">File</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $results as $result )
                  <tr>
                    <td>
                      @if( $result->EXAM_TYPE == '0' )
                      In-course
                      @elseif( $result->EXAM_TYPE == '1' )
                      Final
                      @endif
                    </td>
                    <td>{{ $result->PROGRAM_NAME }}</td>
                    <td>{{ $result->SESSION_NAME }}</td>
                    <td>{{ $result->YEAR_NAME }}</td>
                    <td>
                      <a href="{{ asset('/uploads/images/result/'.$result->FILE_PATH) }}" class="btn btn-success btn-sm" download>Download</a>
                    </td>
                    <td>{{ $result->SHOW_FROM_DATE }}</td>
                    <td>{{ $result->SHOW_END_DATE }}</td>
                    <td>
                      @if( $result->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/result/status/'.$result->EXAM_RESULT_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/result/status/'.$result->EXAM_RESULT_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/result/edit/'.$result->EXAM_RESULT_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $results->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection