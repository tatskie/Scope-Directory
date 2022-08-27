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
              <h4><b>Name: {{ ucwords($user->name) }}</b></h4> 
              <h4><b>SCOPE Number: {{ $user->id }}-{{ $user->created_at->format('Y')}}-{{ $user->created_at->format('m') }}-0001</b></h4> 
              <h4><b>PIF: L{{ $user->card->academiaCategory->number }} - {{ $user->card->academiaCategory->specialist_title }}</b></h4> 
              <h4><b>Education: BS Electronics & Communications Engineering</b></h4> 
              <h4><b>Country: {{ ucwords($user->card->citizenship) }}</b></h4> 
            
              <br>
              @foreach($tif as $key => $factor)
                
                @if($key == 17)
                  <h4><b>University/Institution Activities</b></h4> 
                  <!-- <p>* {{ $factor->question->question }}</p>  -->
                @elseif($key == 18)
                  <h4><b>Academic Memberships</b></h4> 
                  <!-- <p>* {{ $factor->question->question }}</p>  -->
                @elseif($key == 21)
                  <h4><b>Community Memberships</b></h4> 
                  <!-- <p>* {{ $factor->question->question }}</p>  -->
                @endif
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
