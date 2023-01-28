<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="border: 1px solid grey;padding: 20px">
    <h3>Numele: {{$callrequest['name']}}</h3>
    <h3>Telefon: {{$callrequest['phone']}}</h3>
    <hr>
    @if (isset($callrequest['service']))
      <h3>Serviciu: {{ $callrequest['service'] }}</h3>
    @endif
    <hr>
    @if (isset($callrequest['message']))
      <h3>Mesaj:</h3>
      <p>{{ $callrequest['message'] }}</p>
    @endif
  </body>
</html>
