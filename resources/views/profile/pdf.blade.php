<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Profile Export</title>
</head>
<body>


<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .container {
    margin-top: 5px;
    padding: 2px 16px;
    text-align: center;
  }
  .profile {
    width:100%;
  }
</style>
    <br>
    <div class="card">
      <img src="{{ asset('assets/images/user/'. $card->photo) }}" alt="Avatar" class="profile">
      <div class="container">
        <h4><b>{{ $card->title }} {{ $user->name }}</b></h4> 
        <h4>Professional Status: <small>L{{ $card->licenseCategory->class }} {{ $card->licenseCategory->specialist_title }}</small></h4> 
        <p>
          @if($card->is_graduated == true)
            Bachelor Degree
          @endif
        </p> 
        <p>Gender: {{ $card->gender }}</p> 
        <p>Citizenship: {{ ucwords($card->citizenship) }}</p> 
        <p>Email: {{ $user->email }}</p> 
        <br>
      </div>
    </div>
  </body>
</html>

