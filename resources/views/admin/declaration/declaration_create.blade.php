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
                    <a href="{{ URL('/admin/declaration/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/declaration/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name">
                        <option value="">Select Program</option>
                        @foreach( $programs as $program )
                        <option value="{{ $program->PROGRAM_ID }}">{{ $program->PROGRAM_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('program_name'))
                          <span class="error_msg">
                            {{ $errors->first('program_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Session Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name">
                        <option value="">Select Session</option>
                        @foreach( $sessions as $session )
                        <option value="{{ $session->SESSION_ID }}">{{ $session->SESSION_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('session_name'))
                          <span class="error_msg">
                            {{ $errors->first('session_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Declaration Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="declaration_title" placeholder="Declaration Title">

                      @if ($errors->has('declaration_title'))
                          <span class="error_msg">
                            {{ $errors->first('declaration_title') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Declaration</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Declaration" rows="15"></textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
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

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection