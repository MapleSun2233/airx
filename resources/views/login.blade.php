
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>
    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
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
    </div>
</header>
<section class="banner thin">
    <div class="wrapper cl-wt">
        <h1>Login</h1>
    </div>
</section>
<main class="fz-16">
    <div class="wrapper">
        <p class="cl-gr register-now">Haven’t an AIRX account?&nbsp;&nbsp;&nbsp;<a href="/register" class="lk-ul">REGISTER NOW>></a></p>
        <p>
        </p>
        <form action="/login" class="info-form" method="POST" >
             @csrf
            <div class="form-row cl-dk"><b>Login via your AIRX account:</b></div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                <div class="field-input"><input type="text" name="username" class="input big" required></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                <div class="field-input"><input type="password" name="password" class="input big" required></div>
            </div>
            <div class="form-row ta-rt">
                <input type="submit" class="bt-lt tt-uc" value="Login >">
            </div>
        </form>
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