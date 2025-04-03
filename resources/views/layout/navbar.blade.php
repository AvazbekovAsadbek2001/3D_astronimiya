<!--==================================================-->
    <!----- Start Techno Main Menu Area ----->
    <!--==================================================-->
    <div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
        <div class="container">
          <div class="row align-items-center">
            <div class="menu">
                <a href="{{ route('index') }}" class="logo" style="padding: 20px 0 0;">
                    <h4><b>Astranomiya</b></h4>
                </a>
              <ul class="clearfix">
                  <li>
                      <a href="#">Asosiy sahifa</a>
                  </li>
                  <li>
                      <a href="#">Yangiliklar</a>
                  </li>
                  <li>
                      <a href="#">O'quv materiallar</a>
                  </li>
                  <li>
                      <a href="#">Bo'limlar</a>
                  </li>
                  <li>
                      <a href="#">Bog'lanish</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-solid fa-user"></i>&nbsp;&nbsp; {{ Auth::guard('student')->user()->first_name }} {{ Auth::guard('student')->user()->last_name }}</a>
                    <ul>
                      <li><a data-bs-toggle="modal" data-bs-target="#setting" style="cursor: pointer"><i class="fa-solid fa-cog"></i>&nbsp;&nbsp;Sozlamalar</a></li>
                      <li><a href="contact-3.html"><i class="fa-solid fa-sign-out-alt"></i>&nbsp;&nbsp;Chiqish</a></li>
                    </ul>
                  </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Malumotlarini o'zgartirish</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <label class="form-label"  style="color: black"><b>Familiya :</b> </label>
                <input type="text" name="" class="form-control" value="{{ Auth::guard('student')->user()->last_name }}">
                <label class="form-label"  style="color: black"><b> Ismi : </b></label>
                <input type="text" name="" class="form-control" value="{{ Auth::guard('student')->user()->first_name }}">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiqish</button>
            <button type="button" class="btn btn-primary">Saqlash</button>
            </div>
        </div>
        </div>
    </div>

      <!-- Techno Mobile Menu Area -->
      <div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
        <div class="mobile-menu">
          <nav class="techno_menu">
              <ul class="clearfix">
                  <li>
                      <a href="#">Asosiy sahifa</a>
                  </li>
                  <li>
                      <a href="#">Yangiliklar</a>
                  </li>
                  <li>
                      <a href="#">O'quv materiallar</a>
                  </li>
                  <li>
                      <a href="#">Testlar va topshiriqlar</a>
                  </li>
                  <li>
                      <a href="#">Bo'limlar</a>
                  </li>
                  <li>
                      <a href="#">Bog'lanish</a>
                  </li>
                  <li>
                    <a href="#">Home</a>
                    <ul>
                      <li>
                        <ul>
                          <li><a href="index.html">Home One</a></li>
                          <li><a href="index-2.html">Home Two</a></li>
                          <li><a href="index-3.html">Home Three</a></li>
                          <li><a href="index-4.html">Home Four</a></li>
                          <li><a href="index-5.html">Home Five</a></li>
                          <li><a href="index-6.html">Home Six</a></li>
                          <li><a href="index-7.html">Home Seven</a></li>
                          <li><a href="index-8.html">Home Eight</a></li>
                          <li><a href="software.html">Software Light & Dark</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li><a href="index-9.html">Home Nine</a></li>
                          <li><a href="index-10.html">Home Ten</a></li>
                          <li><a href="index-11.html">Home Eleven New</a></li>
                          <li><a href="index-12.html">Home Twelve New</a></li>
                          <li><a href="index-13.html">Home Thirteen New</a></li>
                          <li><a href="data-science.html">Data Science New</a></li>
                          <li>
                            <a href="machine-learning.html">Machine Learning New</a>
                          </li>
                          <li>
                            <a href="affiliate-intelligent.html"
                              >Affiliate Intelligent New</a
                            >
                          </li>
                          <li>
                            <a href="digital-agency.html"
                              >Digital Agency Light & Dark</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li>
                            <a href="odoo-erp.html">Odoo ERP <span>New</span></a>
                          </li>
                          <li>
                            <a href="index-15.html"
                              >Home It Solution <span>New</span></a
                            >
                          </li>
                          <li>
                            <a href="index-16.html">Home Seo <span>New</span></a>
                          </li>
                          <li>
                            <a href="index-17.html"
                              >Home Insurance <span>New</span></a
                            >
                          </li>
                          <li>
                            <a href="index-18.html"
                              >Home Startup <span>New</span></a
                            >
                          </li>
                          <li>
                            <a href="revulation-slider.html"
                              >Revulation Slider One</a
                            >
                          </li>
                          <li>
                            <a href="revulation-slider-2.html"
                              >Revulation Slider Two</a
                            >
                          </li>
                          <li><a href="home-dark.html">Dark Version New</a></li>
                          <li><a href="index-rtl.html">RTL Version 01</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li><a href="index-14.html">Home Animation New</a></li>
                          <li>
                            <a href="particle-02.html"
                              >Home Particle <span>New</span></a
                            >
                          </li>
                          <li>
                            <a href="digital-seo.html"
                              >Home Seo 02 <span>New</span></a
                            >
                          </li>
                          <li><a href="landing-1.html">Landing 01</a></li>
                          <li><a href="landing-2.html">Landing 02</a></li>
                          <li>
                            <a href="landing-3.html">Landing 03 <span>New</span></a>
                          </li>
                          <li>
                            <a href="landing-4.html">Landing 04 <span>New</span></a>
                          </li>
                          <li>
                            <a href="landing-5.html">Landing 05 <span>New</span></a>
                          </li>
                          <li>
                            <a href="index-rtl2.html"
                              >RTL Version 02 <span>New</span></a
                            >
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
              </ul>
          </nav>
        </div>
      </div>
      <!--==================================================-->
      <!----- End Techno Main Menu Area ----->
      <!--==================================================-->
