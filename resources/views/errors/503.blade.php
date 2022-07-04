@extends('layouts.app')

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>This page isn't available. SERVICE UNAVAILABLE (503)</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content subpage-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      The request failed due to a connection error.
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection
