
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/search.css">
    <script src='/js/jquery-3.1.1.js'></script>
</head>
<body>
<div class="alert-box" style="display: none">
</div>
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

<section class="banner medium">
    <div class="wrapper ct-ctn">
        <form action="/search" method='post' class="search-box flex bg-wt fz-16 ct-ele ta-lt">
            @csrf 
            <div class="field-col">
                <div class="field-name cl-dk"><b>From</b></div>
                <div class="field-input">
                    <select title="from" name='from' class="input mid">
                        <option selected="">Any city</option>
                        @if(isset($from))
                            @foreach($cities as $city)
                                @if($city->city_name == $from)
                                    <option value="{{$city->city_name}}" selected>{{$city->city_name}}</option>
                                @else
                                    <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>To</b></div>
                <div class="field-input">
                    <select title="to" name='to' class="input mid">
                        <option selected="">Select a city</option>
                        @if(isset($to))
                            @foreach($cities as $city)
                                @if($city->city_name == $to)
                                    <option value="{{$city->city_name}}" selected>{{$city->city_name}}</option>
                                @else
                                    <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>Departure</b></div>
                <div class="field-input">
                    @if(isset($date))
                        <input type="date" name="date" title="departure_time" class="input mid" value="{{$date}}">
                    @else
                        <input type="date" name="date" title="departure_time" class="input mid" value="">
                    @endif
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>Travel Class</b></div>
                <div class="field-input">
                    <select title="class" name='class' class="input mid">
                        @if(isset($class))
                            <option>Any class</option>
                            @if($class='First Class')
                                <option selected>First Class</option>
                            @else
                                <option>First Class</option>
                            @endif
                            @if($class='Business Class')
                                <option selected>Business Class</option>
                            @else
                                <option>Business Class</option>
                            @endif
                            @if($class='Economic Class')
                                <option selected>Economic Class</option>
                            @else
                                <option>Economic Class</option>
                            @endif
                        @else
                            <option selected>Any class</option>
                            <option>First Class</option>
                            <option>Business Class</option>
                            <option>Economic Class</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-input">
                    <input type="submit" class="bt-lt" value="SEARCH >">
                </div>
            </div>
        </form>
    </div>
</section>
<main class="bg-eee">
    <div class="wrapper">
        @foreach($flights as $flight)
        <div class="flight-info bg-wt fz-18 br-sm" data-id='{{$flight->id}}'>
            <div class="info1 cl-gr">
                <div class="flight-no">{{$flight->no}}</div>
                <div class="flight-model">
                    MODEL <span class="cl-wt bg-bl fz-8p br-sm pd-hz">{{$flight->type}}</span>
                </div>
            </div>
            <div class="info-from ta-ct">
                <div class="flight-time fz-20 cl-bl">{{$flight->time}}</div>
                <div class="flight-date fz-12 cl-gr">{{$flight->date}}</div>
                <div class="flight-from fz-24 cl-dk">{{$flight->from_city}}</div>
            </div>
            <div class="info-arrow ct-ctn">
                <img src="/images/city_arrow.png" alt="to" class="ct-ele">
            </div>
            <div class="info-to">
                <div class="flight-from fz-24 cl-dk">{{$flight->to_city}}</div>
            </div>
            <div class="info-class flex ta-ct">
                <div class="class-option br-sm">
                    <div class="class-name fz-16 cl-dk">First Class</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->first_total - $flight->first_booked}}</div>
                </div>
                <div class="class-option br-sm">
                    <div class="class-name fz-16 cl-dk">Business</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->business_total - $flight->business_booked}}</div>
                </div>
                <div class="class-option br-sm" >
                    <div class="class-name fz-16 cl-dk">Economic</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->economic_total - $flight->economic_booked}}</div>
                </div>
            </div>
            <div class="info-button">
                <button class="bt-lt br-sm fw-nm fz-16">BUY NOW ></button>
            </div>
        </div>
        @endforeach
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
    $(function () {
        // 选项检测绑定
        let $fromSelect = $("select[name=from]");
        let $toSelect = $("select[name=to]");
        let options = $('.class-option');
        bind($fromSelect,$toSelect)
        bind($toSelect,$fromSelect)

        function bind(dom,dom1) {
            dom.on("change",function () {
                dom1.children().map((i,v)=>{
                    if($(this).val() === $(v).val()){
                        $(v).hide();
                    }else{
                        $(v).show()
                    }
                })
            })
        }
        // class等级选择效果
        options.click(function(){
            for(let i = 0 ; i < options.length ; i++)
                options.eq(i).removeClass('selected');
            if($(this).children().eq(1).text() > 0)
                $(this).addClass('selected');
        });
        $('.info-button button').click(function(){
            let id = $(this).parent().parent().data().id;
            let travelClass = $(this).parent().prev().children('.selected');
            if(travelClass.length){
                travelClass = travelClass.children('.class-name').text();
                location.href='/buy/'+id+'/'+travelClass;
            }else{
                let alertBox = $('.alert-box');
                alertBox.text('Please select a travel class first!').fadeIn(500);
                setTimeout(function(){
                    alertBox.fadeOut(500);
                },2000);
            }
        });
    });
</script>
</body>
</html>