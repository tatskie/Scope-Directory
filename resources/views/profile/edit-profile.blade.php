@extends('layouts.app')

@section('pages')
    @foreach($pages as $page)
        @if(count($page->Subpages) >= 1)
            <li class="navigation-item">
                <a class="navigation-link" href="{{ route('register') }}">
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
        <li class="navigation-item">
            <a class="navigation-link" href="{{ url('/pages/'. $page->slug) }}">{{ $page->title }}</a>
        </li>
        @endif
    @endforeach
@endsection


@section('content')
  <div class="subpage">
    <div class="subpage-title">
      <div class="subpage-title-inner">
        <h1>Edit Profile</h1>
      </div>
    </div>

    <div class="l-container">

      <div class="form-wrap">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('update.profile') }}">
          {{ method_field('PUT') }}
          @csrf

          <div class="form-inner">
            <div class="form-con">
              <h2 class="form-title">Account Details</h2>

              <div class="form-input">
                <label class="form-lbl" for="username">
                  <span>{{ __('Username') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" value="{{$user->username}}">
                </div>

                @error('username')
                  <span class="form-error">
                    {{ $message }}
                  </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="email">
                  <span>{{ __('E-Mail Address') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{$user->email}}">
                </div>

                @error('email')
                  <span class="form-error">
                    {{ $message }}
                  </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="password">
                  <span>{{ __('Password') }}</span><span class="form-required"></span>
                </label>

                <div class="form-input-box" style="display: none;">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="" disabled="true">
                </div>

                @error('password')
                  <span class="form-error">
                    {{ $message }}
                  </span>
                @enderror

                <span class="form-note"><a href="#">Change Password</a></span>
              </div>
            </div>

            <div class="form-con">
              <h2 class="form-title">Profile Details</h2>

              <div class="form-input">
                <label class="form-lbl" for="name">
                  <span>{{ __('Name') }}</span><span class="form-required"></span>
                </label>

                <div class="form-input-box">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{$user->name}}">
                </div>

                @error('name')
                  <span class="form-error">
                    {{ $message }}
                  </span>
                @enderror

                <span class="form-note">This field can be seen by: Everyone</span>
              </div>

            </div>
          </div>

          <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
            <span class="btn-text">
              <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
              {{ __('Update') }}
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
