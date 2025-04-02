<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from html.ditsolution.net/techno/service-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:21:28 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mavzulari</title>
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

    @include('layout.navbar')

    <!--==================================================-->
    <!----- Start Techno Service Area ----->
    <!--==================================================-->
    <div class="service_area bg_color2 pt-80 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section_title text_left mb-55">
              <div class="section_main_title">
                <h1>Barcha darslar <span> ro'yxati </span></h1>
              </div>
              <div class="em_bar">
                <div class="em_bar_bg"></div>
              </div>
              <div class="section_content_text pr-70 pt-4">
                <p>
                    Astronomiya fanlari orqali koinot sirlarini o'rganing. Yulduzlar, sayyoralar va galaktikalar haqidagi bilimlarni chuqurlashtirish uchun ushbu darslar sizga yo'l ochadi.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
          </div>
        <div class="row">
          <div class="col-lg-12 col-sm-6">
            @if ($subjects && !$subjects->isEmpty())
                @foreach ($subjects as $item)
                    <div class="single_service">
                        <a href="{{ route('subject', ['id' => $item->id]) }}">
                            <div class="single_service_inner">
                                <div class="single_service_icon" style="margin-right: 50px">
                                    <i style="font-weight: 900">{{ $loop->iteration }}</i>
                                </div>
                                <div class="single_service_content">
                                    <h4>{{ $item->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <h1 align='center'>Mavzular mavjud emas!</h1>
            @endif
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
