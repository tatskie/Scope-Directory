<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ ucwords($user->name)}} Scope Profile</title>

    <link rel="shortcut icon" href="{{ asset('profile/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('profile/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('profile/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('profile/css/style.css') }}" />
    <style type="text/css">

      .dashboard-card {
        background: url(/assets/images/card/sample-id.png); 
        background-size: 50%;
        background-repeat: no-repeat;
        padding: 20px;

      }

      #scope-number {
        margin-left: 81px;
        margin-top: 19px;
      }

      .card-title {
        text-align: center;
      }

      .title {
        color: #39c8df;
      }

      .tesol-one-logo {
        margin-right: 240px;
      }

      #academic-name {
        text-align: left;
        margin-left: 96px;
        margin-top: -101px;
        font-family: 'montserrat', sans-serif;
        color: #232323;
        font-size: 12px;
        font-weight:400;
      }

      #main-photo {
        /*text-align: left;*/
        margin-left: -11px;
        margin-top: 7px;
        opacity: 80%;
      }
        
      .teacher-photo {
          margin-top: 74px;
          margin-right: 49px;
      }

      #academic-categories {
        text-align: left;
        margin-left: 96px;
        margin-top: 10px;
        font-family: 'montserrat', sans-serif;
        color: #232323;
        font-size: 12px;
        font-weight: 300;
      }

      #academic-pif {
        text-align: left;
        margin-left: 96px;
        margin-top: 17px;
        font-family: 'montserrat', sans-serif;
        color: #232323;
        font-size: 12px;
        font-weight:400;
      }

      #valid-until {
        text-align: left;
        margin-left: 47px;
        margin-top: 6px;
        font-family: 'montserrat', sans-serif;
        color: #232323;
        font-size: 12px;
        font-weight:400;
      }

      .dashboard-back-card {
        background: url(/assets/images/card/back-ID-bg.png); 
        background-size: 100%;
        background-repeat: no-repeat;
        margin-top: -239px;
        margin-left: 360px;
        padding: 114px;
      }

      .valid-date {
        margin-left: 65px;
      }

      .barcode {
        margin-top: -49px;
        margin-left: 25px;
      }

      .qr-code {
        margin-top: -85px;
        margin-left: 260px;
      }

      #data-left a:link,
      #data-left a:visited {
        color:#39c8df !important;
      }

      #data-left a:hover {
        color:#00a0e3 !important;
      }


    </style>
</head>

<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="row">
                <div class="col-md-4 left-co">
                    <div class="left-side">
                        <div class="profile-info">
                            <img src="{{ url('/public/assets/images/user/'.$user->card->photo) }}" alt="">
                            <!-- <h3>{{ ucwords($user->name)}}</h3>
                            <span>{{ $user->academicInformation->employer }}</span> -->
                        </div>
                        <h4 class="ltitle">Employment</h4>
                        <div class="contact-box pb0">
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="detail">
                                {{ $user->academicInformation->from->format('d-m-Y') }} to 
                                  @if($user->academicInformation->is_present)
                                    present
                                  @else
                                    {{ $user->academicInformation->to->format('d-m-Y') }}
                                  @endif
                                <br/>{{ $user->academicInformation->employer }}
                                <br>
                                <br>
                            </div>
                        </div>
                        <h4 class="ltitle">H Index</h4>
                        <ul class="row social-link no-margin">
                            <li>{{ $user->academicInformation->index }}</li>
                        </ul>
                        <h4 class="ltitle">Special Award</h4>

                        <ul class="row social-link no-margin">
                            <li>Elected as a Fellow of the Royal Society of New Zealand</li>
                            <li>Individual Creative or Team of the Year ·</li>
                        </ul>
                        <!-- 
                        <h4 class="ltitle">Hobbies</h4>
                        <ul class="hoby row no-margin">
                            <li><i class="fas fa-pencil-alt"></i> <br> Writing</li>
                            <li><i class="fas fa-bicycle"></i> <br> Cycling</li>
                            <li><i class="fas fa-futbol"></i> <br> Football</li>
                            <li><i class="fas fa-film"></i><br> Movies</li>
                            <li><i class="fas fa-plane-departure"></i> <br>Travel</li>
                            <li><i class="fas fa-gamepad"></i> <br> Games</li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-md-8 rt-div">
                    <div class="rit-cover">
                        <div class="hotkey">
                            <h1 class="">{{ ucwords($user->name)}} </h1>
                            <small>{{ $user->academicInformation->employer }}</small>
                        </div>

                        <h2 class="rit-titl">Scope Number: <span style="color: red;">{{ $user->scope->scope }}</span></h2>
                        <div class="scope-card">
                            <div class="dashboard-card">
                              <div>
                                <div id="scope-number"><strong style="color: red;">{{ $user->scope->scope }}</strong></div>
                                <div id="main-photo"><img src="{{ url('/public/assets/images/user/'.$user->card->photo) }}" height="123" width="99"></div>
                                <div id="academic-name">
                                  <strong>{{ ucwords($user->name) }}</strong>
                                </div>
                                <div id="academic-categories">
                                  <strong>Level {{ $user->card->academiaCategory->number }}</strong>
                                  <br>
                                  <strong>{{ $user->card->academiaCategory->specialist_title }}</strong>
                                </div>
                                <div id="academic-pif"><strong>{{ $user->card->aif->title }}</strong></div>
                                <div id="valid-until"><strong>03/02/2023</strong></div>
                              </div>
                            </div>

                            <div class="dashboard-back-card">
                              <div>
                              </div>
                            </div>
                            <small style="font-style: italic;;">(Sample Only)</small>
                        </div>


                        <br>
                        <h2 class="rit-titl"><i class="far fa-user"></i>Biography</h2>
                        <div class="about">
                            <p>{{ $user->academicInformation->bio }}</p>
                        </div>

                        <br>
                        <h2 class="rit-titl"><i class="fas fa-book"></i> Publications</h2>

                        @foreach($user->academicPublications as $publication)

                        <div class="work-exp">
                            <h6>{{ $publication->title }} <span>{{ $publication->year }}</span></h6>
                            <i>Journal: {{ $publication->journal }}</i>
                            <ul>
                                <li><i class="far fa-hand-point-right"></i>DOI: {{ $publication->doi }} </li>
                                <li><i class="far fa-hand-point-right"></i>Soure: {{ $publication->source }} </li>
                            </ul>
                        </div>

                        @endforeach

                        <br>
                        <h2 class="rit-titl"><i class="fas fa-users"></i> Recent Conference Presentations</h2>
                        @foreach($user->conferences as $conference)
                          <div class="education">
                              <ul class="row no-margin">
                                  <li class="col-md-6"><span>{{ $conference->year }}</span> 
                                    <br>
                                    <span>Name: {{ $conference->name }}</span>
                                    <br>
                                    <span>Location: {{ $conference->location }}</span>
                                    <br>
                                    <span>Link: {{ $conference->link }}</span>
                                  </li>
                              </ul>
                          </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('profile/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('profile/js/popper.min.js') }}"></script>
<script src="{{ asset('profile/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('profile/js/script.js') }}"></script>


</html>