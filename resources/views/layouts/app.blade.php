<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pikaday.css') }}" />
</head>
<body>

<div class="wrapper">
    <div class="top-bar">
        <div class="left-side">
            <span>ITRM Task</span>
        </div>
        <div class="right-side">
        @guest
            <button onclick="location.href='{{ route('register') }}';">{{ __('Register') }}</button>
            <button onclick="location.href='{{ route('login') }}';">{{ __('Login') }}</button>
        @else
            <span>Welcome, {{ Auth::user()->forename }}!</span>
            <button onclick="location.href='/dashboard';">Dashboard</button>
            <button onclick="location.href='/profile_edit';">Profile edit</button>
            <button onclick="document.getElementById('logout-form').submit();">{{ __('Logout') }}</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        </div>
    </div>

@yield('content')

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pikaday.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
