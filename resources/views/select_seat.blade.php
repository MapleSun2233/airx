<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIRX - Best Service Airlines</title>

    <link rel="stylesheet" href="/css/frame.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/formpage.css">
    <link rel="stylesheet" href="/css/select_seat.css">
    <script src="/js/jquery-3.1.1.js"></script>

    <style>
          .left{
               position:relative;
          }
          .left div{
               position:absolute;
          }
          .left div:hover{
               background-color:rgba(100,149,237,0.5);
          }
        .left img {
            height: 295px;
            width: 100%;
            object-fit: cover;
          @if($flight['class_type'] == 'First Class')
               object-position: 0 -100px;
          @elseif($flight['class_type'] == 'Business')
               object-position: 0 -350px;
          @elseif($flight['class_type'] == 'Economic')
               object-position: 0 -800px;
          @endif
            
        }

        .seat {
            position: absolute;
            width: 16px;
            height: 12px;
            border-radius: 3px;
            cursor: pointer;
        }

        .seat:hover {
            background-color: rgba(0, 161, 222, 0.4);
        }

        .seat.selected {
            background-color: rgba(0, 161, 222, 0.6);
        }

        .active .seat.selected {
            cursor: not-allowed;
        }

        .seat.occupied {
            background-color: rgba(255, 40, 0, 0.6);
            cursor: not-allowed;
        }

    </style>

