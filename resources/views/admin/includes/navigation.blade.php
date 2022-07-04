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
      <router-link class="navigation-link" to="/admin/dashboard">
        <i class="ico-theme"></i>
        <span>Dashboard</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/users">
        <i class="fa fa-users" style="font-size:18px;color:#4b596a"></i>
        <span>Users</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/license-categories">
        <i class="fa fa-list-alt" style="font-size:18px;color:#4b596a"></i>
        <span>Categories</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/teacher-impact-factor">
		<i class="fa fa-user-circle-o" style='font-size:18px;color:#4b596a'></i>
        <span>TIF</span>
      </router-link>
    </div>
    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/pages">
        <i class="ico-pages"></i>
        <span>Pages</span>
      </router-link>
    </div>

    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/products">
        <i class="ico-product"></i>
        <span>Products</span>
      </router-link>
    </div>

    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/questions">
        <i class="ico-questionnaire"></i>
        <span>Questions</span>
      </router-link>
    </div>
    
        <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <div class="navigation-item">
      <router-link class="navigation-link" to="/admin/logout">
        <i class="ico-logout"></i>
        <span>Logout</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </router-link>
      
    </div>
    </a>

  @endguest
</div>
