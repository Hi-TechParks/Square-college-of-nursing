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
                <li class="breadcrumb-item"><a href="#">Designation</a></li>
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
                <form action="{{ url('/admin/designation') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="designation_title" placeholder="Designation">
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
                <caption>List of Designations</caption>
                <thead>
                  <tr>
                    <th scope="col">Designation</th>
                    <th scope="col">Designation Type</th>
                    <th scope="col">Short Code</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $designations as $designation )
                  <tr>
                    <td>{{ $designation->DESIGNATION_NAME }}</td>
                    <td>
                      @if( $designation->DESIGNATION_TYPE == '1' )
                        Academic
                      @elseif( $designation->DESIGNATION_TYPE == '2' )
                        Admin
                      @endif
                    </td>
                    <td>{{ $designation->SHORT_CODE }}</td>
                    <td>
                      @if( $designation->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/designation/status/'.$designation->DESIGNATION_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/designation/status/'.$designation->DESIGNATION_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/designation/edit/'.$designation->DESIGNATION_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $designations->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection