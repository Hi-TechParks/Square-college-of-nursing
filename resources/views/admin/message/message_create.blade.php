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
                <li class="breadcrumb-item"><a href="#">Message</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ URL('/admin/message/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/message/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Writer Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="full_name">
                        <option value="">Select Name</option>
                        @foreach( $members as $member )
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('full_name'))
                          <span class="error_msg">
                            {{ $errors->first('full_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Designation</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="designation" placeholder="Designation">

                      @if ($errors->has('designation'))
                          <span class="error_msg">
                            {{ $errors->first('designation') }}
                          </span>
                      @endif
                    </div>
                  </div> -->

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Message</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Message" rows="15"></textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Profile Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="profile_image" placeholder="Profile Image">

                      @if ($errors->has('profile_image'))
                          <span class="error_msg">
                            {{ $errors->first('profile_image') }}
                          </span>
                      @endif
                    </div>
                  </div> -->

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection