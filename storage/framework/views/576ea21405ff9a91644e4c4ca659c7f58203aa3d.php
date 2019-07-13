    
    <?php $__env->startSection('content'); ?>
    <!--== Slider Area Start ==-->
  	<section id="slider" class="mg-tp">
  		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		  <ol class="carousel-indicators">
  		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  		  </ol>
  		  <div class="carousel-inner">

          <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  		    <div class="carousel-item">
  		      <img src="<?php echo e(asset('/uploads/images/slide/'.$slide->IMAGE_PATH)); ?>" class="d-block w-100" alt="...">
            <?php if( isset($slide->IMAGE_TITLE) || isset($slide->IMAGE_DESC) ): ?>
  		      <div class="carousel-caption d-none d-md-block">
    			    <div class="carouser-caption-box">
    			    	<h5><?php echo e($slide->IMAGE_TITLE); ?></h5>
    				    <p><?php echo $slide->IMAGE_DESC; ?></p>
    			    </div>
    			  </div>
            <?php endif; ?>
  		    </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  		  </div>
  		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  		    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
  		    <span class="sr-only">Previous</span>
  		  </a>
  		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  		    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
  		    <span class="sr-only">Next</span>
  		  </a>
  		</div>
  	</section>
    <!--== Slider Area End ==-->


    <section class="section">
      <div class="news-banner">
        <div class="newstext">
          ***SUB Students are Requested to Contact the Admission Office for A Special Offer***
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          ***10% Tuition Fees Waiver for Summer-2019 Admission, Apply Now ***
        </div>        
      </div>     
    </section>



    <!--== Calender & Notice Area Start ==-->
    <section class="section" id="event-notice">
      <div class="container">

        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <div class="section-title-icon"><i class="fas fa-calendar-alt"></i></div>
              <h2 class="section-title">Academic Calendar & Notice</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">

          <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="event-notice-box">
              <div class="event-notice-box-header">
                <div class="event-notice-box-header-title">
                  Events
                </div>
              </div>
              <div class="event-notice-box-body">

                  <!-- <div id='calendarFull'></div> -->
                  <div id='calendar'></div>

                  <?php echo $__env->make('calender_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <div class="event_indicator">
                    <div class="single_indicator">
                      <div class="indicator_circle" style="background: #DB6600;"></div> <span>Exam</span>
                    </div>
                    <div class="single_indicator">
                      <div class="indicator_circle" style="background: #5D3AEE;"></div> <span>Class off</span>
                    </div>
                    <div class="single_indicator">
                      <div class="indicator_circle" style="background: #EB1B1B;"></div> <span>Holiday</span>
                    </div>
                    <div class="single_indicator">
                      <div class="indicator_circle" style="background: #01D162;"></div> <span>Others</span>
                    </div>
                  </div>
              </div>
              <div class="event-notice-box-footer">
                
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="event-notice-box">
              <div class="event-notice-box-header">
                <div class="event-notice-box-header-title">
                  Notice
                </div>
              </div>
              <div class="event-notice-box-body">

                <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--== Single Notice Box ==-->
                <div class="single-notice-box">
                  <div class="single-notice-left">
                    <div class="single-notice-date-box">
                      <span><?php echo e(date('d', strtotime($notice->PUBLISH_START_DATE))); ?></span>
                      <?php echo e(date('F', strtotime($notice->PUBLISH_START_DATE))); ?>

                    </div>
                  </div>
                  <div class="single-notice-right">
                    <p><?php echo e($notice->NOTICE_TITLE); ?></p>
                    <!-- <button data-toggle="modal" data-target="#20181200009">View More</button>-->
                    <a href="<?php echo e(url('/notice/single/'.$notice->NOTICE_ID)); ?>">View More</a>
                  </div>
                </div>
                <!--== Single Notice Box ==-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!--== Single Notice Box ==-->
                <!-- <div class="single-notice-box">
                  <div class="single-notice-left">
                    <div class="single-notice-date-box">
                      <span>26</span>
                      Jan
                    </div>
                  </div>
                  <div class="single-notice-right">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                    <button data-toggle="modal" data-target="#20181200009">View More</button>
                  </div>
                </div> -->
                <!--== Single Notice Box ==-->

                <a href="<?php echo e(url('/notice')); ?>" class="view_all">View All</a>

              </div>
              <div class="event-notice-box-footer">
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--== Calender & Notice Area End ==-->



    <!--== Event Area Start ==-->
    <div class="event-overlay">
    <section class="section" id="event-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="section-title-area">
              <div class="section-title-icon"><i class="fas fa-eye"></i></div>
              <h1 class="text-center"><span>Events</span></h1>
            </div>
          </div>
        </div>
        <div class="row">

          <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Event ==-->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="event-page-single-box">
              <div class="event-page-single-box-left">
                <div class="event-page-single-box-image">
                  <img src="<?php echo e(asset('/uploads/images/event/'.$event->IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block" alt="campus tour" />
                </div>
              </div>
              <div class="event-page-single-box-right">
                <div class="event-page-single-box-header">
                  <div class="single-notice-right">
                    <p><?php echo e($event->EVENT_TITLE); ?></p>
                    <div class="meta-box">
                      <span><i class="far fa-calendar-alt"></i></span>
                      <?php echo e(date('d-M-y', strtotime($event->EVENT_DATE))); ?>

                    </div>
                    <div class="meta-box">
                      <span><i class="far fa-clock"></i></span> <?php echo e(date('h:i A', strtotime($event->EVENT_TIME))); ?>

                    </div>
                  </div>
                </div>
                <div class="event-page-single-box-footer">
                  <a href="<?php echo e(url('/event/single/'.$event->EVENT_ID)); ?>" class="read_more">View Details</a>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Event ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <!--== Single Event ==-->
          <!-- <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="event-page-single-box">
              <div class="event-page-single-box-left">
                <div class="event-page-single-box-image">
                  <img src="assets/img/events/1.png" class="img-fluid mx-auto d-block" alt="campus tour" />
                </div>
              </div>
              <div class="event-page-single-box-right">
                <div class="event-page-single-box-header">
                  <div class="single-notice-right">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                    <div class="meta-box">
                      <span><i class="far fa-calendar-alt"></i></span>
                      24 April, 19
                    </div>
                    <div class="meta-box">
                      <span><i class="far fa-clock"></i></span> 05:00 PM
                    </div>
                  </div>
                </div>
                <div class="event-page-single-box-footer">
                  <a href="" class="read_more">View Details</a>
                </div>
              </div>
            </div>
          </div> -->
          <!--== Single Event ==-->

        </div>
        <div class="row">
          <div class="col-xs-12">
            <a href="<?php echo e(url('/event')); ?>" class="view_all" style="color: #fff;">View All</a>
          </div>
        </div>

      </div>
    </section>
    </div>
    <!--== Event Area End ==-->



    <!--== Person Box Area Start ==-->
  	<section class="section" id="person-box">
  	  <div class="container">
  	  	<div class="row">


          <!-- ===  Text Shorten Code  ====  -->
          <?php
            // code for shortening the big content fetched from database
             function MsgTextShorten($text, $limit = 200){
                $text = $text." ";
                $text = substr($text, 0, $limit);
                $text = substr($text, 0, strrpos($text, " "));
                $text = $text;
                return $text;
            }
          ?> 
          <!-- ===  Text Shorten Code  ====  -->
          

          <?php $__currentLoopData = $c_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Person Box ==-->
  	  	  <div class="col-lg-3 col-md-6 col-sm-12">
    		    <div class="card">
    		      <div class="card-body">
    		        <div class="person-box-header">
    		          <div class="person-box-image">
    		          	<img src="<?php echo e(asset('/uploads/images/profile/'.$c_message->PROFILE_IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block">
    		          </div>
                  <div class="person-title"><?php echo e($c_message->DESIGNATION_NAME); ?></div>
    		        </div>
    		        <div class="person-box-footer">
    		        	<?php echo MsgTextShorten($c_message->MESSAGE_CONTENT); ?>

                  <?php if(strlen($c_message->MESSAGE_CONTENT) > 200): ?>
                    <a class="read_more" href="<?php echo e(url('/message/'.$c_message->MESSAGE_ID)); ?>"> Read More</a>
                  <?php endif; ?>
    		        </div>
    		      </div>
    		    </div>
    		  </div>
          <!--== Single Person Box ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php $__currentLoopData = $md_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $md_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Person Box ==-->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="person-box-header">
                  <div class="person-box-image">
                    <img src="<?php echo e(asset('/uploads/images/profile/'.$md_message->PROFILE_IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block">
                  </div>
                  <div class="person-title"><?php echo e($md_message->DESIGNATION_NAME); ?></div>
                </div>
                <div class="person-box-footer">
                  <?php echo MsgTextShorten($md_message->MESSAGE_CONTENT); ?>

                  <?php if(strlen($md_message->MESSAGE_CONTENT) > 200): ?>
                    <a class="read_more" href="<?php echo e(url('/message/'.$md_message->MESSAGE_ID)); ?>"> Read More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Person Box ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php $__currentLoopData = $gb_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gb_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Person Box ==-->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="person-box-header">
                  <div class="person-box-image">
                    <img src="<?php echo e(asset('/uploads/images/profile/'.$gb_message->PROFILE_IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block">
                  </div>
                  <div class="person-title"><?php echo e($gb_message->DESIGNATION_NAME); ?></div>
                </div>
                <div class="person-box-footer">
                  <?php echo MsgTextShorten($gb_message->MESSAGE_CONTENT); ?>

                  <?php if(strlen($gb_message->MESSAGE_CONTENT) > 200): ?>
                    <a class="read_more" href="<?php echo e(url('/message/'.$gb_message->MESSAGE_ID)); ?>"> Read More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Person Box ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php $__currentLoopData = $p_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Person Box ==-->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="person-box-header">
                  <div class="person-box-image">
                    <img src="<?php echo e(asset('/uploads/images/profile/'.$p_message->PROFILE_IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block">
                  </div>
                  <div class="person-title"><?php echo e($p_message->DESIGNATION_NAME); ?></div>
                </div>
                <div class="person-box-footer">
                  <?php echo MsgTextShorten($p_message->MESSAGE_CONTENT); ?>

                  <?php if(strlen($p_message->MESSAGE_CONTENT) > 200): ?>
                    <a class="read_more" href="<?php echo e(url('/message/'.$p_message->MESSAGE_ID)); ?>"> Read More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Person Box ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  	  	</div>
  	  </div>
  		
  	</section>
    <!--== Person Box Area End ==-->


    <!--== Counter Box Area Start ==-->
  	<div class="counter-overlay">
  	<section class="section" id="counter">
  	  
  	  <div class="container">
  	  	<div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="admission-image">
              <img src="<?php echo e(asset('/assets/img/admissions.png')); ?>" alt="admission">

              <div class="admisson-button">
                <a href="<?php echo e(url('/admission')); ?>">ADMISSION IN NURSING</a>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-8">
            <div class="row">
              
              <!--== Single Counter Box ==-->
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="counter-box">
                  <div class="counter-icon">
                    <div class=""><i class="fab fa-accusoft"></i></div>
                  </div>
                  <div class="counter-text">
                    <div class="counter">300</div>+
                    <span>Active Students</span>
                  </div>
                </div>
              </div>
              <!--== Single Counter Box ==-->

              <!--== Single Counter Box ==-->
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="counter-box">
                  <div class="counter-icon">
                    <div class=""><i class="fas fa-chalkboard-teacher"></i></div>
                  </div>
                  <div class="counter-text">
                    <div class="counter">15</div>+
                    <span>Estimated Faculties</span>
                  </div>
                </div>
              </div>
              <!--== Single Counter Box ==-->

              <!--== Single Counter Box ==-->
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="counter-box">
                  <div class="counter-icon">
                    <div class=""><i class="fas fa-user-graduate"></i></div>
                  </div>
                  <div class="counter-text">
                    <div class="counter">400</div>+
                    <span>Successful Alumni</span>
                  </div>
                </div>
              </div>
              <!--== Single Counter Box ==-->

            </div>
          </div>
  	  	</div>
  	  </div>

  	</section>
  	</div>
    <!--== Counter Box Area End ==-->



    <!--== Gallery Area Start ==-->
  	<section class="section" id="photo-gallery">
  	  <div class="container">

        <!--== Section Title Area ==-->
  	  	<div class="row">
  	  		<div class="col-md-12">
  	  			<div class="section-title-area">
  	  				<div class="section-title-icon"><i class="fas fa-camera"></i></div>
  	  				<h2 class="section-title">Pictures & Gallery</h2>
  	  			</div>
  	  		</div>
  	  	</div>
        <!--== Section Title Area ==-->

    		<div class="row">
          
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Gallery ==-->
          <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="single-photo-gallery">
              <img src="<?php echo e(asset('/uploads/images/gallery/'.$image->IMAGE_FILE_PATH)); ?>" class="img-fluid mx-auto d-block" alt="Photo">
              <a data-fancybox="gallery" href="<?php echo e(asset('/uploads/images/gallery/'.$image->IMAGE_FILE_PATH)); ?>">
                <div class="photo-gallery-overlay">
                  <div class="photo-gallery-icon">
                    <i class="fas fa-search-plus"></i>
                  </div>
                </div>
              </a>
            </div>
          </div> -->
          <!--== Single Gallery ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <!--== Single Gallery ==-->
    			<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    				<div class="single-photo-gallery">
    					<img src="assets/img/gallery/1.png" class="img-fluid mx-auto d-block" alt="Photo">
    					<a data-fancybox="gallery" href="assets/img/gallery/1.png">
  	  					<div class="photo-gallery-overlay">
  	  						<div class="photo-gallery-icon">
  	  							<i class="fas fa-search-plus"></i>
  	  						</div>
  	  					</div>
    					</a>
    				</div>
    			</div> -->
          <!--== Single Gallery ==-->




          <div id="gallery" style="display:none;">
  
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img alt="Gallery Image"
               src="<?php echo e(asset('/uploads/images/gallery/thumb/'.$image->IMAGE_FILE_PATH)); ?>"
               data-image="<?php echo e(asset('/uploads/images/gallery/'.$image->IMAGE_FILE_PATH)); ?>">
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <!-- <img alt="Preview Image 2"
               src="images/thumbs/thumb2.jpg"
               data-image="images/big/image2.jpg"
               data-description="Preview Image 2 Description"> -->

          </div>





    		</div>
  	  </div>
  	</section>
    <!--== Gallery Area End ==-->




    <!--== Testimonial Area Start ==-->
    <div class="testimonial-overlay">
    <section class="section" id="testimonial">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="testimonial-title">
              Testimonial
            </div>
            <div class="testimonial-subtitle">
              What students say about us
            </div>
          </div>

          <div class="col-lg-8 col-md-6 col-sm-12 owl-carousel owl-theme">

          <!-- ===  Text Shorten Code  ====  -->
          <?php
            // code for shortening the big content fetched from database
             function ReviewTextShorten($text, $limit = 200){
                $text = $text." ";
                $text = substr($text, 0, $limit);
                $text = substr($text, 0, strrpos($text, " "));
                $text = $text;
                return $text;
            }
          ?> 
          <!-- ===  Text Shorten Code  ====  -->

          <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Testimonial Box ==-->
          <div class="item">
            <div class="card">
              <div class="card-body">
                <div class="testimonial-box-header">
                  <div class="card-icon"><i class="fas fa-quote-left"></i></div>
                  <?php echo ReviewTextShorten($testimonial->TESTIMONIAL_CONTENT); ?>...
                  <?php if(strlen($testimonial->TESTIMONIAL_CONTENT) > 200): ?>
                    <a class="read_more" href="<?php echo e(url('/testimonial/'.$testimonial->TESTIMONIAL_ID)); ?>"> Read More</a>
                  <?php endif; ?>
                </div>
                <div class="testimonial-box-footer">
                  <div class="testimonial-box-image">
                    <img src="<?php echo e(asset('/uploads/images/reviewer/'.$testimonial->IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block">
                  </div>
                  <div class="testimonial-box-info">
                    <h5 class="card-title"><?php echo e($testimonial->TESTIMONIAL_BY_NAME); ?></h5>
                    <p class="card-text"><?php echo e($testimonial->TESTIMONIAL_BY_DESC); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Testimonial Box ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <!--== Single Testimonial Box ==-->
          <!-- <div class="item">
            <div class="card">
              <div class="card-body">
                <div class="testimonial-box-header">
                  <div class="card-icon"><i class="fas fa-quote-left"></i></div>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                </div>
                <div class="testimonial-box-footer">
                  <div class="testimonial-box-image">
                    <img src="assets/img/students/114.png" class="img-fluid mx-auto d-block">
                  </div>
                  <div class="testimonial-box-info">
                    <h5 class="card-title">Student's Name</h5>
                    <p class="card-text">3<sup>rd</sup> Batch</p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!--== Single Testimonial Box ==-->
          </div>

        </div>
      </div>
    </section>
    </div>
    <!--== Testimonial Area End ==-->


    <!-- Subscribe Section -->
    <!-- <section class="section">
      <div class="container">
        <div class="subscribe-box">

          <div class="row">
            <div class="col-md-6">
              <p class="subscribe-title">To Get Latest Update
                <span>Subscribe Us</span>
              </p>
            </div>
            <div class="col-md-6">
              <form class="subscribe-form">
                <div class="form-row align-items-center">

                    <div class="input-group mb-2">
                      
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Your Email Address....">
                      <div class="input-group-prepend">
                        <button type="submit" class="btn input-group-text">SEND</button>
                      </div>

                    </div>

                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
 -->    <!-- Subscribe Section -->


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/index.blade.php ENDPATH**/ ?>