</head>
<body>
<div class="alert-box" style="display: none;width:30em;"></div>
<header>
    <div class="wrapper">
        <a href="/"><img src="/images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
                <li><a href="javascript:history.go(-1)"><< Cancel</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm">
            <div class="title-line">
                <b class="cl-md fz-24 bg-wt">Select Seat</b>
            </div>
            <div class="info-content">
                <div class="left">
                    <img src="/images/300ER_appearance.jpg" alt="plane structure">
                    @if($flight['class_type'] == 'First Class')
                         <div style='width:20px;height:40px;top:100px;left:134px;' data-col='A' data-row='1'></div>
                         <div style='width:20px;height:40px;top:150px;left:134px;' data-col='A' data-row='2'></div>
                         <div style='width:20px;height:40px;top:95px;left:188px;' data-col='D' data-row='1'></div>
                         <div style='width:20px;height:40px;top:145px;left:188px;' data-col='D' data-row='2'></div>
                         <div style='width:20px;height:40px;top:95px;left:210px;' data-col='H' data-row='1'></div>
                         <div style='width:20px;height:40px;top:145px;left:210px;' data-col='H' data-row='2'></div>
                         <div style='width:20px;height:40px;top:100px;left:268px;' data-col='L' data-row='1'></div>
                         <div style='width:20px;height:40px;top:150px;left:268px;' data-col='L' data-row='2'></div>
                    @elseif($flight['class_type'] == 'Business')
                         <div style='width:15px;height:20px;top:60px;left:134px;' data-col='A' data-row='11'></div>
                         <div style='width:15px;height:20px;top:55px;left:150px;' data-col='B' data-row='11'></div>
                         <div style='width:15px;height:20px;top:55px;left:195px;' data-col='C' data-row='11'></div>
                         <div style='width:15px;height:20px;top:60px;left:212px;' data-col='D' data-row='11'></div>
                         <div style='width:15px;height:20px;top:55px;left:255px;' data-col='E' data-row='11'></div>
                         <div style='width:15px;height:20px;top:60px;left:272px;' data-col='H' data-row='11'></div>

                         <div style='width:15px;height:20px;top:90px;left:134px;' data-col='A' data-row='12'></div>
                         <div style='width:15px;height:20px;top:85px;left:150px;' data-col='B' data-row='12'></div>
                         <div style='width:15px;height:20px;top:85px;left:195px;' data-col='C' data-row='12'></div>
                         <div style='width:15px;height:20px;top:90px;left:212px;' data-col='D' data-row='12'></div>
                         <div style='width:15px;height:20px;top:85px;left:255px;' data-col='E' data-row='12'></div>
                         <div style='width:15px;height:20px;top:90px;left:272px;' data-col='H' data-row='12'></div>

                         <div style='width:15px;height:20px;top:120px;left:134px;' data-col='A' data-row='13'></div>
                         <div style='width:15px;height:20px;top:115px;left:150px;' data-col='B' data-row='13'></div>
                         <div style='width:15px;height:20px;top:115px;left:195px;' data-col='C' data-row='13'></div>
                         <div style='width:15px;height:20px;top:120px;left:212px;' data-col='D' data-row='13'></div>
                         <div style='width:15px;height:20px;top:115px;left:255px;' data-col='E' data-row='13'></div>
                         <div style='width:15px;height:20px;top:120px;left:272px;' data-col='H' data-row='13'></div>

                         <div style='width:15px;height:20px;top:150px;left:134px;' data-col='A' data-row='14'></div>
                         <div style='width:15px;height:20px;top:145px;left:150px;' data-col='B' data-row='14'></div>
                         <div style='width:15px;height:20px;top:145px;left:195px;' data-col='C' data-row='14'></div>
                         <div style='width:15px;height:20px;top:150px;left:212px;' data-col='D' data-row='14'></div>
                         <div style='width:15px;height:20px;top:145px;left:255px;' data-col='E' data-row='14'></div>
                         <div style='width:15px;height:20px;top:150px;left:272px;' data-col='H' data-row='14'></div>

                         <div style='width:15px;height:20px;top:180px;left:134px;' data-col='A' data-row='15'></div>
                         <div style='width:15px;height:20px;top:175px;left:150px;' data-col='B' data-row='15'></div>
                         <div style='width:15px;height:20px;top:175px;left:195px;' data-col='C' data-row='15'></div>
                         <div style='width:15px;height:20px;top:180px;left:212px;' data-col='D' data-row='15'></div>
                         <div style='width:15px;height:20px;top:175px;left:255px;' data-col='E' data-row='15'></div>
                         <div style='width:15px;height:20px;top:180px;left:272px;' data-col='H' data-row='15'></div>

                         <div style='width:15px;height:20px;top:210px;left:134px;' data-col='A' data-row='16'></div>
                         <div style='width:15px;height:20px;top:205px;left:150px;' data-col='B' data-row='16'></div>
                         <div style='width:15px;height:20px;top:205px;left:195px;' data-col='C' data-row='16'></div>
                         <div style='width:15px;height:20px;top:210px;left:212px;' data-col='D' data-row='16'></div>
                         <div style='width:15px;height:20px;top:205px;left:255px;' data-col='E' data-row='16'></div>
                         <div style='width:15px;height:20px;top:210px;left:272px;' data-col='H' data-row='16'></div>
                         
                         <div style='width:15px;height:20px;top:240px;left:134px;' data-col='A' data-row='17'></div>
                         <div style='width:15px;height:20px;top:235px;left:150px;' data-col='B' data-row='17'></div>
                         <div style='width:15px;height:20px;top:235px;left:195px;' data-col='C' data-row='17'></div>
                         <div style='width:15px;height:20px;top:240px;left:212px;' data-col='D' data-row='17'></div>
                         <div style='width:15px;height:20px;top:235px;left:255px;' data-col='E' data-row='17'></div>
                         <div style='width:15px;height:20px;top:240px;left:272px;' data-col='H' data-row='17'></div>
                    @elseif($flight['class_type'] == 'Economic')
                         <div style='width:12px;height:15px;top:2px;left:135px;' data-col='A' data-row='37'></div>
                         <div style='width:12px;height:15px;top:2px;left:150px;' data-col='B' data-row='37'></div>
                         <div style='width:12px;height:15px;top:2px;left:165px;' data-col='C' data-row='37'></div>
                         <div style='width:12px;height:15px;top:5px;left:191px;' data-col='D' data-row='37'></div>
                         <div style='width:12px;height:15px;top:5px;left:206px;' data-col='E' data-row='37'></div>
                         <div style='width:12px;height:15px;top:5px;left:221px;' data-col='F' data-row='37'></div>
                         <div style='width:12px;height:15px;top:1px;left:246px;' data-col='G' data-row='37'></div>
                         <div style='width:12px;height:15px;top:1px;left:261px;' data-col='H' data-row='37'></div>
                         <div style='width:12px;height:15px;top:1px;left:276px;' data-col='I' data-row='37'></div>

                         <div style='width:12px;height:15px;top:25px;left:135px;' data-col='A' data-row='38'></div>
                         <div style='width:12px;height:15px;top:25px;left:150px;' data-col='B' data-row='38'></div>
                         <div style='width:12px;height:15px;top:25px;left:165px;' data-col='C' data-row='38'></div>
                         <div style='width:12px;height:15px;top:28px;left:191px;' data-col='D' data-row='38'></div>
                         <div style='width:12px;height:15px;top:28px;left:206px;' data-col='E' data-row='38'></div>
                         <div style='width:12px;height:15px;top:28px;left:221px;' data-col='F' data-row='38'></div>
                         <div style='width:12px;height:15px;top:24px;left:246px;' data-col='G' data-row='38'></div>
                         <div style='width:12px;height:15px;top:24px;left:261px;' data-col='H' data-row='38'></div>
                         <div style='width:12px;height:15px;top:24px;left:276px;' data-col='I' data-row='38'></div>

                         <div style='width:12px;height:15px;top:48px;left:135px;' data-col='A' data-row='39'></div>
                         <div style='width:12px;height:15px;top:48px;left:150px;' data-col='B' data-row='39'></div>
                         <div style='width:12px;height:15px;top:48px;left:165px;' data-col='C' data-row='39'></div>
                         <div style='width:12px;height:15px;top:51px;left:191px;' data-col='D' data-row='39'></div>
                         <div style='width:12px;height:15px;top:51px;left:206px;' data-col='E' data-row='39'></div>
                         <div style='width:12px;height:15px;top:51px;left:221px;' data-col='F' data-row='39'></div>
                         <div style='width:12px;height:15px;top:47px;left:246px;' data-col='G' data-row='39'></div>
                         <div style='width:12px;height:15px;top:47px;left:261px;' data-col='H' data-row='39'></div>
                         <div style='width:12px;height:15px;top:47px;left:276px;' data-col='I' data-row='39'></div>

                         <div style='width:12px;height:15px;top:48px;left:135px;' data-col='A' data-row='40'></div>
                         <div style='width:12px;height:15px;top:48px;left:150px;' data-col='B' data-row='40'></div>
                         <div style='width:12px;height:15px;top:48px;left:165px;' data-col='C' data-row='40'></div>
                         <div style='width:12px;height:15px;top:51px;left:191px;' data-col='D' data-row='40'></div>
                         <div style='width:12px;height:15px;top:51px;left:206px;' data-col='E' data-row='40'></div>
                         <div style='width:12px;height:15px;top:51px;left:221px;' data-col='F' data-row='40'></div>
                         <div style='width:12px;height:15px;top:47px;left:246px;' data-col='G' data-row='40'></div>
                         <div style='width:12px;height:15px;top:47px;left:261px;' data-col='H' data-row='40'></div>
                         <div style='width:12px;height:15px;top:47px;left:276px;' data-col='I' data-row='40'></div>

                         <div style='width:12px;height:15px;top:71px;left:135px;' data-col='A' data-row='41'></div>
                         <div style='width:12px;height:15px;top:71px;left:150px;' data-col='B' data-row='41'></div>
                         <div style='width:12px;height:15px;top:71px;left:165px;' data-col='C' data-row='41'></div>
                         <div style='width:12px;height:15px;top:74px;left:191px;' data-col='D' data-row='41'></div>
                         <div style='width:12px;height:15px;top:74px;left:206px;' data-col='E' data-row='41'></div>
                         <div style='width:12px;height:15px;top:74px;left:221px;' data-col='F' data-row='41'></div>
                         <div style='width:12px;height:15px;top:70px;left:246px;' data-col='G' data-row='41'></div>
                         <div style='width:12px;height:15px;top:70px;left:261px;' data-col='H' data-row='41'></div>
                         <div style='width:12px;height:15px;top:70px;left:276px;' data-col='I' data-row='41'></div>

                         <div style='width:12px;height:15px;top:94px;left:135px;' data-col='A' data-row='42'></div>
                         <div style='width:12px;height:15px;top:94px;left:150px;' data-col='B' data-row='42'></div>
                         <div style='width:12px;height:15px;top:94px;left:165px;' data-col='C' data-row='42'></div>
                         <div style='width:12px;height:15px;top:96px;left:191px;' data-col='D' data-row='42'></div>
                         <div style='width:12px;height:15px;top:96px;left:206px;' data-col='E' data-row='42'></div>
                         <div style='width:12px;height:15px;top:96px;left:221px;' data-col='F' data-row='42'></div>
                         <div style='width:12px;height:15px;top:93px;left:246px;' data-col='G' data-row='42'></div>
                         <div style='width:12px;height:15px;top:93px;left:261px;' data-col='H' data-row='42'></div>
                         <div style='width:12px;height:15px;top:93px;left:276px;' data-col='I' data-row='42'></div>

                         <div style='width:12px;height:15px;top:117px;left:135px;' data-col='A' data-row='43'></div>
                         <div style='width:12px;height:15px;top:117px;left:150px;' data-col='B' data-row='43'></div>
                         <div style='width:12px;height:15px;top:117px;left:165px;' data-col='C' data-row='43'></div>
                         <div style='width:12px;height:15px;top:119px;left:191px;' data-col='D' data-row='43'></div>
                         <div style='width:12px;height:15px;top:119px;left:206px;' data-col='E' data-row='43'></div>
                         <div style='width:12px;height:15px;top:119px;left:221px;' data-col='F' data-row='43'></div>
                         <div style='width:12px;height:15px;top:116px;left:246px;' data-col='G' data-row='43'></div>
                         <div style='width:12px;height:15px;top:116px;left:261px;' data-col='H' data-row='43'></div>
                         <div style='width:12px;height:15px;top:116px;left:276px;' data-col='I' data-row='43'></div>

                         <div style='width:12px;height:15px;top:140px;left:135px;' data-col='A' data-row='44'></div>
                         <div style='width:12px;height:15px;top:140px;left:150px;' data-col='B' data-row='44'></div>
                         <div style='width:12px;height:15px;top:140px;left:165px;' data-col='C' data-row='44'></div>
                         <div style='width:12px;height:15px;top:142px;left:191px;' data-col='D' data-row='44'></div>
                         <div style='width:12px;height:15px;top:142px;left:206px;' data-col='E' data-row='44'></div>
                         <div style='width:12px;height:15px;top:142px;left:221px;' data-col='F' data-row='44'></div>
                         <div style='width:12px;height:15px;top:139px;left:246px;' data-col='G' data-row='44'></div>
                         <div style='width:12px;height:15px;top:139px;left:261px;' data-col='H' data-row='44'></div>
                         <div style='width:12px;height:15px;top:139px;left:276px;' data-col='I' data-row='44'></div>

                         <div style='width:12px;height:15px;top:163px;left:135px;' data-col='A' data-row='45'></div>
                         <div style='width:12px;height:15px;top:163px;left:150px;' data-col='B' data-row='45'></div>
                         <div style='width:12px;height:15px;top:163px;left:165px;' data-col='C' data-row='45'></div>
                         <div style='width:12px;height:15px;top:165px;left:191px;' data-col='D' data-row='45'></div>
                         <div style='width:12px;height:15px;top:165px;left:206px;' data-col='E' data-row='45'></div>
                         <div style='width:12px;height:15px;top:165px;left:221px;' data-col='F' data-row='45'></div>
                         <div style='width:12px;height:15px;top:162px;left:246px;' data-col='G' data-row='45'></div>
                         <div style='width:12px;height:15px;top:162px;left:261px;' data-col='H' data-row='45'></div>
                         <div style='width:12px;height:15px;top:162px;left:276px;' data-col='I' data-row='45'></div>

                         <div style='width:12px;height:15px;top:186px;left:135px;' data-col='A' data-row='46'></div>
                         <div style='width:12px;height:15px;top:186px;left:150px;' data-col='B' data-row='46'></div>
                         <div style='width:12px;height:15px;top:186px;left:165px;' data-col='C' data-row='46'></div>
                         <div style='width:12px;height:15px;top:188px;left:191px;' data-col='D' data-row='46'></div>
                         <div style='width:12px;height:15px;top:188px;left:206px;' data-col='E' data-row='46'></div>
                         <div style='width:12px;height:15px;top:188px;left:221px;' data-col='F' data-row='46'></div>
                         <div style='width:12px;height:15px;top:185px;left:246px;' data-col='G' data-row='46'></div>
                         <div style='width:12px;height:15px;top:185px;left:261px;' data-col='H' data-row='46'></div>
                         <div style='width:12px;height:15px;top:185px;left:276px;' data-col='I' data-row='46'></div>

                         <div style='width:12px;height:15px;top:209px;left:135px;' data-col='A' data-row='47'></div>
                         <div style='width:12px;height:15px;top:209px;left:150px;' data-col='B' data-row='47'></div>
                         <div style='width:12px;height:15px;top:209px;left:165px;' data-col='C' data-row='47'></div>
                         <div style='width:12px;height:15px;top:211px;left:191px;' data-col='D' data-row='47'></div>
                         <div style='width:12px;height:15px;top:211px;left:206px;' data-col='E' data-row='47'></div>
                         <div style='width:12px;height:15px;top:211px;left:221px;' data-col='F' data-row='47'></div>
                         <div style='width:12px;height:15px;top:208px;left:246px;' data-col='G' data-row='47'></div>
                         <div style='width:12px;height:15px;top:208px;left:261px;' data-col='H' data-row='47'></div>
                         <div style='width:12px;height:15px;top:208px;left:276px;' data-col='I' data-row='47'></div>
                    @endif
                                       
                    <p class="ta-lt cl-wt fz-20 hint-text">Select a seat.
                        <button class="bt-lt br-sm btn-ok">OK</button>
                    </p>
                </div>
                <div class="right cl-dk">
                    <p class="fz-24 fw-bd">Flight <em>{{$flight['no']}}</em></p>
                    <p class="fz-24 model-info">
                        <b class="cl-wt bg-bl fz-8p br-sm pd-hz">{{$flight['type']}}</b>
                        <span class="bg-lt br-sm fz-8p ta-ct tt-cp flight-class">
                            {{$flight['class_type']}}
                        </span>
                    </p>
                    <div class="guest-list fz-18">
                        @foreach($tickets as $index=>$ticketID)
                        <div class="guest flex" data-id="{{$ticketID}}">
                            <div class="guest-name">{{$guests[$index]}}</div>
                            <div class="selected-seat cl-gr">
                                Please select a seat.
                            </div>
                            <div class="select-button ct-ctn">
                                <button class="bt-lt br-sm ct-ele">Select</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="cl-gr fz-16">Please confirm all the information before you continue.</p>
                    <form class="fz-18 submit">
                        <p>
                            <button class="bt-lt br-sm">SUBMIT ></button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function isExist(arr,id){
        for(let i = 0 ; i < arr.length ; i++)
            if(arr[i][0] === id)
                return i;
        return false;
    }
    function isConflict(arr){
        for(let i = 0 ; i < arr.length; i++)
            for(let j = 0 ; j < arr.length; j++)
                if(i!=j&&arr[i][1]===arr[j][1])
                    return true;
        return false;
    }
    $(function(){
        let selectData = [];
        $('.select-button>button').click(function (e) {
            $('.left').toggleClass('active');
        });

        $('.btn-ok').click(function (e) {
            $('.left').removeClass('active');
            $('.selected.guest').removeClass('selected');
        });

        $('.seat').click(function (e) {
            e.stopPropagation();
            var t = $(this);
            var left = $('.left');
            if (t.hasClass('occupied') || !left.hasClass("active")) {
                return;
            }
            t.toggleClass('selected');
        });
        $('.left').click(function(e){
          e.preventDefault();
        });
        $('.guest button').click(function(e){
            let _this = $(this);
            $('.left>div').click(function(e){
                let text = _this.parent().prev();
                let id = _this.parent().parent().data().id;
                let position = 'ROW ' + $(this).data().row + ' COL ' + $(this).data().col;
                text.text(position);
                let status = isExist(selectData,id);
                if(status==false)
                    selectData.push([id,position]);
                else
                    selectData[status][1] = position;
            });
        });
        // ok键的按键功能
        $('.left button').click(function(){
            $('.left>div').off();
        });
        // submit按键提交阻止
        $('form>p>button').click(function(e){
            e.preventDefault();
            if(isConflict(selectData)){
                let alertBox = $('.alert-box');
                alertBox.text('The seat has been selected repeatedly. Please try again!').fadeIn(500);
                setTimeout(function(){
                    alertBox.fadeOut(500);
                },2000);
            }else if(selectData.length == 0){
                let alertBox = $('.alert-box');
                alertBox.text('Please select seat first!').fadeIn(500);
                setTimeout(function(){
                    alertBox.fadeOut(500);
                },2000);
            }else{
                $.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}})
                $.ajax({
                    type:'post',
                    url:'/deal_select_result',
                    contentType:'application/json',
                    data:JSON.stringify(selectData),
                    success:function(response){
                        location.href = '/select_result/'+'['+response.toString()+']';
                    }
                });
            }
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