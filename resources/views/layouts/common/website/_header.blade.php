<!-- Start Nav-Bar -->
<div class="main-navbar">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('website.home')}}"><img src="{{ asset('assets/frontend/img/main/logo.png') }}" alt="" srcset=""></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">الإذاعة</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">النشرات البريدية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">موضوع</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('website.about')}}">عن الشركة</a>
              </li>
              <li class="nav-item dropdown show mr-auto  ">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">اخرالبثوث</a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                  <a class="dropdown-item" href="#">اقتصاد</a>
                  <a class="dropdown-item" href="#">سياسة</a>
                  <a class="dropdown-item" href="#">علوم</a>
                </div>
              </li>
            </ul>
          </div>
          <form class="input-box" method="get" action="">
              <input type="text" placeholder="بحث..." />
              <span class="search">
                  <i class="fa fa-search" aria-hidden="true"></i>
              </span>
              <span class="close-icon">
                  <i class="uil uil-times  fa fa-times-circle" aria-hidden="true"></i>
              </span>
          </form>
      </div>
  </nav>
</div>
<!-- End Nav-Bar -->