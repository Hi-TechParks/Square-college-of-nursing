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
                <li class="breadcrumb-item"><a href="#">Program</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

            @foreach ($programs as $program)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/program/edit/'.$program->PROGRAM_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/program/update/'.$program->PROGRAM_ID) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Category Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="category_name">
                        @foreach( $program_cates as $program_cate )
                        <option value="{{ $program_cate->PROGRAM_TYPE_ID }}" @if( $program->PROGRAM_TYPE_ID == $program_cate->PROGRAM_TYPE_ID ) selected @endif>
                          {{ $program_cate->TYPE_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('category_name'))
                          <span class="error_msg">
                            {{ $errors->first('category_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="program_name" value="{{ $program->PROGRAM_NAME }}" placeholder="Program Name">

                      @if ($errors->has('program_name'))
                          <span class="error_msg">
                            {{ $errors->first('program_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Period</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="period" value="{{ $program->PROGRAM_PERIOD }}" placeholder="Program Period">

                      @if ($errors->has('period'))
                          <span class="error_msg">
                            {{ $errors->first('period') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Period Unit</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="period_unit" value="{{ $program->PERIOD_UNIT }}" placeholder="Period Unit">

                      @if ($errors->has('period_unit'))
                          <span class="error_msg">
                            {{ $errors->first('period_unit') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Description" rows="15">
                        {{ $program->PROGRAM_DESC }}
                      </textarea>

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
            @endforeach

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection