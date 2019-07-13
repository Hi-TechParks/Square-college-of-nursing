            <nav id="column_left">  
              <ul class="nav nav-list">
                  <li><h4>Dashboard</h4></li> 

                  <li class="{{ Request::path() == 'admin/message' ? 'active' : '' }} {{ Request::path() == 'admin/message/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#message">
                        <span class="nav-header-primary">Message <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="message">
                      <li><a href="{{ url('/admin/message') }}">Message List</a></li>
                      <li><a href="{{ url('/admin/message/create') }}">Create Message</a></li>
                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#programs">
                        <span class="nav-header-primary">Programs <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="programs">
                      

                      <li class="{{ Request::path() == 'admin/program' ? 'active' : '' }} {{ Request::path() == 'admin/program/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#program">
                            <span class="nav-header-primary">Program <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="program">
                          <li><a href="{{ url('/admin/program') }}">Program List</a></li>
                          <li><a href="{{ url('/admin/program/create') }}">Create Program</a></li>
                        </ul>
                      </li>

                      <li class="{{ Request::path() == 'admin/procate' ? 'active' : '' }} {{ Request::path() == 'admin/procate/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#procate">
                            <span class="nav-header-primary">Program Category <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="procate">
                          <li><a href="{{ url('/admin/procate') }}">Category List</a></li>
                          <li><a href="{{ url('/admin/procate/create') }}">Create Category</a></li>
                        </ul>
                      </li>

                      <li class="{{ Request::path() == 'admin/session' ? 'active' : '' }} {{ Request::path() == 'admin/session/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#session">
                            <span class="nav-header-primary">Session <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="session">
                          <li><a href="{{ url('/admin/session') }}">Session List</a></li>
                          <li><a href="{{ url('/admin/session/create') }}">Create Session</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#admission">
                        <span class="nav-header-primary">Admission <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="admission">

                      <li class="{{ Request::path() == 'admin/application' ? 'active' : '' }} {{ Request::path() == 'admin/application/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#application_form">
                            <span class="nav-header-primary">Application <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="application_form">
                          <li><a href="{{ url('/admin/application') }}">Application List</a></li>
                          <li><a href="{{ url('/admin/application/create') }}">Create Application</a></li>
                        </ul>
                      </li>

                      <li class="{{ Request::path() == 'admin/declaration' ? 'active' : '' }} {{ Request::path() == 'admin/declaration/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#form_declartion">
                            <span class="nav-header-primary">Declaration <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="form_declartion">
                          <li><a href="{{ url('/admin/declaration') }}">Declaration List</a></li>
                          <li><a href="{{ url('/admin/declaration/create') }}">Create Declaration</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>


                  <li class="">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#fac_staff">
                        <span class="nav-header-primary">Faculty And Staff <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="fac_staff">


                      <li class="{{ Request::path() == 'admin/member' ? 'active' : '' }} {{ Request::path() == 'admin/member/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#member">
                            <span class="nav-header-primary">Member <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="member">
                          <li><a href="{{ url('/admin/member') }}">Member List</a></li>
                          <li><a href="{{ url('/admin/member/create') }}">Create Member</a></li>
                        </ul>
                      </li>

                      <li class="{{ Request::path() == 'admin/designation' ? 'active' : '' }} {{ Request::path() == 'admin/designation/create' ? 'active' : '' }}">
                        <a class="accordion-heading" data-toggle="collapse" data-target="#designation">
                            <span class="nav-header-primary">Designation <span class="pull-right"><b class="caret"></b></span></span>
                        </a>
                        <ul class="nav nav-list collapse" id="designation">
                          <li><a href="{{ url('/admin/designation') }}">Designation List</a></li>
                          <li><a href="{{ url('/admin/designation/create') }}">Create Designation</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/course' ? 'active' : '' }} {{ Request::path() == 'admin/course/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#course">
                        <span class="nav-header-primary">Course <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="course">
                      <li><a href="{{ url('/admin/course') }}">Course List</a></li>
                      <li><a href="{{ url('/admin/course/create') }}">Create Course</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/procourse' ? 'active' : '' }} {{ Request::path() == 'admin/procourse/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#procourse">
                        <span class="nav-header-primary">Program Course <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="procourse">
                      <li><a href="{{ url('/admin/procourse') }}">Program Course List</a></li>
                      <li><a href="{{ url('/admin/procourse/create') }}">Create Program Course</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/country' ? 'active' : '' }} {{ Request::path() == 'admin/country/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#country">
                        <span class="nav-header-primary">Country <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="country">
                      <li><a href="{{ url('/admin/country') }}">Country List</a></li>
                      <li><a href="{{ url('/admin/country/create') }}">Create Country</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/student' ? 'active' : '' }} {{ Request::path() == 'admin/student/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#student">
                        <span class="nav-header-primary">Student <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="student">
                      <li><a href="{{ url('/admin/student') }}">Student List</a></li>
                      <li><a href="{{ url('/admin/student/create') }}">Create Student</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/result' ? 'active' : '' }} {{ Request::path() == 'admin/result/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#result">
                        <span class="nav-header-primary">Result <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="result">
                      <li><a href="{{ url('/admin/result') }}">Result List</a></li>
                      <li><a href="{{ url('/admin/result/create') }}">Create Result</a></li>
                    </ul>
                  </li>
                  
                  <li class="{{ Request::path() == 'admin/slide' ? 'active' : '' }} {{ Request::path() == 'admin/slide/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#slider">
                        <span class="nav-header-primary">Slider <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="slider">
                      <li><a href="{{ url('/admin/slide') }}">Slide List</a></li>
                      <li><a href="{{ url('/admin/slide/create') }}">Create Slide</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/blogcate' ? 'active' : '' }} {{ Request::path() == 'admin/blogcate/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#notice">
                        <span class="nav-header-primary">Notice <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="notice">
                      <li><a href="{{ url('/admin/notice') }}">Notice List</a></li>
                      <li><a href="{{ url('/admin/notice/create') }}">Create Notice</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/blogcate' ? 'active' : '' }} {{ Request::path() == 'admin/blogcate/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#event">
                        <span class="nav-header-primary">Event <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="event">
                      <li><a href="{{ url('/admin/event') }}">Event List</a></li>
                      <li><a href="{{ url('/admin/event/create') }}">Create Event</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/event/type' ? 'active' : '' }} {{ Request::path() == 'admin/event/type/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#event_type">
                        <span class="nav-header-primary">Event Type <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="event_type">
                      <li><a href="{{ url('/admin/event/type') }}">Event Type List</a></li>
                      <li><a href="{{ url('/admin/event/type/create') }}">Create Event Type</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/calendar' ? 'active' : '' }} {{ Request::path() == 'admin/calendar/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#calendar">
                        <span class="nav-header-primary">Event Calendar <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="calendar">
                      <li><a href="{{ url('/admin/calendar') }}">Calendar List</a></li>
                      <li><a href="{{ url('/admin/calendar/create') }}">Create Calendar</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/gallery' ? 'active' : '' }} {{ Request::path() == 'admin/gallery/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#gallery">
                        <span class="nav-header-primary">Gallery <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="gallery">
                      <li><a href="{{ url('/admin/gallery') }}">Gallery List</a></li>
                      <li><a href="{{ url('/admin/gallery/create') }}">Create Gallery</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/testimonial' ? 'active' : '' }} {{ Request::path() == 'admin/testimonial/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#reviews">
                        <span class="nav-header-primary">Testimonial <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="reviews">
                      <li><a href="{{ url('/admin/testimonial') }}">Testimonial List</a></li>
                      <li><a href="{{ url('/admin/testimonial/create') }}">Create Testimonial</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/email' ? 'active' : '' }}"><a href="{{ url('/admin/email') }}">Email List</a></li>


                  <li class="{{ Request::path() == 'admin/address/edit' ? 'active' : '' }} {{ Request::path() == 'admin/about/edit' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#settings">
                        <span class="nav-header-primary">Settings <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="settings">
                      

                      <li class="{{ Request::path() == 'admin/address/edit' ? 'active' : '' }}">
                        <a href="{{ url('/admin/address/edit') }}">Contact Details</a>
                      </li>

                      <li class="{{ Request::path() == 'admin/about/edit' ? 'active' : '' }}">
                        <a href="{{ url('/admin/about/edit') }}">About Details</a>
                      </li>

                    </ul>
                  </li>

              </ul>
            </nav>