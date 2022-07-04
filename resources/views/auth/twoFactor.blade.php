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
      <h1>Two Factor Verification</h1>
      <p class="text-muted">
          You have received an email which contains two factor login code.
          If you haven't received it, press <a href="{{ route('verify.resend') }}">here</a>.
      </p>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
      @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
      @endif
      <form class="form-prevent-multiple-submits" method="POST" action="{{ route('verify.store') }}">
        @csrf
        <div class="form-inner">
          <div class="form-con">
            <div class="form-input">
            
              
              <div class="form-input-box">
                <input name="two_factor_code" type="text" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code">
              </div>

              @if ($errors->has('two_factor_code'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('two_factor_code') }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
          <span class="btn-text">
            <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
            <!-- {{ __('Register') }} -->
            {{ __('Verify') }}
          </span>
        </button>
      </form>

    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection