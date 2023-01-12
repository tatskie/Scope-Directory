@extends('layouts.app')

@section('content')
<div class="subpage">

  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>Welcome to Your Professional Academic Designation.</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      At the end of the survey you will have attained one of the 4 designations depending upon the input you
      provide as well as your PIF Professional Impact Factor based on what community works, volunteer
      services, etc., you have under taken.
      <br>
      <br>
      <h3>Designation Levels</h3> 
      <br>
          @foreach($categories as $category)
            <h5>Level {{ $category->number }}</h5>
            <h5>{{ $category->specialist_title }}</h5>
            <p>{{ $category->criteria_notes }}</p>
            <br>
          @endforeach
      <h3>PIF Professional Impact Status</h3> 
      <p>PIF reflects the volunteer and community work you have undertaken.</p>
      <br>
          @foreach($aifs as $aif)
            <p>{{ $aif->number }}. {{ $aif->title }}</p>
          @endforeach
      <br>
      <br>
      Please answer all of the questions in order to calculate your Professional level. You cannot proceed from one question to the next if you do not answer. Once you complete the application you can see your career professional level. 
      <br>
      <br>
      <h5>There are two sets of questions. Set one has {{ $total }} questions set two has {{ $totalPif }} questions.</h5>
      <br>
      The first set relates to your experience and qualifications. The second set relates to volunteer work you have done.
      <br>
      <br>
      <h5>After completing all questions, you will see your two scores:</h5>
      <br>
      1.) Professional level 
      <br>
      2.) Professional Impact Factor – PIF
      <br>
      <br>
      Nb. Data security is of primary importance. Whilst we have taken all steps to protect your data on our Servers, we ask that you do not provide any information that is not already on the internet. Thus, some questions below are optional - (such as country of citizenship) 
      <br>
      <br>
      Your answers will lead to three options, namely.
      <br>
      <br>
      <p><strong>Free option:</strong> Print out your ID card or</p>
      <p><strong>Free option:</strong> Your personal online Profile - public or private as you chose</p>
      <p><strong>Paid option:</strong> A beautiful wallet-size hard copy ID that will be produced and delivered to you. The QR card on your ID reverts to your Online CV.</p>
      <br>
      1) See sample ID.  <a href="https://www.scope.directory/" target="_blank">click here</a>
      <br>
      <br>
      2) The system will produce a Profile Page based on your data input which can be accessed by only you either by scanning the QR code on your ID or by entering your unique code you will receive. This information can be updated as you upgrade your skills.
      <br>
      <br>
        <p>&nbsp;&nbsp;&nbsp;1. This may take up to 15 - 20 minutes to complete.</p>
        <p>&nbsp;&nbsp;&nbsp;2. If you cannot complete the questions you will have to re-login another time.</p>
        <p>&nbsp;&nbsp;&nbsp;3. You do not need to provide documentary evidence unless subsequently (email request) required to confirm an answer.</p>
        <p>&nbsp;&nbsp;&nbsp;4. Some questions will ask you about your Conference attendance history and publication history, so it is a good idea to have your records 
        &nbsp;&nbsp;&nbsp;on hand prior to starting the questions.</p>
        <p>&nbsp;&nbsp;&nbsp;5. You should also have access to your photo in your computer which will be uploaded. A passport size photo is best</p>
      <br>
      <br>
      <div class="btn btn-gradient-link btn-mv" style="height: 50%;">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('update.score') }}">

        @csrf
        {{ method_field('PUT') }}

        <input type="checkbox" id="is_agree" name="is_agree" value="1">
        <label for="is_agree">The answers I shall give shall be true to the best of my knowledge.</label>
        @if ($errors->has('is_agree'))
            <br>
            <span class="help-block">
                <strong style="color: red;">This field is required!</strong>
            </span>
        @endif
        <br>
        <br>
        <button class="btn-link" type="submit">
          <span><i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>Proceed</span>
        </button>

        </form>
      </div>
    </div>

    <div class="subpage-sidebar">

      </div>
  </div>
</div>
<br>
@endsection

