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
<main class="l-main">
    <div class="subpage">

      <div class="subpage-title">
        <div class="subpage-title-inner">
          <h1>{{ $plan->name }}</h1>
        </div>
      </div>


      <div class="subpage-inner">

        <div class="subpage-content">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif


          @if(auth()->user()->subscribed('main', $plan->stripe_plan))
            Account subscribed!
          @else
            <a href="{{ url('plans', $plan->slug) }}">Subscribed now!</a>
          @endif
        </div>

        <div class="subpage-sidebar">

          </div>
      </div>
    </div>
</main>
@endsection
