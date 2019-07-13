    @extends('layouts.master')
    @section('content')
    <!--== About us Area Start ==-->
    <section class="section mg-tp" id="about-us">
      <div class="container">

        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <div class="section-title-icon"><i class="fas fa-user-injured"></i></div>
              <h2 class="section-title">About Us</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        @foreach( $abouts as $about )
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about-us">
              <div class="about-us-image">
                <img src="{{ asset('/uploads/images/'.$about->IMAGE_FILE_PATH) }}" class="img-fluid mx-auto d-block" alt="About Us" />
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about-us">
              <div class="about-us-details">
                {!! $about->ABOUT_US_CONTENT !!}
              </div>
            </div>
          </div>

        </div>
        @endforeach
      </div>
    </section>
    <!--== About us Area End ==-->
    @endsection