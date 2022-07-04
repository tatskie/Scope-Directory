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
      <h1>Subscription</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <form action="/subscribed" method="POST">
        @csrf

        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_YGrfa4lhSBO4BJcpv3nJ4va0"
          data-name="Tesol Liscence"
          data-description="Subscription for 1 month box"
          data-email="{{ auth()->check()?auth()->user()->email: null}}"
          data-amount="1200"
          data-label="Sign Me Up!">
        </script>
      </form>
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection
