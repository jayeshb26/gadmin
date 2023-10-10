@extends('layout.master')

@section('style')
    <style>
        .table_td td{
            padding: 0 !important;
            border-top: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Sorat</h5>
                    
                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset Balance</span></button>
                </div>
                <div class="card-body">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-xl-8 col-md-12">
                                <div class="box">
                                    <div class="box-header">
                                    </div>
                                    <div id="table" class="table-editable table-responsive">
                                        <table id="user_role_table"
                                            class="table-responsive-md table-striped text-center mb-0 table_td">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="1" value="Amrela"
                                                                class="cards" name="cards">
                                                            <label for="1">
                                                                <img src="{{ asset('assets/images/sorat/Amrela.png') }}"
                                                                    style="width:100px">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="2" value="Ball"
                                                                class="cards" name="cards">
                                                            <label for="2" >
                                                                <img src="{{ asset('assets/images/sorat/Ball.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="3" value="Sun"
                                                                class="cards" name="cards">
                                                            <label for="3" >
                                                                <img src="{{ asset('assets/images/sorat/Sun.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="4" value="Lamp"
                                                                class="cards" name="cards">
                                                            <label for="4" >
                                                                <img src="{{ asset('assets/images/sorat/Lamp.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="5" value="Cow"
                                                                class="cards" name="cards">
                                                            <label for="5">
                                                                <img src="{{ asset('assets/images/sorat/Cow.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="6" value="WatterDoll"
                                                                class="cards" name="cards">
                                                            <label for="6" >
                                                                <img src="{{ asset('assets/images/sorat/WatterDoll.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="1" value="0"
                                                            id="amtAmrela" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="2" value="0"
                                                            id="amtBall" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="3" value="0"
                                                            id="amtSun" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="4" value="0"
                                                            id="amtLamp" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="5" id="amtCow"
                                                        value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="6" id="amtWatterDoll"
                                                        value="0" readonly />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="7" value="Kite"
                                                                class="cards" name="cards">
                                                            <label for="7" >
                                                            <img src="{{ asset('assets/images/sorat/Kite.png') }}" style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="8" value="Gariyo"
                                                                class="cards" name="cards">
                                                            <label for="8" >
                                                                <img src="{{ asset('assets/images/sorat/Gariyo.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="9" value="Rose"
                                                                class="cards" name="cards">
                                                            <label for="9" >
                                                                <img src="{{ asset('assets/images/sorat/Rose.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="10" value="Butterfly"
                                                                class="cards" name="cards">
                                                            <label for="10" >
                                                                <img src="{{ asset('assets/images/sorat/Butterfly.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="11" value="Egle"
                                                                class="cards" name="cards">
                                                            <label for="11" >
                                                                <img src="{{ asset('assets/images/sorat/Egle.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="12" value="Rebit"
                                                                class="cards" name="cards">
                                                            <label for="12" >
                                                                <img src="{{ asset('assets/images/sorat/Rebit.png') }}"
                                                                    style="width:100px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="7" id="amtKite"
                                                        value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="8" id="amtGariyo"
                                                        value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="9" id="amtRose"
                                                        value="0" readonly />
                                                    </td>       
                                                    <td><input type="text" class="form-control" name="10" id="amtButterfly"
                                                        value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="11" value="0"
                                                        id="amtEgle" readonly />
                                                    <td><input type="text" class="form-control" name="12" value="0"
                                                        id="amtRebit" readonly />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Collection: <span id="TCollection">0</span>
                                </p>
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span></p>
                                <form action="{{ route('lucky16config') }}"></form>
                                <p>
                                    <select name="boosterId" id="boosterId" class="browser-default custom-select"
                                        style="width:100%">
                                        @for($i = 1; $i <= 20; $i++)
                                            @if($i==1)
                                                <option value="0">1</option>
                                            @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>   
                                </p>
                                <div class="mt-2 mb-3 d-flex">
                                    <input type="text" class="form-control mr-2" name="SelectedCard" id="SelectedCard"
                                        style="width:100px" readonly />
                                    <input type="hidden" class="form-control mr-2" name="SelectedCardNumber"
                                        id="SelectedCardNumber" style="width:100px" readonly />
                                    <a class="btn btn-success" id="btnSave" name="btnSave">SAVE</a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade" role="alert" id="alertId"></div>
                                <div class="alert alert-danger alert-dismissible fade" role="alert" id="alertIdR"></div>
                                <span id="idRes">Daily Collection & Results</span>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>TOTAL Game Balance: </td>
                                        <td align="right"><span id="tDayCollection"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL COLLECTION: </td>
                                        <td align="right">{{ moneyFormatIndia($daily['totalbetamount']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL PAYMENT :</td>
                                        <td align="right">{{ moneyFormatIndia($daily['totalwonamount']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BALANCE :</td>
                                        <td align="right">{{ moneyFormatIndia($daily['totalbetamount']-$daily['totalwonamount']) }}
                                        </td>
                                    </tr>
                                </table>
                                <table class="tlb table table-bordered"  id="resTab">
                                    <tr id="lastbet">
                                        @for($i = 5; $i < 10; $i++)
                                            <td class="r_color_2" style="font-size:17px;padding-left:0;padding-right: 0;" id="r{{ $i }}"></td>
                                        @endfor
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
@endpush

@push('custom-scripts')
    {{-- <script>
        var vis = (function() {
            var stateKey, eventKey, keys = {
                hidden: "visibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
                msHidden: "msvisibilitychange"
            };
            for (stateKey in keys) {
                if (stateKey in document) {
                    eventKey = keys[stateKey];
                    break;
                }
            }
            return function(c) {
                if (c) {
                    document.addEventListener(eventKey, c);
                    //document.addEventListener("blur", c);
                    //document.addEventListener("focus", c);
                }
                return !document[stateKey];
            }
        })();
        vis(function() {
            // document.title = vis() ? 'Visible' : 'Not visible';
            if (vis()) {
                window.location.reload();
            }
            console.log(new Date, 'visible ?', vis());
        });
        $(document).bind('keydown', function(e) {
            if (e.ctrlKey && (e.which == 83)) {
                e.preventDefault();
                return false;
            }
        });
    </script>
    <script>
        $(document).keydown(function(event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 67) { // Prevent Ctrl+Shift+C
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 74) { // Prevent Ctrl+Shift+J
                return false;
            } else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+U
                return false;
            }
        });
    </script>
    <script language="JavaScript">
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script> --}}
    <script>
        var result = '';
        var gameid = '';
        var card = ["Amrela", 
        "Ball", 
        "Sun",
        "Lamp",
        "Cow",
        "WatterDoll",
        "Kite",
        "Gariyo",
        "Rose",
        "Butterfly",
        "Egle",
        "Rebit"];
        var gameres = [{
            "l-11": 0.0,
            "5": 0.0,
            "l-13": 0.0,
            "k-11": 0.0,
            "k-12": 0.0,
            "k-13": 0.0,
            "c-11": 0.0,
            "c-12": 0.0,
            "c-13": 0.0,
            "f-11": 0.0,
            "f-12": 0.0,
            "f-13": 0.0,
        }];
        var cardsNum = {
            "HJ": 1,
            "SJ": 2,
            "DJ": 3,
            "CJ": 4,
            "HQ": 5,
            "SQ": 6,
            "DQ": 7,
            "CQ": 8,
            "HK": 9,
            "SK": 10,
            "DK": 11,
            "CK": 12,
        };
        
        $('#boosterId').on('change', function() {
            var j = $('#SelectedCardNumber').val();
            $('#totalPayment').html($('#amt' + j).val() * 10 * (this.value==0?1:this.value));
        });
        $(function() {
            var URL;
            URL = "ws://";
            URL += "{{ $response['SOCKET_URL']['host'] }}";
            URL += ":";
            URL += "{{ $response['SOCKET_URL']['port'] }}";
            // console.log(URL);
            const socket = io.connect(URL);
            socket.on("connect", () => {
                console.log(socket.connected); // true
            });
            socket.emit("req",{
                "en" : "ADMIN_LUCKY_SORAT_GAME_INFO",
                "data" : {}
            });
            socket.on('res', function(data){
                let response  = data;
                console.log(response);
                if(response.data.game_state == "game_timer_start"){
                    $('input[type="radio"]').on('click', function() {
                        result = this.value;
                        console.log(result);
                        var boosterIds = $('#boosterId').val();
                        $('#SelectedCard').val(result);
                        $('#check_' + result).attr("checked", "checked");
                        $('#SelectedCardNumber').val(this.value);
                        // $('#TCollection').html($('#c' + key).val());
                        $('#totalPayment').html($('#amt' + this.value).val() * 10 * (boosterIds==0?1:boosterIds));
                    });
                    if(response.data.timer){
                        card.forEach(function(item) {
                            $('#'+item).removeAttr('disabled');
                        });
                        var time = response.data.timer ? response.data.timer : 60;
                        console.log(time);
                        function timerDATA() {
                            time--;
                            document.getElementById('countdown').innerHTML = time;
                            if (time <= 0) {
                                clearInterval(counter);
                                document.getElementById('countdown').innerHTML = "00";
                                card.forEach(function(item) {
                                    $('#amt'+item).val(0);
                                    $('#amt'+item).css("background-color", "transparent");
                                });
                                $('input[type="radio"]').prop("checked", false);
                                $('#SelectedCard').val('');
                                $('#totalPayment').val('');
                                $('#SelectedCardNumber').val('');
                                card.forEach(function(item) {
                                    $('#'+item).attr('disabled','disabled');
                                });
                            }
                        }
                        document.getElementById('GameStatus').innerHTML = response.data.game_state;
                        var counter = setInterval(timerDATA, 1000);
                    }

                    $('#tDayCollection').html(response.data.total_bet_amount.toFixed(2));

                    var total = 0;
                    $.each(response.data.total_bet_on_cards, function(key, value) {
                        total= total+value;
                        $('#amt'+key).val(value);
                        if ($('#amt'+key).val() > 0) {
                            $('#amt'+key).css("background-color", "#FFA07A");
                        } else {
                            $('#amt'+key).css("background-color", "transparent");
                        }
                    });
                    $('#TCollection').html(total.toFixed(2))
                }else{
                    document.getElementById('GameStatus').innerHTML = response.data.game_state;
                    var time = response.data.timer ? response.data.timer : 5;
                    console.log(time);
                    function timerDATA() {
                        time--;
                        document.getElementById('countdown').innerHTML = time;
                        if (time <= 0) {
                            clearInterval(counter);
                            document.getElementById('countdown').innerHTML = "00";
                            gameres.forEach(function(item) {
                                Object.keys(item).forEach(function(key,value) {
                                    $('#'+key).val(0);
                                    $('#'+key).css("background-color","transparent");
                                });
                            });
                            $('input[type="radio"]').prop("checked", false);
                            $('#SelectedCard').val('');
                            $('#totalPayment').val('');
                            $('#SelectedCardNumber').val('');
                            $('#boosterId').val(0);
                        }
                    }
                    var counter = setInterval(timerDATA, 1000);
                    card.forEach(function(item) {
                        $('#'+item).attr('disabled','disabled');
                    });
                }
                var myarr;
                for (let i = 5; i < response.data.last_win_cards.length; i++) {
                    myarr = response.data.last_win_cards[i].split("|");
                    var url = '{{ URL::asset('/assets/images/sorat/') }}/'+ myarr[0]+'.png';
                    // console.log(url);
                    var booster;
                    if (myarr[1] != '1') {
                        booster = myarr[1] + 'X';
                    } else {
                        booster = "N";
                    }
                    $("#r"+i).html('<img src="'+url+'" width="50px" height="50px">' + " | " + booster);
                    
                    $('#booster' + i).html(booster);    
                }

                function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                        $('#alertIdR').removeClass('show');
                    }, 5000);
                }
                
            });
            $('#btnSave').on('click', function() {
                    console.log($('#SelectedCardNumber').val());
                    console.log($('#boosterId').val());
                    $.ajax({
                        type: "POST",
                        url:  "lucky16config",
                        data: {
                            card: $('#SelectedCardNumber').val(),
                            boosterId: $('#boosterId').val(),
                            gametype: 'lucky_sorat',
                            _token: $('input[name="_token"]').val()
                        },
                        success: function(result) {
                            $('#SelectedCard').val('');
                            $('#SelectedCardNumber').val('');
                            $('#alertId').addClass('show');
                            $('#alertId').html("Success");
                            removeAlert();
                            $('#setNo').val('');
                            $('input[type="radio"]').prop("checked", false);
                            $('#boosterId').val(0);
                        },
                        error: function(result) {
                            $('#alertIdR').addClass('show');
                            $('#alertIdR').html(result.responseJSON.errors.card[0]);
                            removeAlert();
                        }
                    });
                });
        });
        $('#reset').on('click', function() {
                $.ajax({
                    type: "POST",
                    url:  "game_configs",
                    data: {
                        gamename: "Sorat",
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(result) {
                        // console.log("vijay");
                        window.location.reload();
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            });
    </script>
@endpush