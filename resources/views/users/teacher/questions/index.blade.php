@extends('layouts.app')
@section('styles')
  <style type="text/css">
    :root {
  --color-blue: #00a0e3;	
  --color-white: #fff;
  --color-black: #333;
  --color-gray: #75787b;
  --color-gray-light: #bbb;
  --color-gray-disabled: #e8e8e8;
  --color-green: #53a318;
  --color-green-dark: #383;
  --font-size-small: .75rem;
  --font-size-default: .875rem;
}

* {
  box-sizing: border-box;
  font-size: 18px;
}

body {
  /*margin: 2rem;*/
  font-family: "Roboto", sans-serif; /*'Open Sans', sans-serif*/
  color: var(--color-black);
}

h2 {
  color: var(--color-gray);
  font-size: 14px;
  line-height: 1.5;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 3px;
}
section {
  margin-bottom: 2rem;
  margin-top: 2rem;

}

.progress-bar {
  display: flex;
  justify-content: space-between;
  list-style: none;
  padding: 0;
  margin: 0 0 1rem 0;
}
.progress-bar li {
  flex: 2;
  position: relative;
  padding: 0 0 14px 0;
  font-size: var(--font-size-default);
  line-height: 1.5;
  color: var(--color-blue);
  font-weight: 600;
  white-space: nowrap;
  overflow: visible;
  min-width: 0;
  text-align: center;
  border-bottom: 2px solid var(--color-gray-disabled);
}
.progress-bar li:first-child,
.progress-bar li:last-child {
  flex: 1;
}
.progress-bar li:last-child {
  text-align: right;
}
.progress-bar li:before {
  content: "";
  display: block;
  width: 16px;
  height: 16px;
  background-color: var(--color-gray-disabled);
  border-radius: 50%;
  border: 2px solid var(--color-white);
  position: absolute;
  left: calc(50% - 6px);
  bottom: -9px;
  z-index: 3;
  transition: all .2s ease-in-out;
}
.progress-bar li:first-child:before {
  left: 0;
}
.progress-bar li:last-child:before {
  right: 0;
  left: auto;
}
.progress-bar span {
  transition: opacity .3s ease-in-out;
}
.progress-bar li:not(.is-active) span {
  opacity: 0;
}
.progress-bar .is-complete:not(:first-child):after,
.progress-bar .is-active:not(:first-child):after {
  content: "";
  display: block;
  width: 100%;
  position: absolute;
  bottom: -2px;
  left: -50%;
  z-index: 2;
  border-bottom: 2px solid var(--color-blue);
}
.progress-bar li:last-child span {
  width: 200%;
  display: inline-block;
  position: absolute;
  left: -100%;
}

.progress-bar .is-complete:last-child:after,
.progress-bar .is-active:last-child:after {
  width: 200%;
  left: -100%;
}

.progress-bar .is-complete:before {
  background-color: var(--color-blue);
}

.progress-bar .is-active:before,
.progress-bar li:hover:before,
.progress-bar .is-hovered:before {
  background-color: var(--color-white);
  border-color: var(--color-blue);
}
.progress-bar li:hover:before,
.progress-bar .is-hovered:before {
  transform: scale(1.33);
}

.progress-bar li:hover span,
.progress-bar li.is-hovered span {
  opacity: 1;
}

.progress-bar:hover li:not(:hover) span {
  opacity: 0;
}

.x-ray .progress-bar,
.x-ray .progress-bar li {
  border: 1px dashed red;
}

