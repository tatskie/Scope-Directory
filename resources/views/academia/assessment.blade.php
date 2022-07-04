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
        <li class="navigation-item {{ Request::url() == url('/pages/'. $page->slug ) ? 'is-active' : '' }}">
            <a class="navigation-link" href="{{ url('/pages/'. $page->slug) }}">{{ $page->title }}</a>
        </li>
        @endif
    @endforeach
@endsection

@section('content')
<div class="subpage">
  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>Congratulations {{ ucwords(auth()->user()->name) }}!</h1>
    </div>
  </div>


  <div class="subpage-inner">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    <div class="l-container">
      <div class="form-wrap">
        <p><strong>Classifications</strong></p>
        <br>
        <table width="100%">
          <tbody>
            <tr>
              <td></td>
              <td colspan="3" width="545"></td>
            </tr>
            <tr>
              <td width="96">Level</td>
              <td width="96">Name</td>
              <td width="313">Description</td>
              <td width="136">Title</td>
            </tr>
            <tr>
              <td width="96"></td>
              <td width="96"></td>
              <td width="313"></td>
              <td width="136"></td>
            </tr>

              <tr>
                <td width="96">Level 1</td>
                <td width="96">The Esteemed Dr.</td>
                <td width="313">Language Teaching Specialist / Language Research Specialist</td>
                <td width="136">TESOL Ambassador Elite</td>
              </tr>

              <tr>
                <td width="96">Level 2</td>
                <td width="96">The Honorable Dr.</td>
                <td width="313">Language Generalist</td>
                <td width="136">TESOL Ambassador</td>
              </tr>

              <tr>
                <td width="96">Level 3</td>
                <td width="96">The Respected Mr./Ms./Miss</td>
                <td width="313">Language Teacher / Language Researcher</td>
                <td width="136">TESOL Teacher</td>
              </tr>

          </tbody>
        </table>  
      </div>
      <br>
      <div class="form-wrap">
          <div class="form-inner">
            <div class="form-con">
              <h1>You are assessed at Category, <strong style="color: red;"></strong></h1>
            </div>
          </div>
          <br>

          @if(auth()->user()->answerScore->is_done_tif == true)
            <form class="proceed-form-prevent-multiple-submits" method="POST" action="{{ route('academia.proceed')}}" enctype="multipart/form-data">
            @csrf
              <input type="hidden" name="proceed_answer" value="1">
              <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
                <span class="btn-text">
                  <i class="proceed-spinner fa fa-spinner fa-spin" style="display: none;"></i>
                  {{ __('PROCEED') }}
                </span>
              </button>
            </form>
            <br>
          @endif

          @if(auth()->user()->answerScore->is_done_tif == false)
          <form class="pif-form-prevent-multiple-submits" method="POST" action="{{ route('aif.proceed')}}" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="proceed_pif" value="1">
            <p>The next set of questions relate to any  volunteer / community work you have undertaken" - Academia Impact Factor Questions</p>
            <br>
            <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
              <span class="btn-text">
                <i class="pif-spinner fa fa-spinner fa-spin" style="display: none;"></i>
                {{ __('Take AIF Questions') }}
              </span>
            </button>
          </form>
          <br>
          @else
          @endif
      </div>
    </div>
  </div>
</div>
@endsection
