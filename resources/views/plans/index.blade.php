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
      <h1>Plans</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <ul class="list-group">
          @foreach($plans as $plan)
          <li class="list-group-item clearfix">
              <div class="pull-left">
                  <h5>{{ $plan->name }}</h5>
                  <h5>${{ number_format($plan->cost, 2) }} monthly</h5>
                  <h5>{{ $plan->description }}</h5>
                  <a href="{{ url('plans/'. $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
              </div>
          </li>
          @endforeach
      </ul>
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection
