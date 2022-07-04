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
      <h1>Tesol License Card Form</h1>
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
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('create.card') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-inner">
            <div class="form-con">

              <div class="form-input">
                <label class="form-lbl" for="gender">
                  <span>{{ __('Gender') }}</span><!-- <span class="form-required"> (optional)</span> -->
                </label>

                <div class="form-input-box">
                  <select class="custom-select" id="gender" name="gender">
                    <option value="">-- select one --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="NS">NS</option>
                  </select>
                </div>

                @error('gender')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="title">
                  <span>{{ __('Title') }}</span>
                </label>

                <div class="form-input-box">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" placeholder="Mr. Mrs. Ms. Dr. Prof. Blank">
                </div>

                @error('title')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="citizenship">
                  <span>{{ __('Citizenship') }}</span><span class="form-required"> (optional)</span>
                </label>

                <div class="form-input-box">
                  <select name="citizenship">
                    <option value="">-- select one --</option>
                    @foreach($countries as $country)
                      <option value="{{ $country->nationality }}">{{ $country->nationality }}</option>
                    @endforeach
                  </select>
                </div>

                @error('citizenship')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

            </div>

            <div class="form-con">

              <div class="form-input">
                <label class="form-lbl" for="name">
                  <span>{{ __('Name') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input onchange="disableInput()" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" value="{{auth()->user()->name}}" required readonly>
                </div>

                @error('name')
                <span class="name-error form-error">
                  {{ $message }}
                </span>
                @enderror

                <span class="input-empty-error form-error" style="color: red; display: none;">
                  Name cannot be empty!
                </span>

                <span class="form-note">This name will appear on your license card.</span>
                <span class="form-note"><a onclick="changeName()" href="#">Please click to change Name</a></span>
              </div>

              <div class="form-input">
                <label class="form-lbl" for="photo">
                  <span>{{ __('License Card Photo') }}</span><span class="form-required"> (required)</span>
                </label>

                <div class="form-input-box">
                  <input type="file" class="form-control-file" id="photo" name="photo">
                </div>

                <span class="form-note" style="color: #39c8df;">File format: JPG or PNG, not more than 2MB in file size.</span>
                @error('photo')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

            </div>
          </div>

          <button type="submit" class="btn btn-gradient btn-register button-prevent-multiple-submits">
            <span class="btn-text">
              <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
              {{ __('Complete Application') }}
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    function changeName() {
      $('#name').attr("readonly", false).focus();
      $('.input-empty-error').hide();
    }

    function disableInput() {
      var name = $('#name').val().length;

      $('.name-error').hide();

      if (name == 0) {
        $('.input-empty-error').show();
        $('#name').attr("readonly", false).focus();
      }else {
        $('.input-empty-error').hide();
        $('#name').attr("readonly", true);
      }
    }
  </script>
@endsection
