@extends('layouts.app')
@section('styles')
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .container {
    margin-top: 5px;
    padding: 2px 16px;
    text-align: center;
  }
  .profile {
    width:100%;
  }
</style>
@endsection

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
          <h1>Dashboard</h1>
        </div>
      </div>


      <div class="subpage-inner">

        <div class="subpage-content">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
              <img src="{{ url('images/cards/photo/'. $card->photo)}}" alt="Avatar" class="profile">
              <div class="container">
                <h4><b>{{ $card->title }} {{ auth()->user()->name }}</b></h4> 
                <h4><small>TLP-2093{{ $card->id }}</small></h4> 
                <p>
                  @if($card->is_graduated == true)
                    Bachelor Degree
                  @endif
                </p> 
                <p>Gender: {{ $card->gender }}</p> 
                <p>Citizenship: {{ ucwords($card->citizenship) }}</p> 
                <p>Email: {{ auth()->user()->email }}</p> 
                <br>
                <p><a href="{{ url('edit-profile') }}">Edit Profile</a> | <a href="{{ url('user/pdfexport')}}">Download PDF</a></p> 
                <br>
              </div>
            </div>


            
        </div>

        <div class="subpage-sidebar">

          </div>
      </div>
    </div>
</main>
@endsection
