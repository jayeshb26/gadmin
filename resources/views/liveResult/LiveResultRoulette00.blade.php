@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ url('css/history.css') }}" rel="stylesheet" type="text/css" />
@endpush


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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Roulette</h5>

                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset Balance</span></button>
                </div>
                <div class="card-body">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 p-0">
                                <div class="box">
                                    <div class="table-responsive">
                                        @php
                                            $no = 0;
                                            $no1 = 0;
                                            $no2 = 0;
                                            $red = [0,3, 1, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
                                            $black = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
                                        @endphp
                                        <div class="" style="height: 500px;">
                                            <table class="table-bordered table_td">
                                                <tbody class="chat-list">
                                                    <tr>
                                                        <td class="text-center">
                                                            <table style="border:2px solid #4f7dda;"
                                                                class="text-center table">
                                                                <tbody style="border:2px solid #4f7dda;">

                                                                    @for ($i = 1; $i <= 4; $i++)
                                                                        <tr class="text-center"
                                                                            style="border:2px solid #4f7dda;">
                                                                            @for ($j = 1; $j <= 10 && $no < 37; $j++)
                                                                                @php
                                                                                    // echo $no;
                                                                                    $check = substr($no, -2);
                                                                                    // $check1 = substr($no,-1);
                                                                                    // echo $win[$k-1];
                                                                                    // die;
                                                                                    $bull = false;
                                                                                    $length = 2;
                                                                                @endphp
                                                                                @if (in_array($no, $red))
                                                                                    @if ($no === 0)
                                                                                        <td class="No" style="padding:0rem 0rem;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                            id="{{ $no }}">
                                                                                            <table style="padding:0;">
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: center">
                                                                                                        <span
                                                                                                            style="font-size:20px;padding-bottom: 1rem;">{{ $no }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00;"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @else
                                                                                        <td class="No"
                                                                                            style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                            id="{{ $no }}">
                                                                                            <table style="padding:0;">
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: center">
                                                                                                        <span
                                                                                                            style="font-size:20px;padding-bottom: 1rem;">{{ $no }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000;"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @endif
                                                                                @else
                                                                                    <td class="No"
                                                                                        style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                        id="{{ $no }}">
                                                                                        <table style="padding:0;">
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    <span
                                                                                                        style="font-size:20px;padding-bottom: 1rem;">{{ $no }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><span
                                                                                                        style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                                                        id='spot{{ $no }}'>0</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                @endif


                                                                                @php
                                                                                    if ($no <= 36) {
                                                                                        $no++;
                                                                                    }
                                                                                @endphp
                                                                            @endfor
                                                                        </tr>
                                                                    @endfor
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Collection: <span id="TCollection">0</span>
                                </p>
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span></p>
                                <form action="#"></form>
                                <p>
                                    <select name="boosterId" id="boosterId" class="browser-default custom-select"
                                        style="width:100%">
                                        @for ($i = 1; $i <= 20; $i++)
                                            @if ($i == 1)
                                                <option value="0" selected>1</option>
                                            @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </p>
                                <div class="mt-2 mb-3 d-flex">
                                    <input type="number" class="form-control mr-2" name="SelectedCard" id="SelectedCard"
                                        style="width:100px" />
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
                                            <td class="r_color_2" style="font-size:17px;" id="r{{ $i }}"></td>
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
        var card = ["AH", "AS", "AD", "AC", "KH", "KS", "KD", "KC", "QH", "QS", "QD", "QC", "JH", "JS", "JD", "JC"];
        var gameres = [{
            "l-11": 0.0,
            "l-12": 0.0,
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
                "en": "ADMIN_ROULETTE_ZERO_GAME_INFO",
                "data": {}
            });

            function pad(s) {
                while (s.length < 3)
                    s = '0' + s;
                return s;
            };
            socket.on('res', function(data) {
                let response = data;
                console.log(response);
                var E = '';
                if (response.data.game_state == "game_timer_start") {
                    $('#win').removeClass('spot' + response.data.win_card);
                    $('#win').html('');
                    $('.No').on('click', function() {
                        result = this.id;
                        for (var i = 0; i < 37; i++) {
                            $('#' + i).css('background-color', '#FFF');
                            $('#00').css('background-color', '#fff');
                        }
                        if (this.id == 00) {
                            $('#' + this.id).css('background-color', '#FFA07A');
                        } else {
                            $('#' + this.id).css('background-color', '#FFA07A');
                        }

                        // console.log(result);
                        var boosterIds = $('#boosterId').val();
                        $('#SelectedCard').val(result);
                        $('#totalPayment').html($('#spot' + this.id).html() * 36);

                        $('#boosterId').val($('#boosterId').val());
                    });
                    $('#boosterId').on('change', function() {
                        var j = $('#SelectedCard').val();
                        $('#totalPayment').html($('#spot' + j).html() * 36 * (this.value==0?1:this.value));
                    });
                    if (response.data.timer) {
                        card.forEach(function(item) {
                            $('#' + item).removeAttr('disabled');
                        });
                        var time = response.data.timer;
                        console.log(time);

                        function timerDATA() {
                            time--;
                            document.getElementById('countdown').innerHTML = time;
                            if (time <= 0) {
                                clearInterval(counter);
                                document.getElementById('countdown').innerHTML = "00";
                                for (var i = 0; i <= 36; i++) {
                                    $('#spot' + i).removeClass('spot' + i);

                                    $('#' + i).css('background-color', '#FFF');
                                    $('#00').css('background-color', '#FFF');
                                    $('#spot' + i).html(00);
                                    $('#spot00').html(00);
                                }
                                $('#spot00').removeClass('spot00');
                                $('#boosterId').val(0);
                                $('#spot00').html('');
                                $('input[type="radio"]').prop("checked", false);
                                $('#SelectedCard').val('');
                                $('#SelectedCardNumber').val('');

                                // window.location.reload();
                            }
                        }
                        document.getElementById('GameStatus').innerHTML = response.data.game_state;
                        var counter = setInterval(timerDATA, 1000);
                    }

                    $('#tDayCollection').html(response.data.total_bet_amount.toFixed(2));

                    var html = '';
                    var total=0;
                    $.each(response.data.total_bet_on_cards, function(key, value) {
                        total = total+value;
                        $('#spot' + key).css('min-width', '25px');
                        $('#spot' + key).css('padding', '3px');
                        $('#spot' + key).html(value.toFixed(2));
                    });
                    $('#TCollection').html(total.toFixed(2));
                } else if (response.data.game_state == "finish_state") {
                    document.getElementById('GameStatus').innerHTML = response.data.game_state;
                    var time = response.data.timer ? response.data.timer : 5;
                    console.log(time);

                    function timerDATA() {
                        time--;
                        document.getElementById('countdown').innerHTML = time;
                        if (time <= 0) {
                            clearInterval(counter);
                            document.getElementById('countdown').innerHTML = "00";
                            for (var i = 0; i <= 36; i++) {
                                $('#spot' + i).removeClass('spot' + i);
                                $('#spot' + i).html(00);
                            }
                            $('No').prop("checked", false);
                            $('#boosterId').val(0);
                        }
                    }
                    var counter = setInterval(timerDATA, 1000);
                    card.forEach(function(item) {
                        $('#' + item).attr('disabled', 'disabled');
                    });

                    $('#win').addClass('spot' + response.data.win_card);
                    $('#win').html('win');
                } else {
                    document.getElementById('GameStatus').innerHTML = response.data.game_state;
                    var time = response.data.timer ? response.data.timer : 5;
                    console.log(time);

                    function timerDATA() {
                        time--;
                        document.getElementById('countdown').innerHTML = time;
                        if (time <= 0) {
                            clearInterval(counter);
                            document.getElementById('countdown').innerHTML = "00";
                            for (var i = 0; i <= 36; i++) {
                                $('#spot' + i).removeClass('spot' + i);
                                $('#spot' + i).html(00);
                                $('#spot00').html(00);
                            }
                            $('No').prop("checked", false);
                            $('#boosterId').val(0);
                        }
                    }
                    var counter = setInterval(timerDATA, 1000);
                    card.forEach(function(item) {
                        $('#' + item).attr('disabled', 'disabled');
                    });
                }
                var myarr;
                for (let i = 5; i < response.data.last_win_cards.length; i++) {
                    myarr = response.data.last_win_cards[i].split("|");
                    // var url = '{{ URL::asset('/asset/images/andarbahar/cards') }}/' + myarr[0] + '.png';
                    // console.log(url);
                    var booster;
                    if (myarr[1] != '1') {
                        booster = myarr[1] + 'X';
                    } else {
                        booster = "N";
                    }
                    $("#r" + i).html(myarr[0] + ' | ' + booster);

                }

                function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                        $('#alertIdR').removeClass('show');
                    }, 5000);
                }
                $('#btnSave').on('click', function() {
                    var card = $('#SelectedCard').val();
                    if (card >= 0 && card <= 36 || card == 00) {
                        console.log($('#SelectedCard').val());
                        console.log($('#boosterId').val());
                        $.ajax({
                            type: "POST",
                            url: "lucky16config",
                            data: {
                                card: $('#SelectedCard').val(),
                                boosterId: $('#boosterId').val(),
                                gametype: 'roulette_zero',
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
                    }
                });
            });
        });
        $('#reset').on('click', function() {
            $.ajax({
                type: "POST",
                url:  "game_configs",
                data: {
                    gamename: "roulette00",
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
