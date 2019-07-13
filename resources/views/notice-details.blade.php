@extends('layouts.master')
@section('content')

    @foreach( $notices as $notice )

    <!--== Details Page Start ==-->
    <section class="section mt-50" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1>{{ $notice->NOTICE_TITLE }}</h1>
            <div class="blog-box-meta">
              <span class="date"><i class="far fa-calendar-alt"></i> : {{ date('d F', strtotime($notice->PUBLISH_START_DATE)) }}</span>
            </div>
            <!-- @if(!empty($notice->NOTICE_FILE_PATH))
              <a href="/uploads/images/notice/{{ $notice->NOTICE_FILE_PATH }}" class="download" download>Download Notice</a>
            @endif -->
            <p>{!! $notice->NOTICE_DESC !!}</p>
          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    @endforeach


@endsection