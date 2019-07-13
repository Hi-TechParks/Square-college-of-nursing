@extends('layouts.master')
@section('content')

  	<!--== Chairman Area Start ==-->
    <section class="section pd-btm mg-tp" id="about-page">
      <div class="container">

        @foreach( $testimonials as $testimonial )
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="about-page-image">
              <img src="{{ asset('/uploads/images/reviewer/'.$testimonial->IMAGE_PATH) }}" class="img-fluid mx-auto d-block" alt="profile">
              <p class="about-page-name">{{ $testimonial->TESTIMONIAL_BY_NAME }}</p>
              <p class="about-page-degination">{{ $testimonial->TESTIMONIAL_BY_DESC }}</p>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 offset-lg-1">
            <div class="about-page-details">
              <h1><span>Testimonial</span></h1>
              <br/>
              {!! $testimonial->TESTIMONIAL_CONTENT !!}
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </section>
    <!--== Chairman Area End ==-->

@endsection