.progress-bar .has-changes {
  opacity: 1 !important;
}
.progress-bar .has-changes:before {
  content: "";
  display: block;
  width: 8px;
  height: 8px;
  position: absolute;
  left: calc(50% - 4px);
  bottom: -20px;
  background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%208%208%22%3E%3Cpath%20fill%3D%22%23ed1c24%22%20d%3D%22M4%200l4%208H0z%22%2F%3E%3C%2Fsvg%3E');
}
input[type="radio"] {
  cursor: pointer;
}
button.btn.btn-primary.btn-sm.button-prevent-multiple-submits {
    color: #fff;
    line-height: 1;
    text-transform: capitalize;
    background-color: #00a0e3;
    border: solid 1px #39c8df;
    border-radius: 5px;
    transition: all 0.2s ease-in-out;
    padding:15px 45px;
    cursor: pointer;
}      
  </style>
@endsection

@section('content')
<main class="l-main">
    <div class="subpage">

      <div class="subpage-title">
        <div class="subpage-title-inner">
          <h1>Career Information</h1>
        </div>
      </div>
      <div class="subpage-inner">
        <div class="subpage-content">
              <div class="subpage-content subpage-body">
      <h2>Answer the following questions.</h2>
      </div>

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <section>
            <h2>
              {{ number_format((float)$number / count($questions) * 100, 2, '.', '') }}% Progress
            </h2>

            <ol class="progress-bar">
              @foreach($questions as $key => $questionProgress)
                @if($key + 1 < $number)
                  <li class="is-complete"><span>{{$key + 1}}</span></li>
                @elseif($key + 1 == $number)
                  <li class="is-active"><span>{{$key + 1}}</span></li>
                @else
                  <li><span>{{$key+1}}</span></li>
                @endif
              @endforeach
            </ol>
          </section>

          <form class="form-prevent-multiple-submits" method="POST" action="{{route('teacher.question', $question->url)}}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">

            <h4>{{ $number }}. {{ $question->question }}</h4>

            <br>
            @if ($question->code_id == '1')
              @foreach ($question->questionChoices as $key => $choice)
                @if($choice->label == 'Yes')
                  <label class="btn btn-secondary active" for="{{ $key }}">
                    <input type="radio" name="answer" id="{{ $key }}" value="1" checked> {{ $choice->label }}
                  </label>
                @else
                  <label class="btn btn-secondary" for="{{ $key }}">
                    <input type="radio" name="answer" id="{{ $key }}" value="0"> {{ $choice->label }}
                  </label> 
                @endif
              @endforeach
              <br>
            @elseif ($question->code_id == '2')
              @foreach ($question->questionChoices as $key => $choice)
                @if($key == '0')
                  <label class="btn btn-secondary active" for="{{ $key }}">
                    <input type="radio" name="answer" id="{{ $key }}" value="{{ $choice->points }}" checked> {{ $choice->label }}
                  </label>
                @else
                  <label class="btn btn-secondary" for="{{ $key }}">
                    <input type="radio" name="answer" id="{{ $key }}" value="{{ $choice->points }}"> {{ $choice->label }}
                  </label> 
                @endif
              @endforeach
              <br>
            @elseif ($question->code_id == '3')
              <div class="form-input-box">
                <input type="text" id="answer" name="answer" placeholder="{{ $question->question }}"/>
              </div>
              <br>
            @elseif ($question->code_id == '4')
              <div class="form-input-box">
                <select id="answer" name="answer">
                  @foreach ($question->questionChoices as $choice)
                    <option value="{{ $choice->label }}">{{ $choice->label }}</option>
                  @endforeach
                </select>
              </div>
              <br>
            @elseif ($question->code_id == '5')
              @foreach ($question->questionChoices as $key => $choice)
                  <input type="checkbox" id="{{ $key }}" name="answer[]" value="{{ $choice->points }}">
                  <label for="{{ $key }}"> {{ $choice->label }}</label><br>
              @endforeach
              <br>
            @endif
            @if ($errors->has('answer'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('answer') }}</strong>
                </span>
            @endif
            <button type="submit" class="btn btn-primary btn-sm button-prevent-multiple-submits">
              <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i>
              Submit
            </button>

          </form>
        </div>

        <div class="subpage-sidebar">

          </div>
      </div>
    </div>
</main>
@endsection
