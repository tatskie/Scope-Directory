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
            <p>{{ $category->class }}</p>
            <p>{{ $category->criteria_notes }}</p>
            <br>
          @endforeach
      <br>
      <br>
      <h3>PIF Professional Impact Status</h3> 
      <br>
          @foreach($aifs as $aif)
            <p>{{ $aif->number }}. {{ $aif->title }}</p>
          @endforeach
      <br>
      There are {{ $total }} questions relating to your Designation and 6 questions relating to PIF status. They have
      been assembled by industry experts with over a century of combined experience in the profession.
      Please answer all of the questions in order to calculate your Professional Academic Registered Standing
      level. You cannot proceed from one question to the next if you do not answer. Once you complete the
      application you can see your level.
      <br>
      <br>
      <h5>There are two sets of questions.</h5>
      <br>
      The first set relates to your qualifications, experience and & publishing record. The second set relates to
      any volunteer/community work you have done.
      <br>
      <br>
      <h5>After competing all questions, you will see your two scores:-</h5>
      <br>
      <br>
      1.) Professional Academic Level
      <br>
      2.) Your (Professional Impact Factor – PIF) for Volunteer / community services
      <br>
      <br>
      Note:-. Data security is of primary importance. Whilst we have taken all steps to protect your data on
      our Servers, we ask that you do not provide any information that is not already on the internet. Thus
      some questions below are optional - (such as country of citizenship)
      <br>
      <br>
      The questions lead to two options:-
      <br>
      <br>
      <strong>Free option :-</strong> Your Academic Professional Summary online (secured) with print out of your input.
      <br>
      <strong>Paid option :-</strong>  beautiful wallet size hard copy card (see samples) that will be produced and delivered to
      you. The QR card on your card reverts to your Academic Professional Summary.
      <br>
      <br>
      a) Your hard copy card will contain your name, your photo, and your TESOL Professional Standing.
      <br>
      <br>
      i) See sample licences. <a href="#">click here</a>
      <br>
      <br>
      ii) The system will produce a (resumé) page based on your data input which can be accessed by only you
      either by scanning the QR code on your Card or by signing in. This information can be updated as you
      upgrade your information.
      <br>
      <br>
      iii) NB. Before you answer the questions: -
      <br>
      <br>
        <p>&nbsp;&nbsp;&nbsp;1. This may take up to 30 - 45 minutes to complete.</p>
        <p>&nbsp;&nbsp;&nbsp;2. If you cannot complete the questions you will have to re-login another time.</p>
        <p>&nbsp;&nbsp;&nbsp;3. You do not need to provide documentary evidence unless subsequently (email request) required to confirm an answer.</p>
        <p>&nbsp;&nbsp;&nbsp;4. Some questions will ask you about your Conference attendance history and publication history, so it is a good idea to have your records 
        &nbsp;&nbsp;&nbsp;on hand prior to starting the questions.</p>
        <p>&nbsp;&nbsp;&nbsp;5. You should also have access to your photo in your computer which will be uploaded.</p>
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

