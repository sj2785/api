<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta http-equiv="refresh" content="3"> --}}
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7483bd17841d33f85c57', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('channel');
    channel.bind('LivePrice', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
    @yield('content')
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</html>