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
              <td width="72">#</td>
              <td width="313">TESOL Teacher/Staff&nbsp; Specialist Title</td>
              <td width="96"></td>
              <td width="136"></td>
            </tr>
            <tr>
              <td width="72"></td>
              <td width="313"></td>
              <td width="96"></td>
              <td width="136"></td>
            </tr>
            @foreach($categories as $category)
              <tr>
                <td width="72">{{ $category->number }}.</td>
                <td width="313">{{ ucwords($category->specialist_title) }}</td>
                <td width="96" style="color: blue;">{{ $category->class }}</td>
                <td width="136"></td>
              </tr>
            @endforeach   
          </tbody>
        </table>  
      </div>
      <br>
      <div class="form-wrap">
          <div class="form-inner">
            <div class="form-con">
              <h1>You are assessed at Category, <strong style="color: red;">L{{ $data->number }} {{ ucwords($data->specialist_title) }}</strong></h1>
            </div>
          </div>
          <br>

          @if(auth()->user()->answerScore->is_done_tif == true)
            <div class="form-inner">
              <div class="form-con">
                <h1>You are assessed at Teacher Impact Factor, <strong style="color: red;">{{ ucwords($dataPif->title) }}</strong></h1>
              </div>
            </div>
            <br>
          @endif

          @if(auth()->user()->answerScore->is_done_tif == true)
            <form class="proceed-form-prevent-multiple-submits" method="POST" action="{{ route('user.proceed')}}" enctype="multipart/form-data">
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
          <form class="pif-form-prevent-multiple-submits" method="POST" action="{{ route('pif.question')}}" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="proceed_pif" value="1">
            <p>The next set of questions relate to any  volunteer / community work you have undertaken" - Teacher Impact Factor Questions</p>
            <br>
            <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
              <span class="btn-text">
                <i class="pif-spinner fa fa-spinner fa-spin" style="display: none;"></i>
                {{ __('Take TIF Questions') }}
              </span>
            </button>
          </form>
          <br>
          @else
          @endif
          <!-- <form class="form-prevent-multiple-submits" method="POST" action="#" enctype="multipart/form-data">
          @csrf
          <p>Or you may wish to re-take the Assessment</p>
          <input type="hidden" name="reset_answer" value="1">
          <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
            <span class="btn-text">
              <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
              {{ __('RE-TAKE ASSESSMENT') }}
            </span>
          </button>
        </form> -->
      </div>
    </div>
  </div>
</div>
@endsection
