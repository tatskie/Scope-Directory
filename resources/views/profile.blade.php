@extends('layouts.app')

@section('content')
<main class="l-main">
    <div class="subpage">

      <div class="subpage-title">
        <div class="subpage-title-inner">
          <h1>SCOPE Profile</h1>
        </div>
      </div>
      <div class="subpage-inner">
        <div class="subpage-content">
          <div class="subpage-content subpage-body">
          </div>

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <div class="card">
            <img src="{{ url('/public/assets/images/user/'. $user->card->photo)}}" alt="Avatar" class="profile" height="300" width="300">
            <div class="container">
              <h4><b>{{ $user->card->title }} {{ ucwords($user->name) }}</b></h4> 
              <h4><small>TLP-209315-{{$user->id}}</small></h4> 
              <h4><small>L{{ $user->card->academiaCategory->number }} - {{ $user->card->academiaCategory->specialist_title }}</small></h4> 
              <p>
                  
                    Bachelor Degree
                  
                </p> 
                <p>Gender: {{ $user->card->gender }}</p> 
                <p>Citizenship: {{ ucwords($user->card->citizenship) }}</p> 
                <p>Email: {{ $user->email }}</p> 
              <br>
              <p><a href="{{ url('edit-profile') }}">Verified</a> | <a href="{{ url('user/pdfexport')}}">USER</a></p> 
              <br>
              @foreach($tif as $factor)
                <p>* {{ $factor->question->question }}</p> 
              @endforeach
            </div>
          </div>
        </div>

        <div class="subpage-sidebar">

          </div>
      </div>
    </div>
</main>
@endsection

@section('scripts')
  <Script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></Script>
  <script>
    $(document).ready(function() {
        $('#journals').select2({
          placeholder : "Select journals",
        });
    });
  </script>
@endsection
