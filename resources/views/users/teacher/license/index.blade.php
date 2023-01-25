@extends('layouts.app')

@section('content')
<div class="subpage">
  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>Professional Teacher Standing Form</h1>
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
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('teacher.card') }}" enctype="multipart/form-data">
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
                  <span>{{ __('Your SCOPE Title.') }} This will appear on your Professional Identity card. Select only ONE.</span>
                </label>

                <div class="form-input-box">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" placeholder="{{ ucwords($data->specialist_title) }} {{ ucwords(auth()->user()->name) }}" value="{{ ucwords($data->specialist_title) }}" readonly>
                </div>

                @error('title')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="academic_title">
                  <span>{{ __('Your Current Teacher Title') }}</span>
                </label>

                <div class="form-input-box">
                    <select name="academic_title">
                      <option value="">Select Title</option>
                      <option value="International TESOL Teacher">International TESOL Teacher</option>
                      <option value="Teacher">Teacher</option>
                      <option value="Professional Licensed Teacher">Professional Licensed Teacher</option>
                      <option value="Assistant Director of Studies ADOS">Assistant Director of Studies ADOS</option>
                      <option value="Director of Studies DOS">Director of Studies DOS</option>
                      <option value="Early Childhood Education Teacher">Early Childhood Education Teacher</option>
                      <option value="Early Childhood Special Education Teacher">Early Childhood Special Education Teacher</option>
                      <option value="Elementary Education Teacher">Elementary Education Teacher</option>
                      <option value="Secondary Education Teacher">Secondary Education Teacher</option>
                      <option value="English Teacher">English Teacher</option>
                      <option value="Mathematics Teacher">Mathematics Teacher</option>
                      <option value="Sciences Teacher">Sciences Teacher</option>
                      <option value="Biology Teacher">Biology Teacher</option>
                      <option value="Chemistry Teacher">Chemistry Teacher</option>
                      <option value="Life Sciences Teacher">Life Sciences Teacher</option>
                      <option value="Physics Teacher">Physics Teacher</option>
                      <option value="Social Sciences Teacher">Social Sciences Teacher</option>
                      <option value="Art Teacher">Art Teacher</option>
                      <option value="Computer Science Teacher">Computer Science Teacher</option>
                      <option value="Dance Teacher">Dance Teacher</option>
                      <option value="Drama/Theater">Drama/Theater</option>
                      <option value="English as a Second Language (ESL) Teacher">English as a Second Language (ESL) Teacher</option>
                      <option value="Foriegn Language Teacher">Foriegn Language Teacher</option>
                      <option value="French Teacher">French Teacher</option>
                      <option value="German Teacher">German Teacher</option>
                      <option value="Italian Teacher">Italian Teacher</option>
                      <option value="Japanese Teacher">Japanese Teacher</option>
                      <option value="Spanish">Spanish</option>
                      <option value="Gifted and Talented Education (GATE) Certification">Gifted and Talented Education (GATE) Certification</option>
                      <option value="Home Economics Teacher">Home Economics Teacher</option>
                      <option value="Music Teacher">Music Teacher</option>
                      <option value="Physical Education Teacher">Physical Education Teacher</option>
                      <option value="Special Education Teacher">Special Education Teacher</option>
                      <option value="Education Technology Teacher">Education Technology Teacher</option>
                      <option value="Other">Other</option>
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
