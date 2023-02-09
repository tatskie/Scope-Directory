@extends('layouts.app')

@section('content')
<div class="subpage">
  <div class="subpage-title">
    <div class="subpage-title-inner">
      <h1>Application Form</h1>
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
        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('editor.journal') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-inner">

            <div class="form-con">

              <div class="form-input">
                <label class="form-lbl" for="type_of_application">
                  <span>{{ __('Type of Application') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                  <div class="form-input-box">
                    <select name="type_of_application" required>
                      <option value="">Type of Application</option>
                      <option value="Chief Editor">Chief Editor</option>
                      <option value="Editorial Board Member">Editorial Board Member</option>
                      <option value="Journal">Journal</option>
                    </select>
                  </div>
                </div>

                @error('type_of_application')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="journal_name">
                  <span>{{ __('Journal Name') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="journal_name" type="text" class="form-control @error('journal_name') is-invalid @enderror" name="journal_name" autocomplete="journal_name" placeholder="Journal Name" value="" required>
                </div>

                @error('journal_name')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="issn">
                  <span>{{ __('ISSN') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="issn" type="text" class="form-control @error('issn') is-invalid @enderror" name="issn" autocomplete="issn" placeholder="ISSN" value="" required>
                </div>

                @error('issn')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="year_started">
                  <span>{{ __('Year Started') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="year_started" type="date" class="form-control @error('year_started') is-invalid @enderror" name="year_started" autocomplete="year_started" placeholder="Year Started" value="" required>
                </div>

                @error('year_started')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="journal_website">
                  <span>{{ __('Journal Website') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="journal_website" type="text" class="form-control @error('journal_website') is-invalid @enderror" name="journal_website" autocomplete="journal_website" placeholder="Journal Website" value="" required>
                </div>

                @error('journal_website')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="publisher">
                  <span>{{ __('Publisher') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" autocomplete="publisher" placeholder="Publisher" value="" required>
                </div>

                @error('publisher')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="field_of_specialization">
                  <span>{{ __('Your Field of Specializations') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input">
                    <div class="form-input-teaxtarea" style="
                      border: 1px solid #e6e6e6;
                      border-radius: 3px;
                      display: block;
                      height: 100px;
                      letter-spacing: 0px;
                      font-weight: 400;
                      font-style: normal;
                      color: #777;
                      font-size: 14px;
                      opacity: 1;
                      visibility: visible;
                      -webkit-transition: opacity 0.24s ease-in-out;
                      transition: opacity 0.24s ease-in-out;
                      width: 870px;
                    ">
                      <textarea type="text" id="field_of_specialization" name="field_of_specialization" style="height: 100px; width: 869px;"></textarea>
                    </div required>
                </div>

                @error('field_of_specialization')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="form-con">

              <div class="form-input">
                <label class="form-lbl" for="first_name">
                  <span>{{ __('First Name') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" autocomplete="first_name" placeholder="First Name" value="" required>
                </div>

                @error('first_name')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="last_name">
                  <span>{{ __('Last Name') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" autocomplete="last_name" placeholder="Last Name" value="" required>
                </div>

                @error('last_name')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="title">
                  <span>{{ __('Title') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" placeholder="Title" value="" required>
                </div>

                @error('title')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="email">
                  <span>{{ __('Your Email') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" placeholder="Your Email" value="" required>
                </div>

                @error('email')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="current_affiliation">
                  <span>{{ __('Current Affiliation') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                    <input id="current_affiliation" type="text" class="form-control @error('current_affiliation') is-invalid @enderror" name="current_affiliation" autocomplete="current_affiliation" placeholder="Current Affiliation" value="" required>
                </div>

                @error('current_affiliation')
                <span class="form-error">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-input">
                <label class="form-lbl" for="country">
                  <span>{{ __('Country') }}</span><span class="form-required" style="color: red;"> *</span>
                </label>

                <div class="form-input-box">
                  <select name="country" required>
                    <option value="">-- select one --</option>
                    @foreach($countries as $country)
                      <option value="{{ $country->en_short_name }}">{{ $country->en_short_name }}</option>
                    @endforeach
                  </select>
                </div>

                @error('country')
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


