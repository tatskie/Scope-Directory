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
      <h1>Welcome {{ ucwords(auth()->user()->name )}}</h1>
    </div>
  </div>


  <div class="subpage-inner">

    <div class="subpage-content">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      There are {{ $total }} questions. They have been assembled by TESOL experts with over a century of combined experience in TESOL profession.
      <br>
      <br>
      Please answer all of the questions in order to calculate your Professional TESOL Registered Licence level. You cannot proceed from one question to the next if you do not answer. Once you complete the application you can see your TESOL level.
      <br>
      <br>
      There are two sets of questions. The first set relates to your experience and qualifications. The second set relates to any volunteer work you have done.
      <br>
      <br>
      After competing all questions you will see your two scores:-
      <br>
      <br>
      TESOL level – ranging from 1 -10
      Your Volunteer service level based on Bronze-Silver-Gold-Platinum (Teacher Impact factor – TIF) 
      <br>
      <br>
      Nb. Data security is of primary importance. Whilst we have taken all steps to protect your data on our Servers, we ask that you do not provide any information that is not already on the internet. Thus some questions below are optional - (such as country of citizenship, date of birth.)
      <br>
      <br>
      There are two items that the questions lead to two options:-
      <br>
      <br>
      <strong>Free option :-</strong> TESOL CV on line (secured) with print out of your licence
      <br>
      <strong>Paid option :-</strong> A beautiful License wallet size hard copy (see samples) that will be produced and delivered to you. The QR card on your license reverts to your CV.
      <br>
      <br>
      a) Your hard copy licence will contain your name, your photo, and your TESOL Licence designation.
      <br>
      <br>
      1) See sample licences.
      <br>
      <br>
      2) The system will produce a CV (Resume) page based on your data input which can be accessed by only you either by scanning the QR code on your licence or by entering your unique code you will receive. This information can be updated as you upgrade your skills. 
      <br>
      <br>

      <div class="btn btn-gradient-link btn-mv" style="height: 50%">
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('proceed.question') }}">

        @csrf
        {{ method_field('PUT') }}
        <input type="checkbox" id="is_agree" name="is_agree" value="1">
        <label for="is_agree">The answers I have given are true to the best of my knowledge in the TESOL English language teaching profession.</label>
        @if ($errors->has('is_agree'))
            <br>
            <span class="help-block">
                <strong style="color: red;">This field is required!</strong>
            </span>
        @endif
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
@endsection