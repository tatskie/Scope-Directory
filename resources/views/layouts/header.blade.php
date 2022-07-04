<header class="l-header">
  <div class="header" id="header">
    <div class="logo">
      <a href="{{ url('https://www.tesol-licence.education') }}">
        <img src="../assets/images/common/tle-logo2.png" alt="">
      </a>
    </div>

    <div class="header-menu">
      <div class="navigation-wrap" id="js-navigation">
        <div class="navigation">
          <ul class="navigation-inner">
          
            <li class="navigation-item {{ Request::url() == url('/home') ? 'is-active' : '' }}">
              <a href="{{ url('https://www.tesol-licence.education/') }}" class="navigation-link">
                <span>Home</span>
              </a>
            </li>
          
            <li class="navigation-item {{ Request::url() == url('/home') ? 'is-active' : '' }}">
              <a href="{{ url('https://my.tesol-licence.education/') }}" class="navigation-link">
                <span><i style="font-size:95%; text-transform:lowercase">my</i><span style="margin-left:2px;">TESOL</span></span>
              </a>
            </li>

            @yield('pages')
          </ul>

          <div class="navigation-auth">
            @guest
              <div class="btn-auth" >
                <a class="btn-link " href="{{ route('login') }}">
                  <span>{{ __('Login') }}</span>
                </a>
              </div>
              @if (Route::has('register'))
                <div class="btn-auth">
                  <a class="btn-link" href="{{ route('register') }}">
                    <span>{{ __('Register') }}</span>
                  </a>
                </div>
              @endif
            @else

            @endguest
          </div>
        </div>
      </div>

   		<div class="header-btn">
         <div class="btn btn-cart">
          <i class="ico-cart"></i>
          <span>0</span>
        </div>

<!--      <div class="btn btn-search">
          <i class="ico-search"></i>
        </div>
-->
        @guest
<!--        <div class="btn btn-profile ">
            <a class="btn-link " href="{{ route('login') }}">
              <i style="font-size:20px" class="ico-user-o"></i>
            </a>
       </div>
-->      
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

      <div class="header-auth">
        @guest
          <div class="btn-auth" >
            <a class="btn-link " href="{{ route('login') }}">
              <span>{{ __('Login') }}</span>
            </a>
          </div>
          @if (Route::has('register'))
            <div class="btn-auth">
              <a class="btn-link" href="{{ route('register') }}">
                <span>{{ __('Register') }}</span>
              </a>
            </div>
          @endif
        @else

        @endguest
      </div>

      <div class="hamburger-wrap" id="js-hamburger">
        <div class="hamburger"></div>
      </div>
    </div>


  </div>
</header>
