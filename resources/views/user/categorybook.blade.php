<!DOCTYPE html>
<html lang="en-US">
  
<!-- Mirrored from html.ditsolution.net/techno/business-solution.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:21:28 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Categories books</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('layout.css');
  </head>
  <body>
    <!-- Loder Start-->
    <div class="loader-wrapper">
      <div class="loader"></div>
      <div class="loder-section left-section"></div>
      <div class="loder-section right-section"></div>
    </div>
    <!-- Loder End -->


    <!--==================================================-->
    <!----- Start Techno Main Menu Area ----->
    <!--==================================================-->
    @include('layout.navbar')
    <!--==================================================-->
    <!----- End Techno Main Menu Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Service Area ----->
    <!--==================================================-->
    <div class="service_area bg_color2 pt-40 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section_title text_center mb-50 mt-3">
              <div class="section_main_title">
                <h1>Astronomiya darsliklari</h1>
              </div>
              <div class="em_bar">
                <div class="em_bar_bg"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($categories as $item)
            <div class="col-lg-12 col-md-6 col-sm-12">
              <div class="service_style_four pt-30 pl-4 pr-3 mb-4 pb-20">
                <a href="{{ route('books', ["category_id" => $item->id]) }}">
                  <div class="service_style_four_title pb-2">
                    <b><h4 align="center">{{$item->name}}</h4></b>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Service Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Footer Middle Area ----->
    <!--==================================================-->
    @include('layout.footer')
    <!--==================================================-->
    <!----- End Techno Footer Middle Area ----->
    <!--==================================================-->

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

<!-- Mirrored from html.ditsolution.net/techno/business-solution.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:21:28 GMT -->
</html>
