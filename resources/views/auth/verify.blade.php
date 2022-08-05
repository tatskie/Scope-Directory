@extends('layouts.app')

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>{{ __('Verify Your Email Address') }}</h1>
    </div>
  </div>


  <div class="subpage-inner">
    <div class="l-container">
      @if (session('resent'))
          <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
      @endif
      <form id="form" action="{{ route('verification.resend') }}" method="POST">@csrf</form>
      {{ __('Before proceeding, please check your email for a verification link.') }}
      {{ __('If you did not receive the email') }}, <a href="javascript:void(0)" onclick="$('#form').submit()">{{ __('click here to request another') }}</a>.

      <!-- {{ __('Before proceeding, please check your email for a verification link.') }}
      {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>. -->
    </div>
  </div>
</div>
@endsection
