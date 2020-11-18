@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection
@section('content')
    <section class="banner">
        <div class="wrapper">
            <form class="search-form" action="/search" method="post">
                @csrf
                <div class="form-row">
                    <b>Search Flight</b>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label>From</label></div>
                    <div class="field-input">
                        <select title="from" class="input" name="from">
                            <option selected="">Any city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label>To</label></div>
                    <div class="field-input">
                        <select title="to" class="input" name="to">
                            <option selected="">Select a city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label>Departure</label></div>
                    <div class="field-input"><input type="date" title="departure" class="input" name="date"></div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label>Travel Class</label></div>
                    <div class="field-input">
                        <select title="class" class="input" name="class">
                            <option selected="">Any class</option>
                            <option>First Class</option>
                            <option>Business Class</option>
                            <option>Economic Class</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="text-align: right">
                    <input type="submit" class="submit" value="View offers >">
                </div>
            </form>
            <div class="service-introduction">
                <div class="form-row">
                    <b style="color:white">Special  airport  service</b>
                </div>
                <p style="text-transform: uppercase;">
                    Lorem ipsum dolor sit amet, consect etur adipisicing elit. Architecto com modideseNunt ea et temporibus.
                </p>
                <div class="form-row">
                    <a href="#" style="color:#00a1de">Learn more &gt;</a>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper" style="padding:25px 0;">
        <div class="block"><a href="/">My Trip</a></div>
        <div class="block"><a href="/check_in">Check In</a></div>
        <div class="block"><a href="/account">My Account</a></div>
    </section>
    <footer>
        <div class="wrapper">
            <img src="{{asset('/images/co2zer_icon.png')}}" alt="co2zer">
            <a href="/">www.skyteam.com</a>
            <a href="/">www.airx.com</a>
        </div>
    </footer>
    <script>
        $(function () {
            let $fromSelect = $("select[name=from]");
            let $toSelect = $("select[name=to]");

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
        })
    </script>
@endsection

