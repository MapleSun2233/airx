<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/ucenter.css">
    <script src="/js/jquery-3.1.1.js"></script>

</head>
<body>
<div class="alert-box" style="display: none"></div>
<header>
    <div class="wrapper">
        <a href="/"><img src="/images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
                <li><a href="/account">My Account</a></li>
                <li><a href="/check_in">Check In</a></li>
                <li><a href="/search">Plan and Book</a></li>
                <li><a href="/">Home</a></li>
            </ul>
        </nav>
    </div>
</header>
<section class="banner thin">
    <div class="wrapper cl-wt">
        <h1>User Center</h1>
    </div>
</section>
<main class="fz-16">
    <div class="wrapper">
        <div id="logout-form" class="fz-18">
            <span class="cl-og fw-bd">Welcome back, {{$userData['username']}}.</span>
            <button class="bt-lt br-sm log-out" style="float:right;">Log out</button>
        </div>
        <div class="cl-gr tabs-wrapper">
            <ul class="tabs">
                <li><a class="bt-lt active" href="#profile">Profile</a></li>
                <li><a class="bt-lt " href="#guests">Guests</a></li>
            </ul>
            <ul class="tabs-content">
                <li id="profile" class=active>
                    <form action="/edit" method='post' id="profile-form">
                        @csrf
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">E-MAIL</label></div>
                            <!--You can use property 'disabled' and style 'display' to make an input reanonly and looks like plain text.-->
                            <div class="field-input">
                                <input type="text" name="email" class="input big display"
                                    value="{{$userData['email']}}" required disabled>
                                </div>

                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                            <div class="field-input"><input type="text" name="username" class="input big"
                                                            value="{{$userData['username']}}" required></div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                            <div class="field-input"><input type="password" name="password" class="input big"
                                                            required></div>
                        </div>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">REPEAT PASSWORD</label></div>
                            <div class="field-input"><input type="password" name="repassword"
                                                            class="input big" required>
                            </div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">GENDER</label></div>
                            <div class="field-input">
                                @if($userData['gender'] == 'Female')
                                    <select name="gender" class="input big">
                                        <option value="Female" selected>Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                @elseif($userData['gender'] == 'Male')
                                    <select name="gender" class="input big">
                                        <option value="Female">Female</option>
                                        <option value="Male" selected>Male</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">PHONE</label></div>
                            <div class="field-input"><input type="number" name="phone" class="input big"
                                                            value="{{$userData['phone']}}" required></div>
                        </div>
                        <div class="form-row ta-rt control">
                            <input type="submit"  class="bt-lt tt-uc" value="Submit">
                        </div>
                    </form>
                </li>
                <li id="guests">
                    <p class="cl-og"></p>
                    @foreach($guestsData as $guest)
                    <form action="#" method="post" style="width:100%">
                        <div class="guest-info bg-eee fz-16 br-sm">
                            <div class="guest-name">
                                <input type="text" title="name" class="input big"
                                       value="{{$guest['guest_name']}}">
                            </div>
                            <div class="guest-detail">
                                <div class="mobile form-group">
                                    <label>MOBILE: </label>
                                    <input type="tel" title="phone" class="input mid"
                                           value="{{$guest['guest_phone']}}">
                                </div>
                                <div class="idno form-group">
                                    <label>ID CARD: </label>
                                    <input type="text" title="id" class="input mid"
                                           value="{{$guest['guest_card']}}">
                                </div>
                                <div class="idno form-group">
                                    <label>GENDER </label>
                                    <select title="gender" class="input mid">
                                    @if($guest['guest_gender']=='male')
                                        <option value="female">Female</option>
                                        <option value="male" selected>Male</option>
                                    @elseif($guest['guest_gender']=='female')
                                        <option value="female" selected>Female</option>
                                        <option value="male">Male</option>
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div class="info-button">
                                <button type='button' title='modify' data-id='{{$guest["id"]}}' class="bt-lt br-sm fw-nm fz-16">MODIFY ></button>
                                <button type='button' title='delete' data-id='{{$guest["id"]}}' class="bt-lt br-sm fw-nm fz-16 delete">DELETE ></button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</main>
<script>
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
    // 退出功能实现
    $('.log-out').click(function(){
        location.href = '/exit';
    });
    // 标签页切换
    $(".tabs>li>a").click(function (e) {
        e.preventDefault();
        $(".tabs>li>a").removeClass("active");
        $(e.target).addClass("active");
        e.target.getAttribute("href") && $(".tabs-content>li").removeClass("active").filter(e.target.getAttribute("href")).addClass("active");
    });
    // ajax实现guest的改删
    function getJson(btn,key){
        let guestInfoBox = $(btn).parent().parent();
        let name = guestInfoBox.find('[title="name"]').val();
        let phone = guestInfoBox.find('[title="phone"]').val();
        let card = guestInfoBox.find('[title="id"]').val();
        let gender = guestInfoBox.find('[title="gender"]').val();
        let obj = {
            'id':key,
            'name':name,
            'phone':phone,
            'card':card,
            'gender':gender
        };
        return JSON.stringify(obj);
    }
    function updateVal(btn,obj){
        let guestInfoBox = $(btn).parent().parent();
        guestInfoBox.find('[title="name"]').val(obj.name);
        guestInfoBox.find('[title="phone"]').val(obj.phone);
        guestInfoBox.find('[title="id"]').val(obj.card);
        guestInfoBox.find('[title="gender"]').val(obj.gender);
    }
    function deleteGuest(btn){
        let form = $(btn).parent().parent().parent();
        form.remove();
    }
    $('button[title="modify"]').click(function(){
        let status = confirm('Are you sure you want to update?');
        if(status){
            let id = $(this).data('id');
            let json = getJson(this,id);
            $.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}})
            $.ajax({
                type:'post',
                url:'/guest',
                contentType:'application/json',
                data:json,
                success:function(response){
                    updateVal(this,response);
                    let alertBox = $('.alert-box');
                    alertBox.text('update success!').fadeIn(500);
                    setTimeout(function(){
                        alertBox.fadeOut(500);
                    },2000);
                },
                error:function(e){
                    let alertBox = $('.alert-box');
                    alertBox.text('response error!').fadeIn(500);
                    setTimeout(function(){
                        alertBox.fadeOut(500);
                    },2000);
                }
            });
        }
    });
    $('button[title="delete"]').click(function(){
        let status = confirm('Are you sure you want to delete?');
        let _this = this;
        if(status){
            let id = $(_this).data('id');
            $.ajax({
                type:'get',
                url:'/deleteguest/?id='+id,
                success:function(response){
                    deleteGuest(_this);
                    let alertBox = $('.alert-box');
                    alertBox.text('delete success!').fadeIn(500);
                    setTimeout(function(){
                        alertBox.fadeOut(500);
                    },2000);
                },
                error:function(e){
                    let alertBox = $('.alert-box');
                    alertBox.text('delete error!').fadeIn(500);
                    setTimeout(function(){
                        alertBox.fadeOut(500);
                    },2000);
                }
            });
        }
    });
</script>
<footer>
    <div class="wrapper fz-18 cl-dk">
        <img src="/images/co2zer_icon.png" alt="co2zer">
        <a href="/">www.skyteam.com</a>
        <a href="/">www.airx.com</a>
    </div>
</footer>
</body>
</html>