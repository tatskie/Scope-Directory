@extends('layouts.app')

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>This page isn't available. SESSION EXPIRED (419)</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content subpage-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      The page is expired. Please log in again.
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
@endsection
