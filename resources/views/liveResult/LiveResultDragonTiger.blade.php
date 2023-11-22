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
                    <h5 class="col-sm-2 card-title" style="text-transform: none !important;">Dragon Tiger</h5>
                    <button type='button' id="reset" class="btn btn-primary"><span aria-hidden='true'>Reset
                            Balance</span></button>
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
                                            class="table-responsive-md table-striped text-center mb-0 table_td">
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
                                                    <td><img src="{{ asset('img/dragon/d.jpeg') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td><img src="{{ asset('img/dragon/te.jpeg') }}"
                                                            style="width:70px">
                                                    </td>
                                                    <td><img src="{{ asset('img/dragon/t.jpeg') }}"
                                                            style="width:70px">
                                                    </td>
                                                    {{--  <td><img src="{{ asset('img/cards/all_clubs.png') }}"
                                                            style="width:70px">
                                                    </td>  --}}
                                                    {{--  <td></td>  --}}
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
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="D"
                                                                value="l-13" class="cards" name="cards">
                                                            <label for="D"><img
                                                                    src="{{ asset('img/dragon/dragon.jpeg') }}"
                                                                    style="width:120px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="Tie"
                                                                value="k-13" class="cards" name="cards">
                                                            <label for="Tie"><img
                                                                    src="{{ asset('img/dragon/tie.jpeg') }}"
                                                                    style="width:120px"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="T"
                                                                value="c-13" class="cards" name="cards">
                                                            <label for="T"><img
                                                                    src="{{ asset('img/dragon/tiger.jpeg') }}"
                                                                    style="width:120px"></label>
                                                        </div>
                                                    </td>
                                                    {{--  <td>
                                                        <div class=" form-check-flat form-check-primary">
                                                            <input type="radio" class="form-check-input" id="KC"
                                                                value="f-13" class="cards" name="cards">
                                                            <label for="KC"><img
                                                                    src="{{ asset('img/cards/f-13.png') }}"
                                                                    style="width:50px"></label>
                                                        </div>
                                                    </td>  --}}
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="l-13"
                                                            value="0" id="l-13" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="k-13"
                                                            value="0" id="k-13" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="c-13"
                                                            value="0" id="c-13" readonly />
                                                    </td>
                                                    {{--  <td><input type="text" class="form-control" name="f-13"
                                                            value="0" id="f-13" readonly />
                                                    </td>  --}}
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
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span>
                                </p>
                                {{--  <form action="{{ route('lucky16config') }}"></form>  --}}
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
                                <table class="tlb" id="resTab">
                                    <tr id="lastbet">
                                        @for ($i = 5; $i <= 9; $i++)
                                            <td class="r_color_2"><img id="<?php echo 'img' . $i; ?>" width="40px">
                                            </td>
                                            <td align="center" class="r_color_1"><strong
                                                    id="<?php echo 'booster' . $i; ?>"></strong>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
@endpush

