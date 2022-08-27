@extends('layouts.app')


@section('content')
  <div class="subpage">
    <div class="subpage-title">
      <div class="subpage-title-inner">
        <h1>Create an Account</h1>
      </div>
    </div>

    <div class="l-container">

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      
      <p class="subpage-text">Registering for this site is easy. Just fill in the fields below, and we'll get a new account set up for you in no time.</p>

      <div class="form-wrap">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-inner">
            <div class="form-con">
              <h2 class="form-title">Account Details</h2>

              <div class="form-input">
                <label class="form-lbl" for="username">
                  <span>{{ __('Username') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                </div>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-input">
                <label class="form-lbl" for="email">
                  <span>{{ __('E-Mail Address') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-input">
                <label class="form-lbl" for="password">
                  <span>{{ __('Password') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <span class="form-note" style="color: #39c8df;">Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.</span>
              </div>

              <div class="form-input">
                <label class="form-lbl" for="password-confirm">
                  <span>{{ __('Confirm Password') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

            </div>

            <div class="form-con">
              <h2 class="form-title">Profile Details</h2>

              <div class="form-input">
                <label class="form-lbl" for="name">
                  <span style="color: #EE6446;">{{ __('Name') }}</span><span class="form-required" style="color: #EE6446;"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <span class="form-note" style="color: #39c8df;">This name will appear on your license card.</span>
              </div>

              <!-- <div class="form-input">
                <label class="form-lbl" for="account_type">
                  <span>{{ __('Register as') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <select id="account_type" name="account_type">
                      <option value="teacher">Teacher</option>
                      <option value="undergrad">Undergraduate</option>
                      <option value="academia">Academia</option>
                  </select>
                  </div>

                @if ($errors->has('account_type'))
                    <span class="help-block">
                        <strong style="color: #EE6446;">{{ $errors->first('account_type') }}</strong>
                    </span>
                @endif
              </div> -->

            </div>
          </div>

          <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
            <span class="btn-text">
              <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
              <!-- {{ __('Register') }} -->
              {{ __('Complete Sign up') }}
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
