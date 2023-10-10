@extends('layout.master')

@section('style')
    <style>
        .table_td td {
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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Result</h5>

                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset
                            Balance</span></button>
                </div>
                <div class="card-body">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-sm-12">
                                <div class="box">
                                    <div id="table" class="table-editable table-responsive">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><span class="card-title">Only Numbers</span></td>
                                                </tr>
                                                <tr>
                                                    @for ($i = 1; $i <= 7; $i++)
                                                        <td>
                                                            <div class="form-check-flat form-check-primary">
                                                                <input type="radio" class="form-check-input"
                                                                    width="50px" id="{{ $i }}"
                                                                    value="{{ $i }}" class="cards"
                                                                    name="cards">
                                                                <label for="{{ $i }}"><img
                                                                        src="{{ asset('assets/images/andarbahar/' . $i . '.png') }}"
                                                                        style="width:50px"></label>
                                                            </div>
                                                        </td>
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    @for ($i = 1; $i <= 7; $i++)
                                                        <td><input type="text" class="form-control"
                                                                name="{{ $i }}" value="0"
                                                                id="amt{{ $i }}" readonly />
                                                        </td>
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    @for ($i = 8; $i <= 13; $i++)
                                                        <td>
                                                            <div class="form-check-flat form-check-primary">
                                                                <input type="radio" class="form-check-input"
                                                                    width="50px" id="{{ $i }}"
                                                                    value="{{ $i }}" class="cards"
                                                                    name="cards">
                                                                <label for="{{ $i }}"><img
                                                                        src="{{ asset('assets/images/andarbahar/' . $i . '.png') }}"
                                                                        style="width:50px"></label>
                                                            </div>
                                                        </td>
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    @for ($i = 8; $i <= 13; $i++)
                                                        <td><input type="text" class="form-control"
                                                                name="{{ $i }}" value="0"
                                                                id="amt{{ $i }}" readonly />
                                                        </td>
                                                    @endfor
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="mt-4">
                                            <tbody>
                                                <tr>
                                                    <td><span class="card-title">Color's</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="k" value="k" class="cards" name="colors">
                                                            <label for="k"><img
                                                                    src="{{ asset('assets/images/andarbahar/k.png') }}"
                                                                    style="width:50px;margin: 0 25px;"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="c" value="c" class="cards" name="colors">
                                                            <label for="c"><img
                                                                    src="{{ asset('assets/images/andarbahar/c.png') }}"
                                                                    style="width:50px;margin: 0 25px;"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="f" value="f" class="cards" name="colors">
                                                            <label for="f"><img
                                                                    src="{{ asset('assets/images/andarbahar/f.png') }}"
                                                                    style="width:50px;margin: 0 25px;"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="l" value="l" class="cards" name="colors">
                                                            <label for="l"><img
                                                                    src="{{ asset('assets/images/andarbahar/l.png') }}"
                                                                    style="width:50px;margin: 0 25px;"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="k"
                                                            value="0" id="amtk" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c"
                                                            value="0" id="amtc" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="f"
                                                            value="0" id="amtf" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="l"
                                                            value="0" id="amtl" readonly />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="mt-4">
                                            <tbody>
                                                <tr>
                                                    <td><span class="card-title">Andar Bahar</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="Under" value="Under" class="cards"
                                                                name="andar_bahar">
                                                            <label for="Under"><Span
                                                                    style="font-size: 30px;margin:50px;">Andar</Span></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" width="50px"
                                                                id="Bahar" value="Bahar" class="cards"
                                                                name="andar_bahar">
                                                            <label for="Bahar"><span
                                                                    style="font-size: 30px; margin:50px;">Bahar</span></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="andar"
                                                            value="0" id="amtUnder" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="bahar"
                                                            value="0" id="amtBahar" readonly />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Collection: <span id="TCollection">0</span>
                                </p>
                                <form action="{{ route('lucky16config') }}"></form>
                                <p>
                                    <select name="boosterId" id="boosterId" class="browser-default custom-select"
                                        style="width:100%">
                                        @for ($i = 1; $i <= 20; $i++)
                                            @if ($i == 1)
                                                <option value="0">1</option>
                                            @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </p>
                                <div class="mt-2 mb-3 d-flex">
                                    <input type="text" class="form-control mr-2" name="SelectedCard"
                                        id="SelectedCard" style="width:100px" readonly />
                                    <input type="text" class="form-control mr-2" name="SelectedColor"
                                        id="SelectedColor" style="width:100px" readonly />
                                    <input type="text" class="form-control mr-2" name="Selectedab" id="Selectedab"
                                        style="width:100px" readonly />
                                    <input type="hidden" class="form-control mr-2" name="SelectedCardNumber"
                                        id="SelectedCardNumber" style="width:100px" readonly />
                                    <a class="btn btn-success" id="btnSave" name="btnSave">SAVE</a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade" role="alert" id="alertId">
                                </div>
                                <div class="alert alert-danger alert-dismissible fade" role="alert" id="alertIdR">
                                </div>
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
                                        <td align="right">
                                            {{ moneyFormatIndia($daily['totalbetamount'] - $daily['totalwonamount']) }}
                                        </td>
                                    </tr>
                                </table>
                                <table class="tlb table table-bordered" id="resTab">
                                    <tr id="lastbet">
                                        @for ($i = 0; $i < 5; $i++)
                                            <td class="r_color_2"
                                                style="font-size:17px; padding-left:0px;padding-right:0px"
                                                id="r{{ $i }}"></td>
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

    @push('plugin-scripts')
        {{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script> --}}
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
            var card = ["AH", "AS", "AD", "AC", "KH", "KS", "KD", "KC", "QH", "QS", "QD", "QC", "JH", "JS", "JD", "JC"];
            var gameres = [{
                "l-11": 0.0,
                "l-12": 0.0,
                "l-13": 0.0,
                "l-14": 0.0,
                "k-11": 0.0,
                "k-12": 0.0,
                "k-13": 0.0,
                "k-14": 0.0,
                "c-11": 0.0,
                "c-12": 0.0,
                "c-13": 0.0,
                "c-14": 0.0,
                "f-11": 0.0,
                "f-12": 0.0,
                "f-13": 0.0,
                "f-14": 0.0,
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
                $('#totalPayment').html($('#' + j).val() * 14 * (this.value == 0 ? 1 : this.value));
            });

            function removeAlert() {
                setInterval(function() {
                    $('#alertId').removeClass('show');
                    $('#alertIdR').removeClass('show');
                }, 5000);
            }
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
                socket.emit("req", {
                    "en": "ADMIN_ANDAR_BAHAR_GAME_INFO",
                    "data": {}
                });
                socket.on('res', function(data) {
                    let response = data;
                    console.log(response);
                    if (response.data.game_state == "game_timer_start") {
                        $('input[name="cards"]').on('click', function() {
                            result = this.id;
                            console.log(result);
                            var boosterIds = $('#boosterId').val();
                            $('#SelectedCard').val(result);
                            // $('#TCollection').html($('#c' + key).val());
                            // $('#totalPayment').html($('#c' + key).val() * 14 * boosterIds);
                        });
                        $('input[name="colors"]').on('click', function() {
                            result = this.id;
                            console.log(result);
                            var boosterIds = $('#boosterId').val();
                            $('#SelectedColor').val(result);
                            // $('#TCollection').html($('#c' + key).val());
                            // $('#totalPayment').html($('#c' + key).val() * 14 * boosterIds);
                        });
                        $('input[name="andar_bahar"]').on('click', function() {
                            result = this.id;
                            console.log(result);
                            var boosterIds = $('#boosterId').val();
                            $('#Selectedab').val(result);
                            // $('#TCollection').html($('#c' + key).val());
                            // $('#totalPayment').html($('#c' + key).val() * 14 * boosterIds);
                        });
                        if (response.data.timer) {
                            card.forEach(function(item) {
                                $('#' + item).removeAttr('disabled');
                            });
                            var time = response.data.timer ? response.data.timer : 90;
                            console.log(time);

                            function timerDATA() {
                                time--;
                                document.getElementById('countdown').innerHTML = time;
                                if (time <= 0) {
                                    clearInterval(counter);
                                    document.getElementById('countdown').innerHTML = "00";
                                    for (var i = 1; i <= 13; i++) {
                                        $('#amt' + i).val(0);
                                        $('#amt' + i).css("background-color", "");
                                    }
                                    $('#amtc').val(0);
                                    $('#amtc').css("background-color", "");
                                    $('#amtf').val(0);
                                    $('#amtf').css("background-color", "");
                                    $('#amtk').val(0);
                                    $('#amtk').css("background-color", "");
                                    $('#amtl').val(0);
                                    $('#amtl').css("background-color", "");
                                    $('#amtUnder').val(0);
                                    $('#amtUnder').css("background-color", "");
                                    $('#amtBahar').val(0);
                                    $('#amtBahar').css("background-color", "");
                                    $('input[type="radio"]').prop("checked", false);
                                    $('#SelectedCard').val('');
                                    $('#SelectedColor').val('');
                                    $('#Selectedab').val('');
                                    $('#SelectedCardNumber').val('');
                                    card.forEach(function(item) {
                                        $('#' + item).attr('disabled', 'disabled');
                                    });
                                }
                            }
                            document.getElementById('GameStatus').innerHTML = response.data.game_state;
                            var counter = setInterval(timerDATA, 1000);
                        }
                        $('#tDayCollection').html(response.data.total_bet_amount);

                        var total = 0;
                        $.each(response.data.total_bet_on_cards, function(key, value) {
                            total += value;
                            $('#amt' + key).val(value);
                            if ($('#amt' + key).val() > 0) {
                                $('#amt' + key).css("background-color", "#FFA07A");
                            } else {
                                $('#amt' + key).css("background-color", "transparent");
                            }
                        });
                        $('#TCollection').html(total.toFixed(2));
                    } else {
                        document.getElementById('GameStatus').innerHTML = response.data.game_state;
                        var time = response.data.timer;
                        console.log(time);

                        function timerDATA() {
                            time--;
                            document.getElementById('countdown').innerHTML = time;
                            if (time <= 0) {
                                clearInterval(counter);
                                document.getElementById('countdown').innerHTML = "00";
                                for (var i = 1; i <= 13; i++) {
                                    $('#amt' + i).val(0);
                                    $('#amt' + i).css("background-color", "");
                                }
                                $('#amtc').val(0);
                                $('#amtc').css("background-color", "");
                                $('#amtf').val(0);
                                $('#amtf').css("background-color", "");
                                $('#amtk').val(0);
                                $('#amtk').css("background-color", "");
                                $('#amtl').val(0);
                                $('#amtl').css("background-color", "");
                                $('#amtUnder').val(0);
                                $('#amtUnder').css("background-color", "");
                                $('#amtBahar').val(0);
                                $('#amtBahar').css("background-color", "");
                                $('input[type="radio"]').prop("checked", false);
                                $('#boosterId').val(0);
                            }
                        }
                        var counter = setInterval(timerDATA, 1000);
                        card.forEach(function(item) {
                            $('#' + item).attr('disabled', 'disabled');
                        });
                    }
                    var myarr;
                    for (let i = 0; i < response.data.last_win_cards.length; i++) {
                        myarr = response.data.last_win_cards[i].split("|");
                        var url = '{{ URL::asset('/assets/images/andarbahar/cards/') }}/' + myarr[0] + '.png';
                        // console.log(url);
                        var booster;
                        if (myarr[1] != '1') {
                            booster = myarr[1] + 'X';
                        } else {
                            booster = "N";
                        }
                        $("#r" + i).html('<img src="' + url + '" width="30px">' + " | " + booster);

                        $('#booster' + i).html(booster);
                    }
                });
            });
            $('#btnSave').on('click', function() {
                console.log($('#SelectedColor').val() + "-" + $('#SelectedCard').val());
                console.log($('#Selectedab').val());
                console.log($('#boosterId').val());
                $.ajax({
                    type: "POST",
                    url: "lucky16config",
                    data: {
                        card: $('#SelectedColor').val() + "-" + $('#SelectedCard').val(),
                        ab: $('#Selectedab').val(),
                        boosterId: $('#boosterId').val(),
                        gametype: 'andar_bahar',
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(result) {
                        $('#SelectedCard').val('');
                        $('#SelectedColor').val('');
                        $('#Selectedab').val('');
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
            $('#reset').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "game_configs",
                    data: {
                        gamename: "AndarBahar",
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
@endsection