@push('custom-scripts')
    <script>
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
    </script>
    <script>
        var result = '';
        var gameid = '';
        var card = ["AH", "AS", "AD", "AC", "D", "Tie", "T", "KC", "QH", "QS", "QD", "QC", "JH", "JS", "JD", "JC"];
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
            "D": "l-13",
            "Tie": "k-13",
            "T": "c-13",
            "KC": "f-13",
            "QH": "l-12",
            "QS": "k-12",
            "QD": "c-12",
            "QC": "f-12",
            "JH": "l-11",
            "JS": "k-11",
            "JD": "c-11",
            "JC": "f-11",
        };

        $('#boosterId').on('change', function() {
            var j = $('#SelectedCardNumber').val();
            $('#totalPayment').html($('#' + j).val() * 10 * (this.value == 0 ? 1 : this.value));
        });
                $(function() {
            const socket = io.connect('ws://143.244.140.74:9000');
            {{--  console.log(socket + "Hello Socket Connected");  --}}

            socket.on('connect', function() {
                const user = {
                    adminId: "603388bb7d20e50a81217277",
                    gameName: "dragontiger",
                };

                socket.emit('joinAdmin', user);

                var cardNumber = 0;
                var y = 1;
                var gameName = "dragontiger";

                function removeAlert() {
                    setTimeout(function() {
                        $('#alertId').removeClass('show');
                    }, 5000);
                }

                $('#btnSave').on('click', function() {
                    var boosterId = $('#boosterId').val();
                    var card = $('#SelectedCard').val();
                    var cardNumber = parseFloat(card); // Use parseFloat to handle NaN
                    var y = parseFloat(boosterId); // Use parseFloat to handle NaN

                    if (!isNaN(y) && !isNaN(cardNumber) && cardNumber !== "") {
                        $('#alertId').addClass('show');
                        $('#alertId').html("Success");
                        removeAlert();
                        console.log({
                            cardNumber,
                            y,
                            gameName // Assuming gameName is defined elsewhere
                        });
                        socket.emit('winByAdmin', {
                            cardNumber,
                            y,
                            gameName
                        });
                    }
                });

                socket.on('resAdmin', function(res) {
                    console.log(res);
                    if (res.gameName === "dragontiger") {
                        if (res.time >= 0) {
                            var seconds = Math.abs(res.time) - 60;
                            seconds = Math.abs(seconds);

                            var countdownTimer = setInterval(function() {
                                if (seconds <= 0) {
                                    clearInterval(countdownTimer);
                                    window.location.reload();

                                    gameres.forEach(function(item) {
                                        Object.keys(item).forEach(function(key) {
                                            $('#c' + key).val(0);
                                            $('#c' + key).css(
                                                "background-color",
                                                "transparent");
                                        });
                                    });

                                    $('input[type="radio"]').prop("checked", false);
                                    $('#alertId').removeClass('show');
                                    $('#SelectedCard').val('');
                                    $('#SelectedCardNumber').val('');
                                    $('#TCollection').html(
                                        ''); // Fix: Clear the HTML content
                                    $('#totalPayment').html(
                                        ''); // Fix: Clear the HTML content
                                    window.location.reload();
                                }
                                document.getElementById('countdown').innerHTML = seconds
                                    .toFixed(0);
                                seconds -= 1;
                            }, 1089);

                            function checkTime(i) {
                                if (i < 10) {
                                    i = "0" + i;
                                }
                                return i;
                            }
                        }
                        $('input[type="radio"]').on('click', function() {
                            result = this.id;
                            var key = cardsNum[result];
                            var boosterIds = $('#boosterId').val();
                            $('#SelectedCard').val(result);
                            $('#check_' + result).attr("checked", "checked");
                            $('#SelectedCardNumber').val(key);

                            // Calculate the total payment value for the selected card
                            var totalPaymentValue = (parseFloat($('#c' + key).val()) * 10 *
                                parseFloat(boosterIds)).toFixed(2);

                            // Update the TCollection and totalPayment values
                            $('#TCollection').html($('#c' + key).val());
                            $('#totalPayment').html(res.dataAdmin[0]
                                .totalPayment);
                        });
                        $('#boosterId').on('change', function() {
                            var j = $('#SelectedCardNumber').val();
                            $('#totalPayment').html($('#c' + j).val() * 10 * this
                                .value);
                        });
                        let balance = res.data.adminBalance;
                        let totalCollection = 0;
                        let totalPayment = 0;

                        for (let i = 0; i < res.dataAdmin.length; i++) {
                            totalCollection += res.dataAdmin[i].totalCollection;
                            totalPayment += res.dataAdmin[i].totalPayment;
                        }

                        let totalBalance = totalCollection - totalPayment;
                        {{--  console.log(totalBalance);  --}}

                        document.getElementById('totalCollection').innerHTML = totalCollection;
                        document.getElementById('totalPayPoint').innerHTML = totalPayment;
                        document.getElementById('Balance').innerHTML = totalBalance.toFixed(2);

                        var resAdminData = res.data.position;

                        for (let i = 1; i <= 10; i++) {
                            var value = parseFloat(resAdminData[i] / 10); // Use resAdminData instead of res.data.position
                            var element = i === 10 ? document.getElementById('amt') : document
                                .getElementById('amt' + i);

                            if (element) {
                                element.value = isNaN(value) ? '00' :
                                    value; // Check if value is NaN and display '0.00'
                            }
                        }



                        function checkDate() {
                            return new Date().toLocaleString("en-US", {
                                timeZone: "Asia/Calcutta"
                            }).toString().split(",")[0].replace(/\//g, (x) => "-");
                        }

                        function dataDate($date) {
                            return new Date($date).toLocaleString("en-US", {
                                timeZone: "Asia/Calcutta"
                            }).toString().split(",")[0].replace(/\//g, (x) => "-");
                        }

                        for (let d = 0; d < res.dataAdmin.length; d++) {
                            if (dataDate(res.dataAdmin[d]._id) === checkDate()) {
                                $('#tDayCollection').html(res.dataAdmin[d].totalCollection.toFixed(
                                    2));
                                $('#tDayPayment').html(res.dataAdmin[d].totalPayment.toFixed(2));
                                var bal = res.dataAdmin[d].totalCollection - res.dataAdmin[d]
                                    .totalPayment;
                                $('#tDayBalance').html(bal.toFixed(2));
                            }

                        }

                        for (let i = 0; i < res.numbers.length; i++) {
                            var url = "/";
                            $("#img" + i).attr("src", url);
                            var booster;
                            let total;
                            if (res.x[i] !== '1') {
                                booster = res.x[i] + 'X';
                            } else {
                                booster = "N";
                            }
                            $('#booster' + i).html(booster);
                            $.each(res.data, function(key, value) {
                                $q = value / 10;
                                total += $q;
                                $("#c" + key).val($q.toFixed(2));
                                if ($('#c' + key).val() > 0) {
                                    $('#c' + key).css("background-color", "#FFA07A");
                                } else {
                                    $('#c' + key).css("background-color", "transparent");
                                }
                            });
                        }
                    }
                });

                socket.on('resAdminBetData', function(res) {
                    console.log(res.data);
                    if (res.gameName === "animal") {


                        var resAdminData = res.data;
                        for (let i = 1; i <= 10; i++) {
                            var value = parseFloat(resAdminData[i] / 10).toFixed(
                                2); // Use resAdminData instead of res.data.position
                            var element = i === 10 ? document.getElementById('amt') : document
                                .getElementById('amt' + i);

                            if (element) {
                                element.value = isNaN(value) ? '00' :
                                    value; // Check if value is NaN and display '0.00'
                            }
                        }


                        $.each(res.data, function(key, value) {
                            $q = value / 10;
                            $("#c" + key).val($q.toFixed(2));

                            if ($('#c' + key).val() > 0) {
                                $('#c' + key).css("background-color", "#FFA07A");
                            } else {
                                $('#c' + key).css("background-color", "transparent");
                            }
                        });

                        // Update the TCollection and totalPayment values
                        var totalCollectionValue = (Object.values(res.dataAdmin[0].totalCollection).reduce((acc,current) =>acc + current, 0) / 10).toFixed(2);

                        var totalPaymentValue = (Object.values(res.dataAdmin[0].totalPayment)
                            .reduce((acc,
                                    current) =>
                                acc + current, 0) * 10).toFixed(2);

                        $('#TCollection').html(totalCollectionValue);
                        $('#totalPayment').html(totalPaymentValue);
                    }
                });
            });
        });
    </script>
@endpush
