@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection
@section('content')
    <div class="banner" style="height:200px">
        <div class="wrapper">
            <h1>USER CENTER</h1>
        </div>
    </div>
    <div class="wrapper">
        <p style="line-height:2em;font-size:30px;display: flex;justify-content: space-between;">
            <b style="color:orange;font-size:inherit;">
                Welcome back, {{$userData['username']}}.
            </b>
            <a href="/exit" style="font-size:25px;cursor: pointer" class="submit">Login Out</a>
        </p>
        <ul class="tabs">
            <li><a class="active" data-key='first'>PROFILE</a></li>
            <li><a data-key='second'>GUESTS</a></li>
        </ul>
        <form action="/edit" method="post" id='profile'>
            @csrf
            <div class="form-row flex">
                <div class="field-name"><label>E-MAIL</label></div>
                <div class="field-name">
                    <label>{{$userData['email']}}</label>
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
                    @if($userData['gender'] == 'Female')
                        <select name="gender" class="input">
                            <option value="Female" selected>Female</option>
                            <option value="Male">Male</option>
                        </select>
                    @elseif($userData['gender'] == 'Male')
                        <select name="gender" class="input">
                            <option value="Female">Female</option>
                            <option value="Male" selected>Male</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label>PHONE</label></div>
                <div class="field-input">
                    <input type="number" class="input" name="phone" value="{{$userData['phone']}}" required>
                </div>
            </div>
            <div class="form-row" style="text-align: right">
                <input type="submit" class="submit" value="submit" >
            </div>
        </form>
        <ul  id="guests" style='display:none;'>
            @foreach($guestsData as $guest)
            <li>
                <div class="guest-info">
                    <div class="guest-name">
                        <input type="text" title="name" class="input big" value="{{$guest['guest_name']}}">
                    </div>
                    <div class="guest-detail">
                        <div class="form-group">
                            <label>MOBILE: </label>
                            <input type="tel" title="phone" class="input mid" value="{{$guest['guest_phone']}}">
                        </div>
                        <div class="form-group">
                            <label>ID CARD: </label>
                            <input type="text" title="id" class="input mid" value="{{$guest['guest_card']}}">
                        </div>
                        <div class="form-group">
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
                        <button class="guest-btn" title='modify' data-id='{{$guest["id"]}}'>MODIFY &gt;</button>
                        <button class="guest-btn" title='delete' data-id='{{$guest["id"]}}'>DELETE &gt;</button>
                    </div>
                </div>
            </li>
            @endforeach
            
        </ul>
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

            // 用户信息区切换
            $('.tabs>li>a').click(function(event){
                $(this).addClass('active').parent().siblings().children().attr('class','');
                let key = $(this).data('key');
                switch(key)
                {
                    case 'first':
                        $('#profile').slideDown();
                        $('#guests').slideUp();
                        break;
                    case 'second':
                        $('#profile').slideUp();
                        $('#guests').slideDown();
                        break;
                }
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
                let li = $(btn).parent().parent().parent();
                li.remove();
            }
            $('.guest-btn[title="modify"]').click(function(){
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
                            alert('update success!');
                        },
                        error:function(e){
                            alert('response error!');
                        }
                    });
                }
            });
            $('.guest-btn[title="delete"]').click(function(){
                let status = confirm('Are you sure you want to delete?');
                let _this = this;
                if(status){
                    let id = $(_this).data('id');
                    $.ajax({
                        type:'get',
                        url:'/deleteguest/?id='+id,
                        success:function(response){
                            deleteGuest(_this);
                            alert('delete success!');
                        },
                        error:function(e){
                            alert('delete error!');
                        }
                    });
                }
            });
        });
    </script>
@endsection
