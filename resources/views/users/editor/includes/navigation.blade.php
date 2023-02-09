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
      <router-link class="navigation-link" to="/editor/dashboard">
        <i class="ico-theme"></i>
        <span><i style="font-size:95%">my</i><span style="margin-left:-8px">SCOPE</span></span>
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
