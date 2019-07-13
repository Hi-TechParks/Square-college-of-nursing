@extends('layouts.master')
@section('content')

  	<!--== Chairman Area Start ==-->
    <section class="section pd-btm mg-tp" id="about-page">
      <div class="container">

        @foreach( $messages as $message )
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="about-page-image">
              <img src="{{ asset('/uploads/images/profile/'.$message->PROFILE_IMAGE_PATH) }}" class="img-fluid mx-auto d-block" alt="profile">
              <p class="about-page-name">{{ $message->name }}</p>
              <p class="about-page-degination">{{ $message->DESIGNATION_NAME }}</p>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 offset-lg-1">
            <div class="about-page-details">
              <h1><span>Message</span></h1>
              <br/>
              {!! $message->MESSAGE_CONTENT !!}
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </section>
    <!--== Chairman Area End ==-->

@endsection