@extends('layouts.master')
@section('content')

  	<!--== Notice Area Start ==-->
    <section class="section mg-tp" id="about-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="about-page-details">
              <h1 class="text-center"><span>All Notice</span></h1>
              <br/>
              
              <div class="table-responsive">
              <table class="table table-bordered notice-table">
                <thead>
                  
                </thead>
                <tbody>

                  @foreach( $notices as $notice )
                  <tr>
                    <td>
                      <div class="single-notice-date-box">
                        <span>{{ date('d', strtotime($notice->PUBLISH_START_DATE)) }}</span>
                        {{ date('M', strtotime($notice->PUBLISH_START_DATE)) }}
                      </div>
                    </td>
                    <td>
                      <div class="single-notice-details">
                        <p>{{ $notice->NOTICE_TITLE }}</p>
                        <a href="{{ url('/notice/single/'.$notice->NOTICE_ID) }}">View More</a>
                      </div>
                    </td>
                    <td>
                      <!-- @if(!empty($notice->NOTICE_FILE_PATH))
                        <a href="/uploads/images/notice/{{ $notice->NOTICE_FILE_PATH }}" class="research-download" download>Download pdf</a>
                      @endif -->
                    </td>
                  </tr>
                  @endforeach

                  <!-- <tr>
                    <td>
                      <div class="single-notice-date-box">
                        <span>26</span>
                        Jan
                      </div>
                    </td>
                    <td>
                      <div class="single-notice-details">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                        <button data-toggle="modal" data-target="#20181200009">Read More</button>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="research-download" download>Download pdf</a>
                    </td>
                  </tr> -->
                  
                </tbody>
              </table>
              </div>

              <!--== Pagination Area Start ==-->
              <div class="mx-auto d-block d-flex">
                <nav aria-label="..." class="mx-auto d-block">
                  {{ $notices->links() }}
                </nav>
              </div>
              <!--== Pagination Area End ==-->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== Notice Area End ==-->

@endsection