@extends('layouts.app')

@section('pages')
    @foreach($pages as $page)
        @if(count($page->Subpages) >= 1)
            <li class="navigation-item">
                <a class="navigation-link" href="https://scope.directory/#getstarted">
                  <span>{{ $page->title }}</span>
                </a>

                <ul class="navigation-sub">
                    @foreach($page->Subpages as $subPage)
                      <li class="navigation-sub-item">
                        <a href="{{ url('/pages/'.$page->slug .'/subpages/'. $subPage->slug) }}" class="navigation-sub-link">
                          <span>{{ $subPage->title }}</span>
                        </a>
                      </li>
                    @endforeach
                </ul>
            </li>
        @else
        <li class="navigation-item {{ Request::url() == url('/pages/'. $page->slug ) ? 'is-active' : '' }}">
            <a class="navigation-link" href="{{ url('/pages/'. $page->slug) }}">{{ $page->title }}</a>
        </li>
        @endif
    @endforeach
@endsection

@section('content')

  <div class="subpage">
    <!--     <div class="subpage-title">
      <div class="subpage-title-inner">
        <h1>Create an Account</h1>
      </div>
    </div> -->

    <div class="l-container">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      @if (session('warning'))
        <div class="alert alert-warning">
          {{ session('warning') }}
        </div>
      @endif
      @if (session('message'))
        <div class="alert alert-warning">
          {{ session('message') }}
        </div>
      @endif
      <div class="form-wrap form-login">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('login') }}">

          @csrf

          <div class="form-inner">

            <div class="form-con">
              <div class="form-input">
                <div class="form-input-box">
                  <input id="text" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus placeholder="Username or Email">
                </div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-input">
                <div class="form-input-box">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-input">
                <label class="form-lbl" for="name">
                  <span>{{ __('Captcha') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>

                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
              </div>
              
              <button type="submit" class="btn btn-gradient btn-login button-prevent-multiple-submits">
                <span class="btn-text">
                  <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
                  <!-- {{ __('Register') }} -->
                  {{ __('Sign In') }}
                </span>
              </button>

              <div class="form-extra">
                <div class="form-check">
                  <input class="form-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">{{ __('Remember Me') }}</label>
                </div>
                <a class="form-extra-link form-extra-link-register" href="https://scope.directory/#getstarted">
                  <i class="ico-edit"></i>
                  <span>{{ __('Register?') }}</span>
                </a>

                @if (Route::has('password.request'))
                  <a class="form-extra-link" href="{{ route('password.request') }}">
                    <i class="ico-lost-pass"></i>
                    <span>{{ __('Lost Password?') }}</span>
                  </a>
                @endif
              </div>
            </div>

            <div class="form-con">

              <h2 class="form-title">Sign In With: </h2>

              <div class="btn btn-login btn-login-linkedin">
                <a href="{{ route('login.linkedin') }}" class="btn-link">
                  <i class="fa fa-linkedin" style="font-size: 16px;font-weight: normal;"></i>
                  <span>{{ __('Sign in with Linkedin') }}</span>
                </a>
              </div>
              
              <div class="btn btn-login btn-login-fb">
                <a href="{{ route('login.facebook') }}" class="btn-link">
                  <i class="ico-fb"></i>
                  <span>{{ __('Sign in with Facebook') }}</span>
                </a>
              </div>

              <div class="btn btn-login btn-login-google">
                <a href="{{ route('login.google') }}" class="btn-link">
                  <i class="ico-google"></i>
                  <span>{{ __('Sign in with Google') }}</span>
                </a>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

@endsection
