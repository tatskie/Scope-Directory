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
      <h1>Professional Academic Standing Form</h1>
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
                  <span>{{ __('Your SCOPE Title.') }} This will appear on your licence card.</span>
                </label>

                <div class="form-input-box">
                  @if($data->id == 4)
                    <select name="title">
                      <option value="The Respected Professor">-- Please choose appropriate title. --</option>
                      <option value="The Respected Professor">The Respected Professor {{ ucwords(auth()->user()->name) }}</option>
                      <option value="The Respected Assistant Professor">The Respected Assistant Professor {{ ucwords(auth()->user()->name) }}</option>
                      <option value="The Respected Dr.">The Respected Dr. {{ ucwords(auth()->user()->name) }}</option>
                      <option value="The Respected Mr.">The Respected Mr. {{ ucwords(auth()->user()->name) }}</option>
                      <option value="The Respected Ms.">The Respected Ms. {{ ucwords(auth()->user()->name) }}</option>
                      <option value="The Respected Miss">The Respected Miss {{ ucwords(auth()->user()->name) }}</option>
                    </select>
                  @else
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" placeholder="{{ ucwords($data->specialist_title) }} {{ ucwords(auth()->user()->name) }}" value="{{ ucwords($data->specialist_title) }}" readonly>
                  @endif
                </div>

                @error('title')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="academic_title">
                  <span>{{ __('Your Current Academic Title') }}</span>
                </label>

                <div class="form-input-box">
                    <select name="academic_title">
                      <option value="">Select Title</option>
                      <option value="Professor">Professor</option>
                      <option value="Professor Emeritus">Professor Emeritus</option>
                      <option value="Associate Professor">Associate Professor</option>
                      <option value="Assistant Professor">Assistant Professor</option>
                      <option value="Teaching Fellow">Teaching Fellow</option>
                      <option value="Senior Lecturer">Senior Lecturer</option>
                      <option value="Lecturer">Lecturer</option>
                      <option value="Reader">Reader</option>
                      <option value="Assistant Lecturer">Assistant Lecturer</option>
                      <option value="Full Instructor">Full Instructor</option>
                      <option value="Assistant Instructor">Assistant Instructor</option>
                      <option value="Instructor">Instructor</option>
                    </select>
                </div>

                @error('academic_title')
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
                      <option value="{{ $country->en_short_name }}">{{ $country->en_short_name }}</option>
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
                  <span>{{ __('Name Only') }}</span><span class="form-required"> (required)</span>
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
                  <span>{{ __('ID Card Photo') }}</span><span class="form-required"> (required)</span>
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
