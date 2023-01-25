<div class="navigation">

  @guest
    <div class="navigation-item">
      <a class="navigation-link" href="{{ route('login') }}">
        <span>{{ __('Login') }}</span>
      </a>
    </div>

    @if (Route::has('register'))
    <div class="navigation-item">
      <a class="navigation-link" href="{{ route('login') }}">
        <span>{{ __('Register') }}</span>
      </a>
    </div>
    @endif
  @else
    <div class="navigation-item">
      <router-link class="navigation-link" to="/teacher/dashboard">
        <i class="ico-theme"></i>
        <span><i style="font-size:95%">my</i><span style="margin-left:-8px">SCOPE</span></span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/teacher/profile">
        <i class="fa fa-user" style="font-size:18px;color:#4b596a"></i>
        <span>Public Profile</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/teacher/level">
        <i class="fa fa-user-plus" style="font-size:18px;color:#4b596a"></i>
        <span>Upgrade Level</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/teacher/billing">
        <i class="fa fa-book" style="font-size:18px;color:#4b596a"></i>
        <span>Billing</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="#" href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ico-logout"></i>
        <span>Logout</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </router-link>
    </div>
  @endguest
</div>
