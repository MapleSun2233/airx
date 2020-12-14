<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>AIRX - Best Service Airlines</title>
		<link rel="stylesheet" href="/css/frame.css">
		<link rel="stylesheet" href="/css/default.css">
		<link rel="stylesheet" href="/css/formpage.css">
		<link rel="stylesheet" href="/css/buy_info.css">
		<script src="/js/jquery-3.1.1.js"></script>
	</head>
	<body>
		<div class="alert-box" style="display: none"></div>
		<header>
			<div class="wrapper">
				<a href="/"><img src="/images/airx_logo.png" alt="logo" class="logo"></a>
				<nav>
					<ul class="cl-dk">
						<li><a href="/"><< Cancel</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main class="bg-eee">
		<div class="wrapper">
			<div class="content-container bg-wt br-sm">
				<div class="flight-info fz-18 cl-gr">
					<div class="title-line">
						<b class="cl-md fz-24 bg-wt">Flight Info</b>
					</div>
					<div class="info-content">
						<div class="flight-no fz-24 cl-dk fs-it">{{$flight['no']}}</div>
						<div class="flight-model">
							MODEL <span class="cl-wt bg-bl fz-8p br-sm pd-hz">{{$flight['type']}}</span>
						</div>
						<div class="flight-time ta-ct">
							<div class="fz-20 cl-bl">{{$flight['time']}}</div>
							<div class="fz-14 cl-gr">{{$flight['date']}}</div>
						</div>
						<div class="flight-from fz-24 cl-dk ta-rt">
							{{$flight['from_city']}}
						</div>
						<div class="info-arrow">
							<img src="/images/city_arrow.png" alt="to">
						</div>
						<div class="flight-to fz-24 cl-dk">
							{{$flight['to_city']}}
						</div>
						<div class="flight-class cl-dk bg-lt br-sm ta-ct tt-cp">
							{{$travelClass}}<br>
							@if($travelClass=='First Class')
                            <span class="fz-24 cl-bl">{{$flight['first_total']-$flight['first_booked']}}</span>
                            @elseif($travelClass=='Business')
                            <span class="fz-24 cl-bl">{{$flight['business_total']-$flight['business_booked']}}</span>
                            @elseif($travelClass=='Economic')
                            <span class="fz-24 cl-bl">{{$flight['economic_total']-$flight['economic_booked']}}</span>
                            @endif
						</div>
					</div>
				</div>
				<form class="guest-info" method="post" action="/dealbuyinfo">
				@csrf
				<input style='display:none;' type="text" name='flight_id' value="{{$flight['id']}}" />
				<input style='display:none;' type="text" name='travel_class' value="{{$travelClass}}" />
					<div class="title-line">
						<b class="cl-md fz-24 bg-wt">Guest Info</b>
					</div>
					<div class="info-content fz-18">
						<div class="guest-list">
							<span class="fw-bd cl-dk">Saved Guests:</span>
							@foreach($guests as $guest)
								<div class="guest-option br-sm cl-dk bg-lt" data-id="{{$guest['id']}}" onclick='changeClass(this)'>
									<input style='display:none;' type="checkbox" value="{{$guest['id']}}" name='guests[]' />
									{{$guest['guest_name']}}
								</div>
							@endforeach
							<div class="add-guest br-sm cl-dk bg-lt">+</div>
						</div>
						<div class="guest-detail flex">
							
						</div>
						<div class="confirm ta-rt">
							<button class="bt-lt br-sm" type='submit'>CONFIRM &gt;</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</main>
		<script>
		let newGuestTemplate = "<div class='guest-form br-sm'><button type='button' class='remove-button bt-lt br-sm' onclick='removeSelf(this)'>remove</button><div class='form-row flex'><div class='field-name cl-gr'>NAME</div><div class='field-input'><input type='text' title='name' class='input mid' name='name[]' required></div></div><div class='form-row flex'><div class='field-name cl-gr'>PHONE</div><div class='field-input'><input type='text' title='phone' class='input mid' name='phone[]' required></div></div><div class='form-row flex'><div class='field-name cl-gr'>GENDER</div><div class='field-input'><select title='gender' class='input mid' name='gender[]'><option value='male'>Male</option><option value='female'>Female</option></select></div></div><div class='form-row flex'><div class='field-name cl-gr'>ID CARD</div><div class='field-input'><input type='text' title='id_card' class='input mid' name='id[]' required></div></div></div>";
		function removeSelf(btn){
			$(btn).parent().remove();
		}
		function changeClass(div){
			if($(div).hasClass('selected'))
				$(div).removeClass('selected').children().get(0).checked = false;
			else
				$(div).addClass('selected').children().get(0).checked = true;
		}
		$(function(){
			$('.add-guest').click(function(){
				$('.guest-detail').append($(newGuestTemplate));
			});
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