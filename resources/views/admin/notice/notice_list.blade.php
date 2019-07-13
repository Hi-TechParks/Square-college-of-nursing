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
                <li class="breadcrumb-item"><a href="#">Notice</a></li>
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
                <form action="{{ url('/admin/notice') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="notice_title" placeholder="Notice Title">
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
                <caption>List of Notices</caption>
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Publish Start</th>
                    <th scope="col">Publish End</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $notices as $notice )
                  <tr>
                    <td>{{ $notice->NOTICE_TITLE }}</td>
                    <td>{{ $notice->PUBLISH_START_DATE }}</td>
                    <td>{{ $notice->PUBLISH_END_DATE }}</td>
                    <td>
                      @if( $notice->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/notice/status/'.$notice->NOTICE_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/notice/status/'.$notice->NOTICE_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/notice/show/'.$notice->NOTICE_ID) }}" class="btn btn-success">View</a>
                      <a href="{{ url('/admin/notice/edit/'.$notice->NOTICE_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $notices->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection