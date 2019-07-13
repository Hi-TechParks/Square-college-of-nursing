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
                <li class="breadcrumb-item"><a href="#">Testimonial</a></li>
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

            @foreach ($testimonials as $testimonial)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ url('/admin/testimonial/edit/'.$testimonial->TESTIMONIAL_ID) }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{ url('/admin/testimonial/update/'.$testimonial->TESTIMONIAL_ID) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Reviewer Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="reviewer_name" value="{{ $testimonial->TESTIMONIAL_BY_NAME }}" placeholder="Reviewer Name">

                      @if ($errors->has('reviewer_name'))
                          <span class="error_msg">
                            {{ $errors->first('reviewer_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Reviewer Details</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="reviewer_details" value="{{ $testimonial->TESTIMONIAL_BY_DESC }}" placeholder="Reviewer Details">

                      @if ($errors->has('reviewer_details'))
                          <span class="error_msg">
                            {{ $errors->first('reviewer_details') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Review Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Review Details" rows="15">
                        {{ $testimonial->TESTIMONIAL_CONTENT }}
                      </textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Reviewer Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="reviewer_image" placeholder="Reviewer Image">
                      Best Resolution : 100px X 100px

                      @if ($errors->has('reviewer_image'))
                          <span class="error_msg">
                            {{ $errors->first('reviewer_image') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Serial No</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="serial_no" value="{{ $testimonial->SL_NO }}" placeholder="Serial No">

                      @if ($errors->has('serial_no'))
                          <span class="error_msg">
                            {{ $errors->first('serial_no') }}
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