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
        <h1>Add Email</h1>
      </div>
    </div>

    <div class="l-container">

      <div class="form-wrap">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('update.email') }}">
          {{ method_field('PUT') }}
          @csrf

          <div class="form-inner">
            <div class="form-con">

              <div class="form-input">
                <label class="form-lbl" for="email">
                  <span>{{ __('E-Mail Address') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="">
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
              {{ __('Save') }}
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
