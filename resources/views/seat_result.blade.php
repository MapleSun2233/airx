
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/result.css">

</head>
<body>
<header>
    <div class="wrapper">
        <a href="/"><img src="/images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
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
<main class="bg-eee">
    <div class="wrapper bg-wt cl-dk ta-lt">
        <div class="big-title fz-24">
            <img src="/images/tick.png" alt="ok">
            Your check in of flight <span class="cl-og">{{$no}}</span> is successfully scheduled.
        </div>
        <div class="detail-info fz-18">
            <p>
                Your seat arrangement is listed below:
                <br><br>
                @foreach($userInfo as $guest)
                    {{$guest[0]}}, Your seat:{{$guest[1]}}<br>
                @endforeach
            </p>
            <p>
                Your flight will take off at <span class="cl-bl">{{$time}} {{$date}}</span>. Please be prepared for boarding.
                <br>
                Thank you for choosing our flights.
            </p>
            <p>
                <br>
                <button class="br-sm bt-lt">
                    <a href="/">
                        Back to Index
                    </a>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="br-sm bt-lt">
                    <a href="/check_in">
                        Check In
                    </a>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="br-sm bt-lt download">
                    <a href="/download/{{$filename}}">Download txt</a>
                </button>
            </p>
        </div>
    </div>
</main>
<footer>
    <div class="wrapper fz-18 cl-dk">
        <img src="/images/co2zer_icon.png" alt="co2zer">
        <a href="/">www.skyteam.com</a>
        <a href="/">www.airx.com</a>
    </div>
</footer>
</body>
</html>