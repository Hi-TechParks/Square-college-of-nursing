            <nav id="column_left">  
              <ul class="nav nav-list">
                  <li><h4>Dashboard</h4></li> 

                  <li class="<?php echo e(Request::path() == 'admin/message' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/message/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#message">
                        <span class="nav-header-primary">Message <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="message">
                      <li><a href="<?php echo e(url('/admin/message')); ?>">Message List</a></li>
                      <li><a href="<?php echo e(url('/admin/message/create')); ?>">Create Message</a></li>
                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#programs">
                        <span class="nav-header-primary">Programs <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="programs">
                      

                      <li class="<?php echo e(Request::path() == 'admin/program' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/program/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#program">
                            <span class="nav-header-primary">Program <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="program">
                          <li><a href="<?php echo e(url('/admin/program')); ?>">Program List</a></li>
                          <li><a href="<?php echo e(url('/admin/program/create')); ?>">Create Program</a></li>
                        </ul>
                      </li>

                      <li class="<?php echo e(Request::path() == 'admin/procate' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/procate/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#procate">
                            <span class="nav-header-primary">Program Category <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="procate">
                          <li><a href="<?php echo e(url('/admin/procate')); ?>">Category List</a></li>
                          <li><a href="<?php echo e(url('/admin/procate/create')); ?>">Create Category</a></li>
                        </ul>
                      </li>

                      <li class="<?php echo e(Request::path() == 'admin/session' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/session/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#session">
                            <span class="nav-header-primary">Session <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="session">
                          <li><a href="<?php echo e(url('/admin/session')); ?>">Session List</a></li>
                          <li><a href="<?php echo e(url('/admin/session/create')); ?>">Create Session</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#admission">
                        <span class="nav-header-primary">Admission <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="admission">

                      <li class="<?php echo e(Request::path() == 'admin/application' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/application/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#application_form">
                            <span class="nav-header-primary">Application <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="application_form">
                          <li><a href="<?php echo e(url('/admin/application')); ?>">Application List</a></li>
                          <li><a href="<?php echo e(url('/admin/application/create')); ?>">Create Application</a></li>
                        </ul>
                      </li>

                      <li class="<?php echo e(Request::path() == 'admin/declaration' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/declaration/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#form_declartion">
                            <span class="nav-header-primary">Declaration <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="form_declartion">
                          <li><a href="<?php echo e(url('/admin/declaration')); ?>">Declaration List</a></li>
                          <li><a href="<?php echo e(url('/admin/declaration/create')); ?>">Create Declaration</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#fac_staff">
                        <span class="nav-header-primary">Faculty And Staff <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="fac_staff">


                      <li class="<?php echo e(Request::path() == 'admin/member' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/member/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#member">
                            <span class="nav-header-primary">Member <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="member">
                          <li><a href="<?php echo e(url('/admin/member')); ?>">Member List</a></li>
                          <li><a href="<?php echo e(url('/admin/member/create')); ?>">Create Member</a></li>
                        </ul>
                      </li>

                      <li class="<?php echo e(Request::path() == 'admin/designation' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/designation/create' ? 'active' : ''); ?>">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#designation">
                            <span class="nav-header-primary">Designation <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="designation">
                          <li><a href="<?php echo e(url('/admin/designation')); ?>">Designation List</a></li>
                          <li><a href="<?php echo e(url('/admin/designation/create')); ?>">Create Designation</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/course' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/course/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#course">
                        <span class="nav-header-primary">Course <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="course">
                      <li><a href="<?php echo e(url('/admin/course')); ?>">Course List</a></li>
                      <li><a href="<?php echo e(url('/admin/course/create')); ?>">Create Course</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/procourse' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/procourse/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#procourse">
                        <span class="nav-header-primary">Program Course <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="procourse">
                      <li><a href="<?php echo e(url('/admin/procourse')); ?>">Program Course List</a></li>
                      <li><a href="<?php echo e(url('/admin/procourse/create')); ?>">Create Program Course</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/country' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/country/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#country">
                        <span class="nav-header-primary">Country <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="country">
                      <li><a href="<?php echo e(url('/admin/country')); ?>">Country List</a></li>
                      <li><a href="<?php echo e(url('/admin/country/create')); ?>">Create Country</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/student' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/student/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#student">
                        <span class="nav-header-primary">Student <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="student">
                      <li><a href="<?php echo e(url('/admin/student')); ?>">Student List</a></li>
                      <li><a href="<?php echo e(url('/admin/student/create')); ?>">Create Student</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/result' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/result/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#result">
                        <span class="nav-header-primary">Result <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="result">
                      <li><a href="<?php echo e(url('/admin/result')); ?>">Result List</a></li>
                      <li><a href="<?php echo e(url('/admin/result/create')); ?>">Create Result</a></li>
                    </ul>
                  </li>
                  
                  <li class="<?php echo e(Request::path() == 'admin/slide' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/slide/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#slider">
                        <span class="nav-header-primary">Slider <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="slider">
                      <li><a href="<?php echo e(url('/admin/slide')); ?>">Slide List</a></li>
                      <li><a href="<?php echo e(url('/admin/slide/create')); ?>">Create Slide</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/blogcate' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/blogcate/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#notice">
                        <span class="nav-header-primary">Notice <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="notice">
                      <li><a href="<?php echo e(url('/admin/notice')); ?>">Notice List</a></li>
                      <li><a href="<?php echo e(url('/admin/notice/create')); ?>">Create Notice</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/blogcate' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/blogcate/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#event">
                        <span class="nav-header-primary">Event <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="event">
                      <li><a href="<?php echo e(url('/admin/event')); ?>">Event List</a></li>
                      <li><a href="<?php echo e(url('/admin/event/create')); ?>">Create Event</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/event/type' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/event/type/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#event_type">
                        <span class="nav-header-primary">Event Type <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="event_type">
                      <li><a href="<?php echo e(url('/admin/event/type')); ?>">Event Type List</a></li>
                      <li><a href="<?php echo e(url('/admin/event/type/create')); ?>">Create Event Type</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/calendar' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/calendar/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#calendar">
                        <span class="nav-header-primary">Event Calendar <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="calendar">
                      <li><a href="<?php echo e(url('/admin/calendar')); ?>">Calendar List</a></li>
                      <li><a href="<?php echo e(url('/admin/calendar/create')); ?>">Create Calendar</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/gallery' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/gallery/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#gallery">
                        <span class="nav-header-primary">Gallery <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="gallery">
                      <li><a href="<?php echo e(url('/admin/gallery')); ?>">Gallery List</a></li>
                      <li><a href="<?php echo e(url('/admin/gallery/create')); ?>">Create Gallery</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/testimonial' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/testimonial/create' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#reviews">
                        <span class="nav-header-primary">Testimonial <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="reviews">
                      <li><a href="<?php echo e(url('/admin/testimonial')); ?>">Testimonial List</a></li>
                      <li><a href="<?php echo e(url('/admin/testimonial/create')); ?>">Create Testimonial</a></li>
                    </ul>
                  </li>

                  <li class="<?php echo e(Request::path() == 'admin/email' ? 'active' : ''); ?>"><a href="<?php echo e(url('/admin/email')); ?>">Email List</a></li>


                  <li class="<?php echo e(Request::path() == 'admin/address/edit' ? 'active' : ''); ?> <?php echo e(Request::path() == 'admin/about/edit' ? 'active' : ''); ?>">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#settings">
                        <span class="nav-header-primary">Settings <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="settings">
                      

                      <li class="<?php echo e(Request::path() == 'admin/address/edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/address/edit')); ?>">Contact Details</a>
                      </li>

                      <li class="<?php echo e(Request::path() == 'admin/about/edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/about/edit')); ?>">About Details</a>
                      </li>

                    </ul>
                  </li>

              </ul>
            </nav><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/inc/sidebar.blade.php ENDPATH**/ ?>