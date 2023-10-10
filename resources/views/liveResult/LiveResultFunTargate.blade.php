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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Fun Targate</h5>
                    
                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset Balance</span></button>
                </div>
                <div class="card-body">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-12 col-xl-8">
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
                                                            <input type="radio" class="form-check-input" id="1" value="1"
                                                                class="cards" name="cards">
                                                            <label for="1" style="font-size:75px;">1</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="2" value="2"
                                                                class="cards" name="cards">
                                                            <label for="2" style="font-size:75px;">2</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="3" value="3"
                                                                class="cards" name="cards">
                                                            <label for="3" style="font-size:75px;">3</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="4" value="4"
                                                                class="cards" name="cards">
                                                            <label for="4" style="font-size:75px;">4</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="5" value="5"
                                                                class="cards" name="cards">
                                                            <label for="5" style="font-size:75px;">5</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="1" value="0"
                                                            id="amt1" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="2" value="0"
                                                            id="amt2" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="3" value="0"
                                                            id="amt3" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="4" value="0"
                                                            id="amt4" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="5" id="amt5"
                                                        value="0" readonly />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="6" value="6"
                                                                class="cards" name="cards">
                                                            <label for="6" style="font-size:75px;">6</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="7" value="7"
                                                                class="cards" name="cards">
                                                            <label for="7" style="font-size:75px;">7</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="8" value="8"
                                                                class="cards" name="cards">
                                                            <label for="8" style="font-size:75px;">8</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="9" value="9"
                                                                class="cards" name="cards">
                                                            <label for="9" style="font-size:75px;">9</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="0" value="0"
                                                                class="cards" name="cards">
                                                            <label for="0" style="font-size:75px;">0</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="6" id="amt6"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="7" id="amt7"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="8" id="amt8"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="9" id="amt9"
                                                        value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="0" value="0"
                                                        id="amt0" readonly />
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
    <script>
        var result = '';
        var gameid = '';
        var card = ["AH", "AS", "AD", "AC","KH", "KS", "KD", "KC","QH", "QS", "QD", "QC","JH", "JS", "JD", "JC"];
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
            $('#totalPayment').html($('#amt' + j).val() * 9 *(this.value==0?1:this.value));
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
                "en" : "ADMIN_SINGLE_CHANCE_3D_GAME_INFO",
                "data" : {}
            });
            socket.on('res', function(data){
                let response  = data;
                console.log(response);
                if(response.data.game_state == "game_timer_start"){
                    $('input[type="radio"]').on('click', function() {
                        result = this.id;
                        var boosterIds = $('#boosterId').val();
                        $('#SelectedCard').val(result);
                        $('#check_' + result).attr("checked", "checked");
                        $('#SelectedCardNumber').val(this.value);
                        // $('#TCollection').html($('#c' + key).val());
                        $('#totalPayment').html($('#amt' + this.value).val() * 9 * (boosterIds==0?1:boosterIds));
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
                                for (var i = 0; i <= 9; i++) {
                                    $('#amt'+i).val(0);
                                    $('#amt'+i).css("background-color", "transparent");
                                }
                                $('input[type="radio"]').prop("checked", false);
                                $('#SelectedCard').val('');
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

                    var total =0;
                    $.each(response.data.total_bet_on_cards, function(key, value) {
                        total = total+value;
                        $('#amt'+key).val(value);
                        if ($('#amt'+key).val() > 0) {
                            $('#amt'+key).css("background-color", "#FFA07A");
                        } else {
                            $('#amt'+key).css("background-color", "transparent");
                        }
                    });
                    $('#TCollection').html(total.toFixed(2));
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
            });
            function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                        $('#alertIdR').removeClass('show');
                    }, 5000);
                }
            $('#btnSave').on('click', function() {
                    console.log($('#SelectedCardNumber').val());
                    console.log($('#boosterId').val());
                    $.ajax({
                        type: "POST",
                        url:  "lucky16config",
                        data: {
                            card: $('#SelectedCardNumber').val(),
                            boosterId: $('#boosterId').val(),
                            gametype: 'single_chance',
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
                    gamename: "FunTargate",
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
