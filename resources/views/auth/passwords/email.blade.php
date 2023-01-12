@extends('layouts.app')

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>{{ __('Reset Password') }}</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
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
      <form class="form-prevent-multiple-submits" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-inner">
          <div class="form-con">
            <div class="form-input">
            
              
              <div class="form-input-box">
                <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="E-Mail Address">
              </div>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
          <span class="btn-text">
            <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
            {{ __('Send Password Reset Link') }}
          </span>
        </button>
      </form>

    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>


@endsection
