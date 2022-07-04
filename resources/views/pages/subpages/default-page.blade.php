@extends('layouts.app')

@section('pages')
    @foreach($pages as $pageNav)
         @if(count($pageNav->Subpages) >= 1)
            <li class="navigation-item">
                <a class="navigation-link" href="{{ route('register') }}">
                  <span>{{ $pageNav->title }}</span>
                </a>

                <ul class="navigation-sub">
                    @foreach($pageNav->Subpages as $subPage)
                      <li class="navigation-sub-item">
                        <a href="{{ url('/pages/'.$pageNav->slug .'/subpages/'. $subPage->slug) }}" class="navigation-sub-link">
                          <span>{{ $subPage->title }}</span>
                        </a>
                      </li>
                    @endforeach
                </ul>
            </li>
        @else
        <li class="navigation-item {{ Request::url() == url('/pages/'. $pageNav->slug ) ? 'is-active' : '' }}">
            <a class="navigation-link" href="{{ url('/pages/'. $pageNav->slug) }}">{{ $pageNav->title }}</a>
        </li>
        @endif
    @endforeach
@endsection

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>{{ $subpage->title }}</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content subpage-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      {!! $subpage->body !!}
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection
