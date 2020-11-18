@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection
@section('content')
    <div class="banner" style="height:200px">
        <div class="wrapper">
            <h1>LOGIN</h1>
        </div>
    </div>
    <div class="wrapper">
        <p class="top color-gr">Haven't an AIRX account ? <a href="/register">REGISTER NOW &gt;&gt;</a></p>
        <form action="/login" method="post">
            @csrf
            <div class="form-row">
                <b>
                    Login via your AIRX account:
                </b>
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
            <div class="form-row" style="text-align: right">
                <input type="submit" class="submit" value="Login >">
            </div>
        </form>
    </div>
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
@endsection
