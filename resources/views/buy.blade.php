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
				// 以下未适配完成
				<form class="guest-info" method="post" action="result.html">
					<div class="title-line">
						<b class="cl-md fz-24 bg-wt">Guest Info</b>
					</div>
					<div class="info-content fz-18">
						<div class="guest-list">
							<span class="fw-bd cl-dk">Saved Guests:</span>
							<div class="guest-option br-sm cl-dk bg-lt selected" data-guest="1">Steven Dragon</div>
							<div class="guest-option br-sm cl-dk bg-lt" data-guest="2">Tester I</div>
							<div class="guest-option br-sm cl-dk bg-lt selected" data-guest="3">Tester II</div>
							<div class="add-guest br-sm cl-dk bg-lt">+</div>
						</div>
						<div class="guest-detail flex">
							<div class="guest-form br-sm" data-guest="1">
								<div class="form-row flex">
									<div class="field-name cl-gr">NAME</div>
									<div class="field-input"><input type="text" title="name" class="input mid" name="name" value="Steven Dragon" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">PHONE</div>
									<div class="field-input"><input type="text" title="phone" class="input mid" name="phone" value="1234569874" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">GENDER</div>
									<div class="field-input">
										<select title="gender" class="input mid" name="gender" disabled="">
											<option selected="" value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">ID CARD</div>
									<div class="field-input"><input type="text" title="id_card" class="input mid" name="id_card" value="45648945216545" readonly=""></div>
								</div>
							</div>
							<div class="guest-form br-sm" data-guest="2">
								<div class="form-row flex">
									<div class="field-name cl-gr">NAME</div>
									<div class="field-input"><input type="text" title="name" class="input mid" name="name" value="Tester I" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">PHONE</div>
									<div class="field-input"><input type="text" title="phone" class="input mid" name="phone" value="13164556745" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">GENDER</div>
									<div class="field-input">
										<select title="gender" class="input mid" name="gender" disabled="">
											<option value="m">Male</option>
											<option selected="" value="f">Female</option>
										</select>
									</div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">ID CARD</div>
									<div class="field-input"><input type="text" title="id_card" class="input mid" name="id_card" value="211145587451154221" readonly=""></div>
								</div>
							</div>
							<div class="guest-form br-sm" data-guest="3">
								<div class="form-row flex">
									<div class="field-name cl-gr">NAME</div>
									<div class="field-input"><input type="text" title="name" class="input mid" name="name" value="Tester II" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">PHONE</div>
									<div class="field-input"><input type="text" title="phone" class="input mid" name="phone" value="12345678912" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">GENDER</div>
									<div class="field-input">
										<select title="gender" class="input mid" name="gender" disabled="">
											<option selected="" value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">ID CARD</div>
									<div class="field-input"><input type="text" title="id_card" class="input mid" name="id_card" value="123456789123456789" readonly=""></div>
								</div>
							</div>
							<div class="guest-form br-sm">
								<button type="button" class="remove-button bt-lt br-sm">remove</button>
								<div class="form-row flex">
									<div class="field-name cl-gr">NAME</div>
									<div class="field-input"><input type="text" title="name" class="input mid" name="name"></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">PHONE</div>
									<div class="field-input"><input type="text" title="phone" class="input mid" name="phone"></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">GENDER</div>
									<div class="field-input">
										<select title="gender" class="input mid" name="gender">
											<option value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">ID CARD</div>
									<div class="field-input"><input type="text" title="id_card" class="input mid" name="id_card"></div>
								</div>
							</div>
						</div>
						<div class="confirm ta-rt">
							<button class="bt-lt br-sm">CONFIRM &gt;</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</main>
		<script>
		$(function(){
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