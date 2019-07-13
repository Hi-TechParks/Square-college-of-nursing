    @extends('layouts.master')
    @section('content')
    <!--== Contact us Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
    
      <!-- ==========================  Start Contact Section  =============================  -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- ===  Contact Form  ====  -->
              <div class="contact_form">
                  <div class="contact-header">
                    <h4>Your feedback is valuable to us</h4>
                  </div>

                  @include('admin.inc.message')

                  <form  action="{{url('/admin/email/store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">

                      @if ($errors->has('subject'))
                          <span class="error_msg">
                            {{ $errors->first('subject') }}
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Youremail@mail.com">

                      @if ($errors->has('email'))
                          <span class="error_msg">
                            {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <textarea class="form-control" name="content" placeholder="Write Somthing..."></textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
                          </span>
                      @endif
                    </div>

                      <input type="submit" class="btn btn-default" value="Send">
                  </form>
              </div>
              <!-- ===  Contact Form  ====  -->
            </div>

            <div class="col-md-6 col-sm-12">
              <!-- ===  Contact Info  ====  -->
              <div class="contact_info_table">
                <div class="contact-header">
                  <h4>Find us here</h4>
                </div>

                @foreach( $addresses as $address )
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-map-marker-alt"></i></span> {{ $address->CONTACT_ADDRESS }}
                    </div>
                </div>
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-phone"></i> </span> Contact : {{ $address->CONTACT_PHONE }}
                    </div>
                </div>
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-envelope"></i></span> Email : {{ $address->CONTACT_EMAIL }}
                    </div>
                </div>
                @endforeach

              </div>
              <!-- ===  Contact Info  ====  -->
            </div>
          </div>
          <!-- ==========================  End Contact Section  =============================  -->
        
      </div>
    </section>
    <!--== Contact us Area End ==-->
    @endsection