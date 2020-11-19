
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/index.css">
    <script src='/js/jquery-3.1.1.js'></script>
</head>
<body>
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
<section class="banner">
    <div class="wrapper">
        <form class="search-form" action="/search" method='post'>
            @csrf
            <div class="form-row">
                <b class="cl-dk fz-18 tt-uc">Search Flight</b>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">From</label></div>
                <div class="field-input">
                    <select title="from" class="input" name="from">
                        <option selected>Any city</option>
                        @foreach($cities as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">To</label></div>
                <div class="field-input">
                    <select title="to" class="input" name="to">
                        <option selected>Select a city</option>
                        @foreach($cities as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">Departure</label></div>
                <div class="field-input"><input type="date" title="departure" class="input" name="date"></div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">Travel Class</label></div>
                <div class="field-input">
                    <select title="class" class="input" name="class">
                        <option selected>Any class</option>
                        <option>First Class</option>
                        <option>Business Class</option>
                        <option>Economic Class</option>
                    </select>
                </div>
            </div>
            <div class="form-row ta-rt">
                <input type="submit" class="bt-lt" value="View offers >">
            </div>
        </form>
        <div class="service-intro cl-wt">
            <div class="form-row">
                <b class="fz-18 tt-uc">Special  airport  service</b>
            </div>
            <p class="tt-uc">
                Lorem ipsum dolor sit amet, consect etur adipisicing elit. Architecto com modideseNunt ea et temporibus.
            </p>
            <div class="form-row">
                <a href="#" class="cl-bl">Learn more ></a>
            </div>
        </div>
    </div>
</section>
<main>
    <div class="wrapper cl-wt">
        <div class="block"><a href="/">My Trip</a></div>
        <div class="block"><a href="/check_in">Check In</a></div>
        <div class="block"><a href="/account">My Account</a></div>
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
</body>
</html>