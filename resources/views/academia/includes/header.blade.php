<header class="masterhead">
  <div class="header">
    <div class="header-dashboard">
      <a class="header-dashboard-text" href="{{ url('/academia/dashboard') }}">
        <span>Dashboard</span>
      </a>

    </div>
    
  <div id="profile-header-wrap">
    <div class="header-profile">
      <div class="profile-user">
        <a class="profile-user-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <em>Welcome</em>, {{ Auth::user()->name }} <span class="caret"></span>
        </a>
      </div>
    </div>  

   

      <!-- <a class="btn-logout icon" href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ico-logout"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form> -->
    </div>
     <div class="header-profile">
      <div class="profile-user">
        <a class="profile-user-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="fa fa-light fa-bell"></span>
             <!-- <em style="color: red;">1</em> -->
        </a>
      </div>
    </div>  
  </div>
</header>
