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
        <h1>Register</h1>
    </div>
</section>
<main class="fz-16">
    <div class="wrapper">
        <form action="/register" method="post" class="info-form">
            @csrf
            <div class="form-row cl-dk"><b>Create a new AIRX account:</b></div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">E-MAIL</label></div>
                <div class="field-input"><input type="email" name="email" class="input big" value="" required></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                <div class="field-input"><input type="text" name="username" class="input big" value="" required></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                <div class="field-input"><input type="password" name="password" class="input big" required></div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">REPEAT PASSWORD</label></div>
                <div class="field-input"><input type="password" name="repassword" class="input big" required>
                </div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">GENDER</label></div>
                <div class="field-input">
                    <select name="gender" class="input big">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PHONE</label></div>
                <div class="field-input"><input type="number" name="phone" class="input big" value="" required></div>
            </div>
            <div class="form-row">
                <input type="checkbox" title="agree" class="input va-bl" required>&nbsp;
                I agree to <a href="#" class="lk-ul">AIRX Flight Terms and Conditions</a>
            </div>
            <div class="form-row ta-rt">
                <input type="submit"  class="bt-lt" value="REGISTER >">
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
    $(function(){
        // 消息提醒
        @if(session('message'))
        let alertBox = $('.alert-box');
        alertBox.text("{{session('message')}}").fadeIn(500);
        setTimeout(function(){
            alertBox.fadeOut(500);
        },2000);
        @endif
        // 密码不一致提示
        let password = $('input[type=password]');
        password.eq(0).change(function(){
            if(password.eq(0).val() == password.eq(1).val())
                password.eq(1).removeAttr('style');
            else
                password.eq(1).css('border-color','red');
        });
        password.eq(1).change(function(){
            if(password.eq(0).val() == password.eq(1).val())
                password.eq(1).removeAttr('style');
            else
                password.eq(1).css('border-color','red');
        });
        //检查密码是否重复正确
        $('input[type=submit]').click(function(event){
            if(password.eq(0).val() != password.eq(1).val()){
                event.preventDefault();
            }
        });
    })
</script>
</body>
</html>