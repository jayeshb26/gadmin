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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Triple Chance</h5>

                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset Balance</span></button>
                </div>
                <div class="card-body">
                    <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 p-0">
                                <div class="box">
                                    <div class="box-header">
                                        <h2>Bet Details</h2>
                                    </div>
                                    <div class="table-responsive">
                                        @php
                                            $no = 0;
                                            $no1 = 0;
                                            $no2 = 0;
                                        @endphp
                                        <div class="" style="height: 500px;">
                                            <table class="table table-bordered table_td">
                                                <tbody class="chat-list">
                                                    @for ($k = 1; $k <= 10; $k++)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $no >= 0 && $no <= 99 ? sprintf('%03d', $no) : $no }}-{{ $no >= 0 && $no <= 99 ? sprintf('%03d', $no + 99) : $no + 99 }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <table style="border:2px solid #4f7dda;"
                                                                    class="text-center ">
                                                                    <tbody style="border:2px solid #4f7dda;">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <tr class="text-center" style="border:2px solid #4f7dda;">
                                                                                @for ($j = 1; $j <= 20; $j++)
                                                                                    @php
                                                                                        // echo $no;
                                                                                        $check = substr($no, -2);
                                                                                        // $check1 = substr($no,-1);
                                                                                        // echo $win[$k-1];
                                                                                        // die;
                                                                                        $bull = false;
                                                                                        $length = 2;
                                                                                    @endphp
                                                                                <td class="No"  style="padding:0.1rem 0.1rem;line-height:1.2rem;cursor: pointer;vertical-align: unset;" id="{{ $no >= 0 && $no <= 99 ? implode('-', str_split(sprintf('%03d', $no), 1)) : implode('-', str_split($no, 1)) }}">
                                                                                    {{ $no >= 0 && $no <= 99 ? implode('-', str_split(sprintf('%03d', $no), 1)) : implode('-', str_split($no, 1)) }}
                                                                                    <br>
                                                                                        <span style="border:1px solid #fff;padding:1px 5px;color:#000;background-color:#D9DDFF;" id='bet_{{ $no >= 0 && $no <= 99 ? implode('-', str_split(sprintf('%03d', $no), 1)) : implode('-', str_split($no, 1)) }}'>00</span>
                                                                                    </td>
                                                                                    @php
                                                                                        $no++;
                                                                                    @endphp
                                                                                @endfor
                                                                            </tr>
                                                                        @endfor
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Collection: <span id="TCollection">0</span>
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
                                <table class="tlb" id="resTab">

                                    @for($i = 1; $i <= 5; $i++)
                                    <tr id="lastbet">
                                            <td class="r_color_2" id="lastNo{{ $i }}"></td>
                                    </tr>
                                    @endfor
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

        $('#boosterId').on('change', function() {
            var j = $('#SelectedCardNumber').val();
            $('#totalPayment').html($('#c' + j).val() * 10 * this.value);
        });
        $(function() {
            var URL;
            URL = "ws://";

            // console.log(URL);
            const socket = io.connect(URL);
            socket.on("connect", () => {
                console.log(socket.connected); // true
            });
            socket.emit("req", {
                "en": "ADMIN_TRIPLE_GAME_INFO",
                "data": {}
            });

            function pad(s)
            {
                while (s.length < 3)
                    s = '0' + s;
                return s;
            };
            socket.on('res', function(data) {
                let response = data;
                console.log(response);
                if (response.data.game_state == "game_timer_start") {
                    var E='';
                    $('.No').on('click', function() {
                        result = this.id;
                        for (var i = 0; i <= 999; i++) {
                            E=pad(''+i);
                            E=E.split('');
                            E=E.join('-');
                            $('#'+E).css('background-color', '#FFF');
                        }
                        $('#'+this.id).css('background-color', '#FFA07A');
                        // console.log(result);
                        var boosterIds = $('#boosterId').val();
                        $('#SelectedCard').val(result);
                        $('#check_' + result).attr("checked", "checked");
                        $('#SelectedCardNumber').val(this.value);
                        $('#boosterId').val($('#boosterId').val());
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
                                for (var i = 0; i <= 999; i++) {
                                    E=pad(''+i);
                                    E=E.split('');
                                    E=E.join('-');
                                    $('#'+E).css('background-color', '#FFF');
                                }
                                $('input[type="radio"]').prop("checked", false);
                                $('#SelectedCard').val('');
                                $('#SelectedCardNumber').val('');
                                window.location.reload();
                            }
                        }
                        document.getElementById('GameStatus').innerHTML = response.data.game_state;
                        var counter = setInterval(timerDATA, 1000);
                    }

                    $('#tDayCollection').html(response.data.total_bet_amount);
                    var total=0;
                    $.each(response.data.total_bet_on_cards, function(key, value) {
                        total = total + value;
                        $('#bet_' + key).html(value);
                        if ($('#bet_' + key).html() > 0) {
                            $('#bet_' + key).css("background-color", "#FFA07A");
                        } else {
                            $('#bet_' + key).css("background-color", "transparent");
                        }
                    });
                    $('#TCollection').html(total);
                } else {
                    document.getElementById('GameStatus').innerHTML = response.data.game_state;
                    var time1 = response.data.timer ? response.data.timer : 5;
                    console.log(time1);

                    function timerDATA() {
                        time1--;
                        document.getElementById('countdown').innerHTML = time1;
                        if (time1 <= 0) {
                            clearInterval(counter);
                            document.getElementById('countdown').innerHTML = "00";
                            for (var i = 0; i <= 999; i++) {
                                E=pad(''+i);
                                E=E.split('');
                                E=E.join('-');
                                $('#'+E).css('background-color', '#FFF');
                            }
                            $('No').prop("checked", false);
                            $('#boosterId').val(0);

                            window.location.reload();
                        }
                    }
                    var counter = setInterval(timerDATA, 1000);
                    card.forEach(function(item) {
                        $('#' + item).attr('disabled', 'disabled');
                    });
                }
                var myarr;
                for (let i = 0; i < response.data.last_win_cards.length; i++) {
                    // myarr = response.data.last_win_cards[i].split("|");
                    // var url = '{{ URL::asset('/img/cards2/') }}/' + myarr[0] + '.png';
                    // console.log(url);
                    $("#lastNo" + i).html(response.data.last_win_cards[i]);
                    // var booster;
                    // if (myarr[1] != '1') {
                    //     booster = myarr[1] + 'X';
                    // } else {
                    //     booster = "N";
                    // }
                    // $('#booster' + i).html(booster);
                }

                function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                        $('#alertIdR').removeClass('show');
                    }, 5000);
                }
            });

            $('#btnSave').on('click', function() {
                console.log($('#SelectedCard').val());
                console.log($('#boosterId').val());
                $.ajax({
                    type: "POST",
                    url: "lucky16config",
                    data: {
                        card: $('#SelectedCard').val(),
                        boosterId: $('#boosterId').val(),
                        gametype: 'triple_chance',
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
                    gamename: "triple_chance",
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
