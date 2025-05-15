<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from html.ditsolution.net/techno/index-15.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Sep 2024 08:20:32 GMT -->
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Asranomiya</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- bootstrap CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/bootstrap.min.css"
        type="text/css"
        media="all"
    />
    <!-- carousel CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/owl.carousel.min.css"
        type="text/css"
        media="all"
    />
    <!-- nivo-slider CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/nivo-slider.css"
        type="text/css"
        media="all"
    />
    <!-- animate CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/animate.css"
        type="text/css"
        media="all"
    />
    <!-- animated-text CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/animated-text.css"
        type="text/css"
        media="all"
    />
    <!-- font-awesome CSS -->
    <link
        type="text/css"
        rel="stylesheet"
        href="../../assets/fonts/font-awesome/css/font-awesome.min.css"
    />
    <!-- font-flaticon CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/flaticon.css"
        type="text/css"
        media="all"
    />
    <!-- theme-default CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/theme-default.css"
        type="text/css"
        media="all"
    />
    <!-- meanmenu CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/meanmenu.min.css"
        type="text/css"
        media="all"
    />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../../style.css" type="text/css" media="all"/>
    <!-- transitions CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/owl.transitions.css"
        type="text/css"
        media="all"
    />
    <!-- venobox CSS -->
    <link
        rel="stylesheet"
        href="venobox/venobox.css"
        type="text/css"
        media="all"
    />
    <!-- widget CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/widget.css"
        type="text/css"
        media="all"
    />
    <!-- responsive CSS -->
    <link
        rel="stylesheet"
        href="../../assets/css/responsive.css"
        type="text/css"
        media="all"
    />
    <!-- modernizr js -->
    <script src="../../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link
        rel="stylesheet"
        href="../../cdn.jsdelivr.net/npm/bootstrap-icons%401.11.3/font/bootstrap-icons.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
 <div id="web">
   
        <!-- Loder Start-->
        <div class="loader-wrapper">
            <div class="loader"></div>
            <div class="loder-section left-section"></div>
            <div class="loder-section right-section"></div>
        </div>
        <!-- Loder End -->
        
        <!--==================================================-->
        <!-- Start Techno Main Menu Area -->
        <!--==================================================-->
        @include('layout.navbar') 
        <!-- Techno Mobile Menu Area -->
        <div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
            <div class="mobile-menu">
                <nav class="techno_menu">
                    <ul class="clearfix">
                        <li>
                            <a href="{{ route('index') }}">Asosiy sahifa</a>
                        </li>
                        <li>
                            <a href="{{ route('reja') }}">Ilmiy ishlar ro'yhati</a>
                        </li>
                        <li>
                            <a href="{{ route('index')."#about" }}">Sayt haqida</a>
                        </li>
                        <li>
                            <a href="{{ route('sections') }}">Bo'limlar</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <!--==================================================-->
        <!----- End Techno Main Menu Area ----->
        <!--==================================================-->
    
        <div class="service-area pt-100 pb-160">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="section_title text_center mb-60 mt-3 wow fadeInRight animated" data-wow-delay=".3" style="visibility: visible; animation-name: fadeInRight;">
                
                <div class="section_main_title upper pb-15">
                    <h1>Darsliklar <span> ro'yhati </span></h1>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
                @foreach ($books as $item)
                    <div class="col-md-4 col-lg-4">
                        <div class="em-service-single-box wow fadeInLeft animated" data-wow-delay=".4" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="em-service-box-inner">
                            <div class="em-service-content">
                            <div class="em-service-icon">
                                <div class="em-icon">
                                <img src="assets/images/servic1.png" alt="">
                                </div>
                                <div class="em-icon-title">
                                <h4>Kitob pdf</h4>
                                </div>
                            </div>
                            <div class="em-service-title">
                                <h2>{{ $item->name }}</h2>
                            </div>
                            <div class="em-service-text">
                                <p>
                                {{ $item->description }}
                                </p>
                            </div>
                            <div class="em-service-button">
                                <a href="{{ asset('storage/'.$item->file) }}">Yuklash <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        
        <!--==================================================-->
        <!----- Start Techno Footer Middle Area ----->
        <!--==================================================-->
        <div class="footer-middle style-four pt-160">
            <div class="container">
                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="widget widgets-company-info">
                    <div class="footer-bottom-logo pb-40">
                        <a href="{{ route('index') }}" class="logo">
                            <h4 style="color: white"><b>Astranomiya</b></h4>
                        </a>
                    </div>
                    <div class="company-info-desc">
                      <p>
                        Bizning sayt astronomiya fanini o‘rganishni istagan har bir kishi uchun yaratilgan. Yulduzlar, sayyoralar va koinot sirlarini kashf eting!
                      </p>
                    </div>
                    <div class="follow-company-info pt-3">
                      <div class="follow-company-text mr-3">
                        <a href="#"><p>Bizni kuzating</p></a>
                      </div>
                      <div class="follow-company-icon">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-skype"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="widget widget-nav-menu">
                    <h4 class="widget-title pb-4">Xizmatlarimiz</h4>
                    <div class="menu-quick-link-container ml-4">
                      <ul id="menu-quick-link" class="menu">
                        <li><a href="#">Astronomiya kurslari</a></li>
                        <li><a href="#">Teleskop bo‘yicha maslahatlar</a></li>
                        <li><a href="#">Koinot haqida maqolalar</a></li>
                        <li><a href="#">Yulduz xaritalari</a></li>
                        <li><a href="#">Sayyoralar bo‘yicha tadqiqotlar</a></li>
                        <li><a href="#">Astrofotografiya</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="widget widgets-company-info">
                    <h3 class="widget-title pb-4">Manzilimiz</h3>
                    <div class="company-info-desc">
                      <p>
                        Astronomiya olamiga sayohat qilishni biz bilan boshlang. Bilim va kashfiyot sizni kutmoqda!
                      </p>
                    </div>
                    <div class="footer-social-info">
                      <p>
                        <span>Manzil:</span> Toshkent sh., Chilanzor tumani, 45-uy
                      </p>
                    </div>
                    <div class="footer-social-info">
                      <p><span>Telefon:</span>+998 71 123 45 67</p>
                    </div>
                    <div class="footer-social-info">
                      <p><span>Email:</span>info@astronomiya.uz</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div id="em-recent-post-widget">
                    <div class="single-widget-item">
                      <h4 class="widget-title pb-3">So‘nggi yangiliklar</h4>
                      <div class="recent-post-item active pb-3">
                        <div class="recent-post-image mr-3">
                          <a href="#">
                            <img
                              width="80"
                              height="80"
                              src="https://cdn.culture.ru/images/bd107292-f378-5ea6-843b-c7b008c1dd1e"
                              alt="Yulduzlar"
                            />
                          </a>
                        </div>
                        <div class="recent-post-text">
                          <h6>
                            <a href="#"> Yangi yulduz turkumi topildi </a>
                          </h6>
                          <span class="rcomment">2023-yil 12-dekabr</span>
                        </div>
                      </div>
                      <div class="recent-post-item pt-1">
                        <div class="recent-post-image mr-3">
                          <a href="#">
                            <img
                              width="80"
                              height="80"
                              src="https://moscow-astroclub.ru/wp-content/uploads/2021/09/astronomia.jpeg"
                              alt="Koinot"
                            />
                          </a>
                        </div>
                        <div class="recent-post-text">
                          <h6><a href="#"> Koinotdagi yangi kashfiyotlar </a></h6>
                          <span class="rcomment">2023-yil 15-dekabr</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row footer-bottom mt-70 pt-3 pb-1">
                <div class="col-lg-6 col-md-6">
                  <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                      <p>© 2023 Astronomiya. Barcha huquqlar himoyalangan.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="footer-bottom-right">
                    <div class="footer-bottom-right-text">
                      <a class="absod" href="#">Maxfiylik siyosati </a>
                      <a href="#"> Foydalanish shartlari</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!--==================================================-->
        <!----- End Techno Footer Middle Area ----->
        <!--==================================================-->
        
        <!-- jquery js -->
        <script src="../../assets/js/vendor/jquery-3.2.1.min.js"></script>
        <!-- bootstrap js -->
        <script src="../../assets/js/bootstrap.min.js"></script>
        <!-- carousel js -->
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <!-- counterup js -->
        <script src="../../assets/js/jquery.counterup.min.js"></script>
        <!-- waypoints js -->
        <script src="../../assets/js/waypoints.min.js"></script>
        <!-- wow js -->
        <script src="../../assets/js/wow.js"></script>
        <!-- imagesloaded js -->
        <script src="../../assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- venobox js -->
        <script src="venobox/venobox.js"></script>
        <!-- ajax mail js -->
        <script src="../../assets/js/ajax-mail.js"></script>
        <!--  testimonial js -->
        <script src="../../assets/js/testimonial.js"></script>
        <!--  animated-text js -->
        <script src="../../assets/js/animated-text.js"></script>
        <!-- venobox min js -->
        <script src="venobox/venobox.min.js"></script>
        <!-- isotope js -->
        <script src="../../assets/js/isotope.pkgd.min.js"></script>
        <!-- jquery nivo slider pack js -->
        <script src="../../assets/js/jquery.nivo.slider.pack.js"></script>
        <!-- jquery meanmenu js -->
        <script src="../../assets/js/jquery.meanmenu.js"></script>
        <!-- jquery scrollup js -->
        <script src="../../assets/js/jquery.scrollUp.js"></script>
        <!-- theme js -->
        <script src="../../assets/js/theme.js"></script>
        <!-- jquery js -->
        <!-- theme js -->
        <script src="../../assets/js/jquery.barfiller.js"></script>
</div>  


</body>
</html>
