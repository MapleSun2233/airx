
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/check_in.css">

</head>
<body>
<header>
    <div class="wrapper">
        <a href="/l"><img src="/images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
                <li><a href="/check_in"><< Cancel</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm fz-14 cl-gr">
            <div class="title-line">
                <b class="cl-md fz-24 bg-wt">{{$guest_name}}'s Ticket</b>
            </div>
            @foreach($result as $item)
            <div class="order br-sm">
                <div class="order-head bg-eee">
                    <span class="order-time cl-999">{{$item['order_time']}}</span>
                    <span class="order-no"><b class="cl-dk">Order No:</b> {{$item['ticket_id']}}</span>
                </div>

                <div class="order-detail flex">
                    <div class="order-col flex">
                        <span class="cl-dk fw-bd">{{$item['from_city']}} - {{$item['to_city']}}</span>
                        <span><b class="cl-dk">Flight No:</b> {{$item['no']}}</span>
                        <span><b class="cl-dk">Departure Time: </b>{{$item['departure_time']}} {{$item['departure_date']}}</span>
                    </div>
                    <div class="order-col ta-ct ct-ctn">
                        <div class="ticket-status ct-ele">
                            <b class="cl-dk">Ticket Status: </b><br>
                            {{$item['ticket_status']}}
                        </div>
                    </div>
                    <div class="order-col ct-ctn">
                        <a href="/select_seat/[{{$item['ticket_id']}}]">
                        @if($item['ticket_status']=='check-in')
                            <button class="check-in-button ct-ele bt-lt br-sm" disabled style='cursor:not-allowed'>CHECK IN &gt;</button>
                        @else
                            <button class="check-in-button ct-ele bt-lt br-sm">CHECK IN &gt;</button>
                        @endif
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<footer>
    <div class="wrapper fz-18 cl-dk">
        <img src="/images/co2zer_icon.png" alt="co2zer">
        <a href="/">www.skyteam.com</a>
        <a href="/">www.airx.com</a>
    </div>
</footer>
</body>
</html>