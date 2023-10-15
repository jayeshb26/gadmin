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
                <div class="card-header d-flex justify-content-between" style="background: green">
                    <h5 class=" text-white text-align-center" style="text-transform: none !important; text-align:center">
                        FunRoulette</h5>
                    <div id="status">Connecting...</div>

                    <button type='button' id="reset" class="btn text-white btn-outline-light"
                        style="background: #1B0905"><span aria-hidden='true'>Reset
                            Balance</span></button>
                </div>
                <div class="card-body"
                    style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); color:black">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-lg-9 col-md-10 p-5" style="background-color: #1B0905" id="table">
                                <div class="box">
                                    <div class="table-responsive table-borderless ">
                                        @php
                                            $no = 0;
                                            $no1 = 0;
                                            $no2 = 0;
                                            $red = [0, 3, 1, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
                                            $black = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
                                        @endphp
                                        <div class="" style="height: 500px;">
                                            <table class="table-responsive table_td">
                                                <tbody class="chat-list">
                                                    <tr>
                                                        <td class="text-center">
                                                            <table style="border:2px solid #ffffff;"
                                                                class="text-center table">
                                                                <tbody style="border:2px solid #ffffff;">

                                                                    @for ($i = 1; $i <= 4; $i++)
                                                                        <tr class="text-center"
                                                                            style="border:2px solid #FFFFFF;">
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
                                                                                        <td class="No"
                                                                                            style="padding:0rem 0rem;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                            id="{{ $no }}">
                                                                                            <table style="padding:0;">
                                                                                                <tr>
                                                                                                    <td class="No"
                                                                                                        style="text-align: center">
                                                                                                        <span
                                                                                                            style="font-size:20px;padding-bottom: 1rem; color:#fff">{{ $no }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00; color:#fff"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @else
                                                                                        <td class="No"
                                                                                            style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
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
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @endif
                                                                                @else
                                                                                    <td class="No"
                                                                                        style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                                                        id="{{ $no }}">
                                                                                        <table style="padding:0;">
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    <span
                                                                                                        style="font-size:20px;padding-bottom: 1rem; color:#fff">{{ $no }}</span>
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
                                                                                    if ($no <= 37) {
                                                                                        $no++;
                                                                                    }
                                                                                @endphp
                                                                            @endfor
                                                                            @if ($no == 37)
                                                                                <td class="No"
                                                                                    style="padding:0rem 0rem !important;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                    id="00">
                                                                                    <table style="padding:0;">
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                <span
                                                                                                    style="font-size:20px;padding-bottom: 1rem; color:#fff">00</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span
                                                                                                    style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00;"
                                                                                                    id='spot00'>0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            @endif
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
                            <div class="col-md-3 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Collection: <span id="TCollection">0</span>
                                </p>
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span></p>
                                <form action=""></form>
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
                                        @for ($i = 5; $i < 10; $i++)
                                            <td class="r_color_2" style="font-size:17px;" id="r{{ $i }}">
                                            </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.js"></script>
@endpush

@push('custom-scripts')
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.0/socket.io.js"></script>
    <script>
        $(function() {
            const socket = io.connect('ws://143.244.140.74:9000');
            console.log(socket + "Hello Socket Connected");

            socket.on('connect', function() {
                const user = {
                    adminId: "603388bb7d20e50a81217277",
                    gameName: "funroulette",
                };
                $('.No').on('click', function() {
                    result = this.id;
                    console.log('hello i am clicked');
                    for (var i = 0; i < 37; i++) {
                        $('#' + i).css('background-color', '#00000000');
                        $('#00').css('background-color', '#00000000');
                    }
                    if (this.id == 00) {
                        $('#' + this.id).css('background-color', 'green');
                    } else {
                        $('#' + this.id).css('background-color', 'red');
                    }
                    var boosterIds = $('#boosterId').val();
                    $('#SelectedCard').val(result);
                    $('#totalPayment').html((parseFloat($('#spot' + this.id).html()) * 36).toFixed(
                        2));
                    $('#boosterId').val($('#boosterId').val());
                });

                socket.emit('joinAdmin', user);

                var cardNumber = 0;
                var y = 1;
                var gameName = "funroulette";

                function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                    }, 5000);
                }
                $('#btnSave').on('click', function() {
                    var boosterId = $('#boosterId').val();
                    var card = $('#SelectedCardNumber').val();
                    cardNumber = parseInt(card);
                    y = parseInt(boosterId);
                    if (cardNumber != "" && y != "") {
                        $('#alertId').addClass('show');
                        $('#alertId').html("Success");
                        removeAlert();
                        console.log({
                            cardNumber,
                            y,
                            gameName
                        });
                        socket.emit('winByAdmin', {
                            cardNumber,
                            y,
                            gameName
                        });
                    }
                });

                socket.on('resAdmin', (res) => {
                    console.log(res);
                    if (res.gameName == "funroulette") {
                        console.log(res);
                        if (res.time >= 0) {
                            var seconds = parseInt(Math.abs(res.time) - 60);
                            seconds = Math.abs(seconds);
                            var countdownTimer = setInterval(function() {
                                if (seconds <= 0) {
                                    window.location.reload();
                                    gameres.forEach(function(item) {
                                        Object.keys(item).forEach(function(key) {
                                            $('#c' + key).val(0);
                                            $('#c' + key).css(
                                                "background-color",
                                                "transparent"
                                            );
                                        });
                                    });
                                    $('input[type="radio"]').prop("checked", false);
                                    $('#alertId').removeClass('show');
                                    $('#SelectedCard').val('');
                                    $('#SelectedCardNumber').val('');
                                    $('#TCollection').html('');
                                    $('#totalPayment').html('');
                                    clearInterval(countdownTimer);
                                    window.location.reload();
                                }
                                document.getElementById('countdown').innerHTML = seconds;
                                seconds -= 1;
                            }, 1024);
                        }

                        var resAdminData = res.data.position;
                        for (var key in resAdminData) {
                            if (resAdminData.hasOwnProperty(key)) {
                                var id = key;
                                var value = parseFloat(resAdminData[key]).toFixed(2);
                                var element = document.getElementById('spot' + id);
                                if (element) {
                                    element.innerHTML = value;
                                }
                            }
                        }
                    }
                });

                socket.on('resAdminBetData', (res) => {
                    console.log(res.data);
                    if (res.gameName == "funroulette") {
                        // Handle 'resAdminBetData' event as needed
                    }
                });
            });
        });
    </script>



    {{--  <script>
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
        $('.No').on('click', function() {
            result = this.id;
            {{--  console.log('hello i am clicked');  --}}
    {{-- for (var i = 0; i < 37; i++) {
                $('#' + i).css('background-color', '#00000000');
                $('#00').css('background-color', '#00000000');
            }
            if (this.id == 00) {
                $('#' + this.id).css('background-color', 'green');
            } else {
                $('#' + this.id).css('background-color', 'red');
            }
            // console.log(result);
            var boosterIds = $('#boosterId').val();
            $('#SelectedCard').val(result);
            $('#totalPayment').html($('#spot' + this.id).html() * 36);
            $('#boosterId').val($('#boosterId').val());
        });

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
                    url: "funroulette",
                    data: {
                        card: $('#SelectedCard').val(),
                        boosterId: $('#boosterId').val(),
                        gametype: 'roulette',
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
        $('#reset').on('click', function() {
            $.ajax({
                type: "POST",
                url: "game_configs",
                data: {
                    gamename: "funroulette",
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
    </script>  --}}
@endpush
