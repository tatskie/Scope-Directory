<header class="l-header">
  <div class="header" id="header">
    <div class="logo">
      <a href="{{ url('https://www.tesol-licence.education') }}">
        <img src="../public/assets/images/common/scope-logo-color.png" alt="">
      </a>
    </div>

    <div class="header-menu">
      <div class="navigation-wrap" id="js-navigation">
        <div class="navigation">
          <ul class="navigation-inner">
        @guest
        @else
          <div class="btn btn-logout ">
            <a class="btn-link " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <div class="navigation-item"><span class="navigation-link">Logout</span></div><i class="ico-logout"></i>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </a>
          </div>
        @endguest
      </div>

      <div class="hamburger-wrap" id="js-hamburger">
        <div class="hamburger"></div>
      </div>
    </div>
  </div>
</header>
