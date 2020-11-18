@extends('base')
@section('link')
    <link rel="stylesheet" href="{{asset('/css/buy.css')}}">
@endsection
@section('content')
    <section style="background:#eee;padding-top:30px;">
		<div class="wrapper">
			<div class="content-container">
				<div class="flight-info">
					<div class="title-line">
						<b>Flight Info</b>
					</div>
					<div class="info-content">
						<div class="flight-no">{{$flight['no']}}</div>
						<div class="flight-model">
							MODEL <span>{{$flight['type']}}</span>
						</div>
						<div class="flight-time">
							<div>{{$flight['time']}}</div>
							<div>{{$flight['date']}}</div>
						</div>
						<div class="flight-from">
                       		 {{$flight['from_city']}}
						</div>
						<div class="info-arrow">
							<img src="/images/city_arrow.png" alt="to">
						</div>
						<div class="flight-to">
                        	{{$flight['to_city']}}
						</div>
						<div class="flight-class">
                            {{$travelClass}}<br>
                            @if($travelClass=='First Class')
                            <span>{{$flight['first_total']-$flight['first_booked']}}</span>
                            @elseif($travelClass=='Business')
                            <span>{{$flight['business_total']-$flight['business_booked']}}</span>
                            @elseif($travelClass=='Economic')
                            <span>{{$flight['economic_total']-$flight['economic_booked']}}</span>
                            @endif
						</div>
					</div>
                </div>
                <div class="flight-info">
                    <div class="title-line">
						<b>Guest Info</b>
                    </div>
                </div>
			</div>
		</div>
    </section>
@endsection