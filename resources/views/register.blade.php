@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection
@section('content')
    <div class="banner" style="height:200px">
        <div class="wrapper">
            <h1>REGISTER</h1>
        </div>
    </div>
    <div class="wrapper">
        <form action="/register" method="post">
            @csrf
            <div class="form-row">
                <b>
                    Create a new AIRX account:
                </b>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>E-MAIL</label></div>
                <div class="field-input">
                    <input type="email" class="input" name="email" required>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>USERNAME</label></div>
                <div class="field-input">
                    <input type="text" class="input" name="username" required>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>PASSWORD</label></div>
                <div class="field-input">
                    <input type="password" class="input" name="password" required>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>REPEAT PASSWORD</label></div>
                <div class="field-input">
                    <input type="password" class="input" name="repassword" required>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>GENDER</label></div>
                <div class="field-input">
                    <select name="gender" class="input">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>PHONE</label></div>
                <div class="field-input">
                    <input type="number" class="input" name="phone" required>
                </div>
            </div>
            <div class="form-row">
                <input type="checkbox" title="agree" class="input va-bl" required="">&nbsp;
                I agree to <a href="#" class="lk-ul">AIRX Flight Terms and Conditions</a>
            </div>
            <div class="form-row" style="text-align: right">
                <input type="submit" class="submit" value="REGISTER >" disabled>
            </div>
        </form>
    </div>
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
            //提交按钮控制
            $('input[type=checkbox]').click(function(){
                let flag = $(this).prop('checked');
                if(flag){
                    $('.submit').removeAttr('disabled');
                }else{
                    $('.submit').attr('disabled','');
                }
            });
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
            $('.submit').click(function(event){
                if(password.eq(0).val() != password.eq(1).val()){
                    event.preventDefault();
                }
            });
        })
    </script>
@endsection
