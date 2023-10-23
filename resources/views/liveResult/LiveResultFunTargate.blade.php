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
    <style>
        body {
            line-height: 1.0;
        }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background: #008200">
                    <h5 class="col-sm-2 card-title text-black" style="font-size: 16px; color:white">Fun Targate</h5>

                    <button type='button' id="reset" class="btn btn-outline-light"
                        style="background: #1B0905; color: white"><span aria-hidden='true'>Reset
                            Balance</span></button>
                </div>
                <div class="card-body text-white" style="background:  #1B0905; ">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower  text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-10 col-xl-8">
                                <div class="box">
                                    <div id="table" class="table-editable table-responsive"
                                        style="background: #1B0905;">
                                        <table id="user_role_table"
                                            class="table-responsive-md table-striped text-black text-center mb-0 table_td">
                                            <tbody>
                                                <tr style="border-radius: 15px; background-color: transparent">
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg "
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px;">
                                                            <input type="radio" class="form-check-input" id="1"
                                                                value="1" class="cards" name="cards">
                                                            <label for="1" style="font-size:25px;">1</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="2"
                                                                value="2" class="cards" name="cards">
                                                            <label for="2" style="font-size:25px;">2</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="3"
                                                                value="3" class="cards" name="cards">
                                                            <label for="3" style="font-size:25px;">3</label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            name="1" value="0" id="amt1" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="2"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            value="0" id="amt2" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="3"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            value="0" id="amt3" readonly />
                                                    </td>
                                                </tr>
                                                <tr style="border-radius: 15px; background-color: transparent">

                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="4"
                                                                value="4" class="cards" name="cards">
                                                            <label for="4" style="font-size:25px;">4</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="5"
                                                                value="5" class="cards" name="cards">
                                                            <label for="5" style="font-size:25px;">5</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="6"
                                                                value="6" class="cards" name="cards">
                                                            <label for="6" style="font-size:25px;">6</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="4"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            value="0" id="amt4" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="5"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            id="amt5" value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="6"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            id="amt6" value="0" readonly />
                                                    </td>
                                                </tr>
                                                <tr style="background-color: transparent">

                                                    <td>
                                                        <div class="form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="7"
                                                                value="7" class="cards" name="cards">
                                                            <label for="7" style="font-size:25px;">7</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="8"
                                                                value="8" class="cards" name="cards">
                                                            <label for="8" style="font-size:25px;">8</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="9"
                                                                value="9" class="cards" name="cards">
                                                            <label for="9" style="font-size:25px;">9</label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td><input type="text" class="form-control" name="7"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            id="amt7" value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="8"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            id="amt8" value="0" readonly />
                                                    </td>
                                                    <td><input type="text" class="form-control" name="9"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            id="amt9" value="0" readonly />
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class=" form-check-flat form-check-primary btn-group-justified btn-lg"
                                                            style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); border-radius: 5px">
                                                            <input type="radio" class="form-check-input" id="0"
                                                                value="0" class="cards" name="cards">
                                                            <label for="0" style="font-size:25px;">0</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="0"
                                                            id="amt"
                                                            style="background-color: transparent; color:white; border-block: none; position: relative; font-size: 18px"
                                                            value="0" id="amt0" readonly />
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
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span>
                                </p>
                                <p>
                                    <select name="boosterId" id="boosterId" class="browser-default custom-select"
                                        style="width:100%">
                                        @for ($i = 1; $i <= 4; $i++)
                                            @if ($i == 1)
                                                <option value="1">1</option>
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
                                <table class="table table-bordered  text-white">
                                    <tr>
                                        <td>TOTAL Game Balance: </td>
                                        <td align="right"><span id="tDayCollection"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL COLLECTION: </td>
                                        <td align="right"><span id="totalCollection"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL PAYMENT :</td>
                                        <td align="right"><span id="totalPayPoint"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BALANCE :</td>
                                        <td align="right"><span id="Balance"></span>
                                        </td>
                                    </tr>
                                </table>
                                {{--  <table class="tlb table table-bordered" id="resTab">
                                    <tr id="lastbet">
                                        @for ($i = 5; $i < 10; $i++)
                                            <td class="r_color_2" style="font-size:17px;" id="r{{ $i }}"></td>
                                        @endfor
                                    </tr>
                                </table>  --}}
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
        var card = ["HJ", "SJ", "DJ", "CJ", "HQ", "SQ", "DQ", "CQ", "HK", "SK", "DK", "CK"];
        var gameres = [{
            "1": 0.0,
            "2": 0.0,
            "3": 0.0,
            "4": 0.0,
            "5": 0.0,
            "6": 0.0,
            "7": 0.0,
            "8": 0.0,
            "9": 0.0,
            "10": 0.0,
            "11": 0.0,
            "12": 0.0,
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
            const socket = io.connect('ws://143.244.140.74:9000');
            {{--  console.log(socket + "Hello Socket Connected");  --}}

            socket.on('connect', function() {
                const user = {
                    adminId: "603388bb7d20e50a81217277",
                    gameName: "funtarget",
                };

                socket.emit('joinAdmin', user);

                var cardNumber = 0;
                var y = 1;
                var gameName = "funtarget";

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
                    {{--  console.log(res);  --}}
                    if (res.gameName === "funtarget") {
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

                        document.getElementById('totalCollection').innerHTML = totalCollection;
                        document.getElementById('totalPayPoint').innerHTML = totalPayment;
                        document.getElementById('Balance').innerHTML = balance.toFixed(2);
                        document.getElementById('tDayCollection').innerHTML = totalBalance;

                        var resAdminData = res.data.position;

                        for (let i = 1; i <= 10; i++) {
                            var value = parseFloat(resAdminData[i]).toFixed(
                                2); // Use resAdminData instead of res.data.position
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
                            var url = "http://65.0.108.235/public/img/cards2/" + res.numbers[i] +
                                '.png';
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
                    if (res.gameName === "funtarget") {


                        var resAdminData = res.data;
                        for (let i = 1; i <= 10; i++) {
                            var value = parseFloat(resAdminData[i]).toFixed(
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
                        var totalCollectionValue = (Object.values(res.dataAdmin[0].totalCollection)
                            .reduce((acc,
                                    current) =>
                                acc + current, 0) / 10).toFixed(2);

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
