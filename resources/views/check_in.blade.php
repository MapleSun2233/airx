<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>
    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/check_in.css">
    <script src="/js/jquery-3.1.1.js"></script>
</head>
<body>
<div class="alert-box" style="display: none"></div>
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
</header>
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm fz-14 cl-gr">
            <div class="fz-18">
                <div class="title-line">
                    <b class="cl-md fz-24 bg-wt">Check in via guest info</b>
                </div>
                <div class="info-content">
                    <p class="cl-og"></p>
                    <form action="/searchid" method='post'>
                        @csrf
                        <div class="form-row flex">
                            <div class="field-name">ID Card</div>
                            <div class="field-input">
                                <input type="text" title="ID card" name="idCard" class="input mid" value="">
                            </div>
                        </div>
                        <div class="form-row flex">
                            <div class="field-name">Phone</div>
                            <div class="field-input"><input type="text" title="phone" name="phone" class="input mid"
                                                            value=""></div>
                        </div>
                        <div class="form-row ta-rt">
                            <button class="bt-lt br-sm" type='submit'>Check in via guest info ></button>
                        </div>
                    </form>
                </div>
                <div class="title-line account-line">
                    <b class="cl-md fz-24 bg-wt btn">Check in via account</b>
                </div>
                <div class="info-content">
                    <form class="form-row flex" action="/searchaccount">
                        <span class="field-name">Or you can just:</span>
                        <a class="field-input ta-rt">
                            <button class="bt-lt br-sm">Check in via account ></button>
                        </a>
                    </form>
                </div>
            </div>
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
<script>
    // 消息提醒
    @if(session('message'))
        let alertBox = $('.alert-box');
        alertBox.text("{{session('message')}}").fadeIn(500);
        setTimeout(function(){
            alertBox.fadeOut(500);
        },2000);
    @endif
</script>
</body>
</html>