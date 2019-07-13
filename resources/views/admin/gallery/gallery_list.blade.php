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
                <li class="breadcrumb-item"><a href="#">Gallery</a></li>
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
                <form action="{{ url('/admin/gallery') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="image_title" placeholder="Image Title">
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
                <caption>List of Images</caption>
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Show Home</th>
                    <th scope="col">Serial No</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $images as $image )
                  <tr>
                    <td><img src="{{ asset('/uploads/images/gallery/'.$image->IMAGE_FILE_PATH) }}" alt="Image"></td>
                    <td>{{ $image->IMAGE_TITLE }}</td>
                    <td>
                      @if( $image->HOME_PAGE_SHOW_FLAG == '1' )
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td>{{ $image->SL_NO }}</td>
                    <td>
                      @if( $image->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/gallery/status/'.$image->IMAGE_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/gallery/status/'.$image->IMAGE_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/gallery/show/'.$image->IMAGE_ID) }}" class="btn btn-success">View</a>
                      <a href="{{ url('/admin/gallery/edit/'.$image->IMAGE_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $images->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection