<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the site {{ $userName }}</h2>
    <br/>
    Your registered email-id is {{ $userEmail }} , Please click on the below link to verify your email account
    <br/>
    <a href="{{ url('users/verify', $userToken) }}">Verify Email</a>
  </body>
</html>