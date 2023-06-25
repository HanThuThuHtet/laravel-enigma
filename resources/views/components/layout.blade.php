<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enigma</title>
    <link href="./img/e.png" rel="icon" type="image/png"  />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  </head>

  <body id="home">

    <x-navbar/>
    {{$slot}}
    <x-footer />

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
