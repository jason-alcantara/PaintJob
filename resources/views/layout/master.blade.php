<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Paint Job</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <h2 class="title">Juan's Auto Paint</h2>
    </div>

    <div class="navbar">
        <a href="{{ url('/') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">New Paint Job</a>
        <a href="{{ url('/summary') }}"  class="{{ (request()->is('summary')) ? 'active' : '' }}">Paint Jobs</a>
    </div>
    
    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>