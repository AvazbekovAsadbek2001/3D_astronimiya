
    <div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
        <div class="container">
          <div class="row align-items-center">
            <div class="menu">
                <a href="{{ route('index') }}" class="logo" style="padding: 20px 0 0;">
                    <h4><b>Astranomiya</b></h4>
                </a>
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
                  <li>
                    <a href="#"><i class="fa-solid fa-user"></i>&nbsp;&nbsp; {{ Auth::guard('student')->user()->last_name }} {{ Auth::guard('student')->user()->first_name }}</a>
                    <ul>
                      <li><a data-bs-toggle="modal" data-bs-target="#setting" style="cursor: pointer"><i class="fa-solid fa-cog"></i>&nbsp;&nbsp;Sozlamalar</a></li>
                      <li><a href="{{ route('logout') }}"><i class="fa-solid fa-sign-out-alt"></i>&nbsp;&nbsp;Chiqish</a></li>
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
            <form action="{{ route('setting') }}" method="post">
              @csrf
              <div class="modal-body">
                  <label class="form-label"  style="color: black"><b>Familiya :</b> </label>
                  <input type="text" name="last_name" class="form-control" value="{{ Auth::guard('student')->user()->last_name }}">
                  <label class="form-label"  style="color: black"><b> Ismi : </b></label>
                  <input type="text" name="first_name" class="form-control" value="{{ Auth::guard('student')->user()->first_name }}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiqish</button>
                <button type="submit" class="btn btn-primary">Saqlash</button>
              </div>
            </form>
        </div>
        </div>
    </div>

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
              <li>
                <a href="#"><i class="fa-solid fa-user"></i>&nbsp;&nbsp; {{ Auth::guard('student')->user()->last_name }} {{ Auth::guard('student')->user()->first_name }}</a>
                <ul>
                  <li><a data-bs-toggle="modal" data-bs-target="#setting" style="cursor: pointer"><i class="fa-solid fa-cog"></i>&nbsp;&nbsp;Sozlamalar</a></li>
                  <li><a href="{{ route('logout') }}"><i class="fa-solid fa-sign-out-alt"></i>&nbsp;&nbsp;Chiqish</a></li>
                </ul>
              </li>  
          </ul>
          </nav>
        </div>
      </div>
