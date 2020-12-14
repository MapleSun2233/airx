<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIRX</title>
    <link rel="stylesheet" href="{{asset('/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('/css/header.css')}}">
    @yield('link')
    <script src="{{asset('/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="alert-box" style="display: none">
    </div>
    <header>
        <div class="wrapper">
            <a href="/"><img src="{{asset('/images/airx_logo.png')}}" alt="logo" class="logo"></a>
            <nav>
                <ul class=""www>
                    <li>
                        <a href="/account">My Account</a>
                    </li>
                    <li><a href="/check_in">Check In</a></li>
                    <li><a href="/search">Plan and Book</a></li>
                    <li><a href="/">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield("content")
</body>
</html>
