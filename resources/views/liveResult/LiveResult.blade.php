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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Result</h5>
                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset Balance</span></button>
                </div>
                <div class="card-body">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                    </div>
                                    <div id="table" class="table-editable table-responsive">
                                        <table id="user_role_table"
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="{{ asset('img/cards/all_hearts.png') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td><img src="{{ asset('img/cards/all_spades.png') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td><img src="{{ asset('img/cards/all_diamonds.png') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td><img src="{{ asset('img/cards/all_clubs.png') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="AH" value="l-14"
                                                                class="cards" name="cards">
                                                            <label for="AH"><img src="{{ asset('img/cards/l-14.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="AS" value="k-14"
                                                                class="cards" name="cards">
                                                            <label for="AS"><img src="{{ asset('img/cards/k-14.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="AD" value="c-14"
                                                                class="cards" name="cards">
                                                            <label for="AD"><img src="{{ asset('img/cards/c-14.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="AC" value="f-14"
                                                                class="cards" name="cards">
                                                            <label for="AC"><img src="{{ asset('img/cards/f-14.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="l-14" value="0"
                                                            id="l-14" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="k-14" value="0"
                                                            id="k-14" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c-14" value="0"
                                                            id="c-14" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="f-14" value="0"
                                                            id="f-14" readonly />
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="KH" value="l-13"
                                                                class="cards" name="cards">
                                                            <label for="KH"><img src="{{ asset('img/cards/l-13.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="KS" value="k-13"
                                                                class="cards" name="cards">
                                                            <label for="KS"><img src="{{ asset('img/cards/k-13.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="KD" value="c-13"
                                                                class="cards" name="cards">
                                                            <label for="KD"><img src="{{ asset('img/cards/c-13.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="KC" value="f-13"
                                                                class="cards" name="cards">
                                                            <label for="KC"><img src="{{ asset('img/cards/f-13.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="l-13" value="0"
                                                            id="l-13" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="k-13" value="0"
                                                            id="k-13" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c-13" value="0"
                                                            id="c-13" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="f-13" value="0"
                                                            id="f-13" readonly />
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="QH" value="l-12"
                                                                class="cards" name="cards">
                                                            <label for="QH"><img src="{{ asset('img/cards/l-12.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="QS" value="k-12"
                                                                class="cards" name="cards">
                                                            <label for="QS"><img src="{{ asset('img/cards/k-12.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="QD" value="c-12"
                                                                class="cards" name="cards">
                                                            <label for="QD"><img src="{{ asset('img/cards/c-12.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="QC" value="f-12"
                                                                class="cards" name="cards">
                                                            <label for="QC"><img src="{{ asset('img/cards/f-12.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="l-12" id="l-12"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="k-12" id="k-12"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c-12" id="c-12"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="f-12" id="f-12"
                                                            value="0" readonly />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="JH" value="l-11"
                                                                class="cards" name="cards">
                                                            <label for="JH"><img src="{{ asset('img/cards/l-11.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="JS" value="k-11"
                                                                class="cards" name="cards">
                                                            <label for="JS"><img src="{{ asset('img/cards/k-11.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="JD" value="c-11"
                                                                class="cards" name="cards">
                                                            <label for="JD"><img src="{{ asset('img/cards/c-11.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="JC" value="f-11"
                                                                class="cards" name="cards">
                                                            <label for="JC"><img src="{{ asset('img/cards/f-11.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="l-11" id="l-11"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="k-11" id="k-11"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c-11" id="c-11"
                                                            value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="f-11" id="f-11"
                                                            value="0" readonly />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
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
                                <table class="tlb" id="resTab">
                                    <tr id="lastbet">
                                        @for($i = 5; $i <= 9; $i++)
                                            <td class="r_color_2"><img id="<?php echo 'img' .$i; ?>" width="40px">
                                            </td>
                                            <td align="center" class="r_color_1"><strong id="<?php echo 'booster'.$i; ?>"></strong>
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
            var card = ["AH", "AS", "AD", "AC","KH", "KS", "KD", "KC","QH", "QS", "QD", "QC","JH", "JS", "JD", "JC"];
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
                "AH":"l-14",
                "AS":"k-14",
                "AD":"c-14",
                "AC":"f-14",
                "KH":"l-13",
                "KS":"k-13",
                "KD":"c-13",
                "KC":"f-13",
                "QH":"l-12",
                "QS":"k-12",
                "QD":"c-12",
                "QC":"f-12",
                "JH":"l-11",
                "JS":"k-11",
                "JD":"c-11",
                "JC":"f-11",
            };
            
            $('#boosterId').on('change', function() {
                var j = $('#SelectedCardNumber').val();
                $('#totalPayment').html($('#'+j).val() * 14 * (this.value==0?1:this.value));
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
                socket.emit("req",{
                    "en" : "ADMIN_LUCKY_CARD_GAME_INFO",
                    "data" : {}
                });
                socket.on('res', function(data){
                    let response  = data;
                    console.log(response);
                    if(response.data.game_state == "game_timer_start"){
                        $('input[type="radio"]').on('click', function() {
                            result = this.id;
                            var key = cardsNum[result];
                            var boosterIds = $('#boosterId').val();
                            boosterIds = (boosterIds==0?1:boosterIds);
                            $('#SelectedCard').val(result);
                            $('#check_' + result).attr("checked", "checked");
                            $('#SelectedCardNumber').val(this.value);
                            $('#boosterId').val($('#boosterId').val());
                            // $('#TCollection').html($('#c' + key).val());
                            // console.log($('#' + key).val()*14);
                            // console.log(boosterIds);
                            $('#totalPayment').html($('#'+key).val() * 14* boosterIds);
                        });
                        if(response.data.timer){
                            card.forEach(function(item) {
                                $('#'+item).removeAttr('disabled');
                            });
                            var time = response.data.timer ? response.data.timer : 90;
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
                                    $('#SelectedCardNumber').val('');
                                    $('#totalPayment').html('');
                                    card.forEach(function(item) {
                                        $('#'+item).attr('disabled','disabled');
                                    });
                                }
                            }
                            document.getElementById('GameStatus').innerHTML = response.data.game_state;
                            var counter = setInterval(timerDATA, 1000);
                        }
                        $('#tDayCollection').html(response.data.total_bet_amount);

                        var total=0;
                        $.each(response.data.total_bet_on_cards, function(key, value) {
                            total = total+value;
                            $('#'+key).val(value);
                            if ($('#'+key).val() > 0) {
                                $('#'+key).css("background-color", "#FFA07A");
                            } else {
                                $('#'+key).css("background-color", "transparent");
                            }
                        });
                        $('#TCollection').html(total);
                    }else{
                        document.getElementById('GameStatus').innerHTML = response.data.game_state;
                        var time = response.data.timer;
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
                        var url = '{{ URL::asset('/img/cards2/') }}/'+ myarr[0]+'.png';
                        // console.log(url);
                        $("#img"+i).attr("src", url);
                        var booster;
                        if (myarr[1] != '1') {
                            booster = myarr[1] + 'X';
                        } else {
                            booster = "N";
                        }
                        $('#booster' + i).html(booster);
                    }
                });
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
                        gametype: 'lucky_cards_16',
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
            $('#reset').on('click', function() {
                $.ajax({
                    type: "POST",
                    url:  "game_configs",
                    data: {
                        gamename: "lucky_cards_16",
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