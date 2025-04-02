<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from html.ditsolution.net/techno/service-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:21:28 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Bo'limlar</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @include('layout.css')
  </head>
  <body>
    <!-- Loder Start-->
    <div class="loader-wrapper">
      <div class="loader"></div>
      <div class="loder-section left-section"></div>
      <div class="loder-section right-section"></div>
    </div>
    <!-- Loder End -->

    @include('layout.navbar');
    <!--==================================================-->
    <!----- Start Techno Service Area ----->
    <!--==================================================-->
    <div class="service_area pt-80 pb-70">
      <div class="container">
        <div class="row">
          <!-- Start Section Tile -->
          <div class="col-lg-12">
            <div class="section_title text_center mb-55">
              <div class="section_main_title">
                <h1>Bo'limni tanlang</h1>
              </div>
              <div class="em_bar">
                <div class="em_bar_bg"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="service_style_eleven wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
              <a href="{{ route('subjects') }}">
                <div class="single_service_style_eleven">
                <div class="service_style_eleven_icon">
                  <div class="icon">
                    <i class="flaticon-data"></i>
                  </div>
                </div>
                <div class="service_style_eleven_title pb-4">
                  <h4>Darslar ro'yhati</h4>
                </div>
                </div>
               </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="service_style_eleven wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
              <a href="{{ route('tests') }}">
                <div class="single_service_style_eleven">
                    <div class="service_style_eleven_icon">
                    <div class="icon">
                        <i class="flaticon-system"></i>
                    </div>
                    </div>
                    <div class="service_style_eleven_title pb-4">
                    <h4>Testlar ro'yhati</h4>
                    </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Service Area ----->
    <!--==================================================-->

    @include('layout.footer')

    <!-- jquery js -->
    <script
      type="text/javascript"
      src="assets/js/vendor/jquery-3.2.1.min.js"
    ></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- carousel js -->
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <!-- counterup js -->
    <script
      type="text/javascript"
      src="assets/js/jquery.counterup.min.js"
    ></script>
    <!-- waypoints js -->
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <!-- wow js -->
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <!-- imagesloaded js -->
    <script
      type="text/javascript"
      src="assets/js/imagesloaded.pkgd.min.js"
    ></script>
    <!-- venobox js -->
    <script type="text/javascript" src="venobox/venobox.js"></script>
    <!-- ajax mail js -->
    <script type="text/javascript" src="assets/js/ajax-mail.js"></script>
    <!--  testimonial js -->
    <script type="text/javascript" src="assets/js/testimonial.js"></script>
    <!--  animated-text js -->
    <script type="text/javascript" src="assets/js/animated-text.js"></script>
    <!-- venobox min js -->
    <script type="text/javascript" src="venobox/venobox.min.js"></script>
    <!-- isotope js -->
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <!-- jquery nivo slider pack js -->
    <script
      type="text/javascript"
      src="assets/js/jquery.nivo.slider.pack.js"
    ></script>
    <!-- jquery meanmenu js -->
    <script type="text/javascript" src="assets/js/jquery.meanmenu.js"></script>
    <!-- jquery scrollup js -->
    <script type="text/javascript" src="assets/js/jquery.scrollUp.js"></script>
    <!-- theme js -->
    <script type="text/javascript" src="assets/js/theme.js"></script>
    <!-- jquery js -->
  </body>

<!-- Mirrored from html.ditsolution.net/techno/service-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:21:28 GMT -->
</html>
