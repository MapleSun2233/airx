@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/search.css')}}">
@endsection
@section('content')
    <section class="banner" style="height:200px;">
        <div class="wrapper" style="position:relative;text-align: center">
            <form action="/search" method="post" class="search-box flex">
                @csrf
                <div class="field-col">
                <div class="field-name"><b>From</b></div>
                    <div class="field-input">
                        <select title="from" class="input mid" name="from">
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
                    <div class="field-name"><b>To</b></div>
                    <div class="field-input">
                        <select title="to" class="input mid" name="to">
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
                    <div class="field-name"><b>Departure</b></div>
                    <div class="field-input">
                        @if(isset($date))
                            <input type="date" name="date" title="departure_time" class="input mid" value="{{$date}}">
                        @else
                            <input type="date" name="date" title="departure_time" class="input mid" value="">
                        @endif
                    </div>
                </div>
                <div class="field-col">
                    <div class="field-name"><b>Travel Class</b></div>
                    <div class="field-input">
                        <select title="class" class="input mid" name="class">
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
                        <input type="submit" class="submit" value="SEARCH >">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section style="background:#eee;">
        <div class="wrapper">
            @foreach($flights as $flight)
            <div class="flight-info" data-id="{{$flight->id}}">
                <div class="info-no">
                    <div>{{$flight->no}}</div>
                    <div>
                        MODEL <span>{{$flight->type}}</span>
                    </div>
                </div>
                <div class="info-from">
                    <div class="flight-time">{{$flight->time}}</div>
                    <div class="flight-date">{{$flight->date}}</div>
                    <div class="flight-from">{{$flight->from_city}}</div>
                </div>
                <div class="info-arrow">
                    <img src="{{'/images/city_arrow.png'}}" />
                </div>
                <div class="info-to">
                    <div class="flight-from">{{$flight->to_city}}</div>
                </div>
                <div class="info-class flex">
                    <div class="option">
                        <div class="class-name">First Class</div>
                        <div class="class-num">{{$flight->first_total - $flight->first_booked}}</div>
                    </div>
                    <div class="option">
                        <div class="class-name">Business</div>
                        <div class="class-num">{{$flight->business_total - $flight->business_booked}}</div>
                    </div>
                    <div class="option">
                        <div class="class-name">Economic</div>
                        <div class="class-num">{{$flight->economic_total - $flight->economic_booked}}</div>
                    </div>
                </div>
                <button class="buy info-button">BUY NOW &gt;</button>
            </div>
            @endforeach
        </div>
    </section>
    <script>
        $(function () {
            // 选项检测绑定
            let $fromSelect = $("select[name=from]");
            let $toSelect = $("select[name=to]");
            let options = $('.option');
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
            $('.buy').click(function(){
                let id = $(this).parent().data().id;
                let travelClass = $(this).prev().children('.selected');
                if(travelClass.length){
                    travelClass = travelClass.children('.class-name').text();
                    location.href='/buy/'+id+'/'+travelClass;
                }
                else{
                    let alertBox = $('.alert-box');
                    alertBox.text('Please select a travel class first!').fadeIn(500);
                    setTimeout(function(){
                        alertBox.fadeOut(500);
                    },2000);
                }
            });
        });
    </script>
@endsection
