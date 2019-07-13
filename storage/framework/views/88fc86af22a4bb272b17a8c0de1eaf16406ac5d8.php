<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SQUARE College of Nursing</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/all.min.css')); ?>">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/jquery.fancybox.min.css')); ?>">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owl.theme.default.min.css')); ?>">
    <!-- Fullcalendar CSS -->
    <link rel='stylesheet' type="text/css" href="<?php echo e(asset('assets/css/fullcalendar.min.css')); ?>">

    <!-- Google Font CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <!-- Fullcalendar JS -->
    <!-- <script type="text/javascript" src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/fullcalendar.min.js')); ?>"></script> -->
    <link href="<?php echo e(asset('assets/plugins/core/main.css')); ?>" rel='stylesheet' />

    <link rel='stylesheet' href="<?php echo e(asset('assets/unitegallery/css/unite-gallery.css')); ?>">
    <link rel='stylesheet' href="<?php echo e(asset('assets/unitegallery/themes/default/ug-theme-default.css')); ?>">

    <link href="<?php echo e(asset('assets/plugins/daygrid/main.css')); ?>" rel='stylesheet' />


    <script src="<?php echo e(asset('assets/plugins/core/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/interaction/main.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/unitegallery/js/unitegallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/unitegallery/themes/default/ug-theme-default.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/plugins/daygrid/main.js')); ?>"></script>


    <style type="text/css">
      .fc-fri { color:red; }
      .fc-sat { color:orange;  }
    </style>


    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
  </head>
  <body>
    
    <!-- <div id="pre_loader_overlay">
        <img src="/assets/img/spinner.svg" class="overlay-img" alt="Loading..." /><br/>
    </div> -->

    <section id="header-navbar">
      <!--== Top Navbar Area Start ==-->
      <!-- <section class="navbar-main-top">
         <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-6">
              <ul class="top-social-icon">
                <li><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-linkedin-in"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-pinterest-p"></i></span></a></li>
              </ul>
            </div>
            <div class="col-sm-8 col-md-6 d-none d-sm-block">
              <ul class="top-contact-icon">
                <li><span><i class="fas fa-phone-volume"></i></span> 017********</li>
                <li><span><i class="fas fa-envelope"></i></span> companyname@gmail.com</li>
              </ul>
            </div>
          </div>
         </div>
      </section> -->
      <!--== Top Navbar Area End ==-->

      <div class="header_nav_bg">
      <!--== Main Navbar Area Start ==-->
      <section class="navbar-main-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <nav class="navbar navbar-expand-lg navbar-light">

                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('/assets/img/logo.png')); ?>" alt="Logo"></a>
                <div class="brand-title"><span>SQUARE</span> College of Nursing</div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                    <li class="nav-item <?php echo e(Request::path() == '/' ? 'active' : ''); ?>">
                      <a class="nav-link" href="<?php echo e(url('/')); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'about' ? 'active' : ''); ?>">
                      <a class="nav-link" href="<?php echo e(url('/about')); ?>">About Us</a>
                    </li>
                    <li class="nav-item dropdown <?php echo e(Request::path() == 'notice' ? 'active' : ''); ?> <?php echo e(Request::path() == 'event' ? 'active' : ''); ?>">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Academic
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(url('/admission')); ?>">Admission</a>
                        <a class="dropdown-item" href="<?php echo e(url('/calendar')); ?>">Calendar</a>
                      </div>
                    </li>
                    <!-- <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Academic</a>
                    </li> -->
                    <!-- <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Course</a>
                    </li> -->
                    <!-- <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Career</a>
                    </li> -->
                    <li class="nav-item <?php echo e(Request::path() == 'contact' ? 'active' : ''); ?>">
                      <a class="nav-link" href="<?php echo e(url('/contact')); ?>">Contact</a>
                    </li>


                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>


                  </ul>
                </div>

                <a class="navbar-brand d-none d-sm-block" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('/assets/img/LOGO-SQUARE-Group.jpeg')); ?>" alt="Logo"></a>
                
              </nav>

            </div>
          </div>
        </div>
      </section>
      <!--== Main Navbar Area End ==-->
      </div>
    </section>



    <!-- Content Area -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- Content Area -->



        <!--== Main Footer Area Start ==-->
    <section class="section" id="footer-top">
      <div class="container">
        <div class="row">
          <!--== Single Footer Area ==-->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="single-footer-box">
              <a href="index.html"><img class="logo" src="<?php echo e(asset('/assets/img/logo.png')); ?>" alt="Logo"></a>
              <h5 class="single-footer-subtitle">Square College of Nursing</h5>

              <ul class="footer-address">
                <li>
                  <div class="address-icon"><div><i class="fas fa-home"></i></div></div>
                  <div class="address-details">91/N, Road No. 7/A (new) Dhanmondi R/A, Dhaka-1209</div>
                </li>
                <li>
                  <div class="address-icon"><div><i class="fas fa-phone-volume"></i></div></div>
                  <div class="address-details">017********</div>
                </li>
                <li>
                  <div class="address-icon"><div><i class="fas fa-envelope-open"></i></div></div>
                  <div class="address-details">companyname@gmail.com</div>
                </li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="single-footer-box">
              <h4 class="single-footer-title">Key Features</h4>

              <ul class="footer-links">
                <li><a href="<?php echo e(url('/about')); ?>">About Us</a></li>
                <li><a href="<?php echo e(url('/admission')); ?>">Admission</a></li>
                <li><a href="<?php echo e(url('/calendar')); ?>">Calendar</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="single-footer-box">
              <!-- <h4 class="single-footer-title">Social Media</h4>

              <ul class="social-links">
                <li><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-linkedin-in"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-pinterest-p"></i></span></a></li>
              </ul> -->

              <div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/squarenursingcollege" data-width="200" data-height="240" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;container_width=200&amp;header=false&amp;height=240&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsquarenursingcollege&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false&amp;width=200"><span style="vertical-align: bottom; width: 200px; height: 196px;"><iframe name="f47987c840d618" title="fb:like_box Facebook Social Plugin" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" style="border: medium none; visibility: visible; width: 200px; height: 196px;" src="https://www.facebook.com/v2.0/plugins/like_box.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3e674e716fa07a%26domain%3Dwww.squarenursingcollege.com%26origin%3Dhttp%253A%252F%252Fwww.squarenursingcollege.com%252Ff2661b9d700d5a2%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=200&amp;header=false&amp;height=240&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsquarenursingcollege&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false&amp;width=200" class="" width="200px" height="240px" frameborder="0"></iframe></span></div>

            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="single-footer-box">
              <!-- <div class="footer-google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.3752700752816!2d90.39059531452385!3d23.733993684597433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8e90a449e4f%3A0xb7092a9c25197fa4!2z4Kai4Ka-4KaV4Ka-IOCmrOCmv-CmtuCnjeCmrOCmrOCmv-CmpuCnjeCmr-CmvuCmsuCnnw!5e0!3m2!1sbn!2sbd!4v1546320246510" width="100%" height="" frameborder="0" style="border:0"></iframe>
              </div> -->

              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LKZnfJZGiNM?rel=0" allowfullscreen></iframe>
              </div>

            </div>
          </div>
          <!--== Single Footer Area ==-->
        </div>
      </div>

      <!--== Footer Copywrite Area Start ==-->
      <div class="container" id="footer-bottom">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <ul class="footer-menu">
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Policy</a></li>
          </ul>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="copywrite">
              &copy; 2019 all copyright reserved.
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="poweredby">
              Developed by <a href="http://www.biziitech.com/" target="_blank">Biziitech</a>
            </div>
          </div>
        </div>
      </div>
      <!--== Footer Copywrite Area End ==-->
    </section>
    <!--== Main Footer Area End ==-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- Font Awesome JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/all.min.js')); ?>"></script>
    <!-- Fancybox JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.fancybox.min.js')); ?>"></script>
    <!-- Owl Carousel JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <!-- Counter up JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/waypoints.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <!-- Ckeditor JS -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


    <script>
        CKEDITOR.replace( 'content' );
    </script>

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <!-- <script type="text/javascript" src="<?php echo e(asset('assets/js/calendar.js')); ?>"></script> -->

    <script type="text/javascript">

      jQuery(document).ready(function(){

        jQuery("#gallery").unitegallery();

      });
      
    </script>
  

    <!-- Defoult Preloader -->
    <script>
      jQuery(document).ready(function(){
        $("#pre_loader_overlay").fadeOut();
      });
    </script>


  </body>
</html><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/layouts/master.blade.php ENDPATH**/ ?>