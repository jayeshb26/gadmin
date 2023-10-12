{{--  @extends('layout.master') --}}

{{-- @section('content') --}}
{{--    <style> --}}
{{--        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap'); --}}

{{--        * { --}}
{{--            margin: 0; --}}
{{--            padding: 0; --}}
{{--            box-sizing: border-box; --}}
{{--            font-family: 'Poppins', sans-serif; --}}
{{--        } --}}

{{--        body { --}}
{{--            background: #ecd23a; --}}
{{--            padding: 0 20px; --}}
{{--        } --}}

{{--        ::selection { --}}
{{--            color: #fff; --}}
{{--            background: #ff654a; --}}
{{--        } --}}

{{--        .wrapper { --}}
{{--            max-width: 450px; --}}
{{--            margin: 21px auto; --}}
{{--        } --}}

{{--        .wrapper .search-input { --}}
{{--            background: #fff; --}}
{{--            width: 100%; --}}
{{--            border-radius: 5px; --}}
{{--            position: relative; --}}
{{--            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12); --}}
{{--        } --}}

{{--        .search-input input { --}}
{{--            height: 55px; --}}
{{--            width: 100%; --}}
{{--            outline: none; --}}
{{--            border: none; --}}
{{--            border-radius: 5px; --}}
{{--            padding: 0 60px 0 20px; --}}
{{--            font-size: 18px; --}}
{{--            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1); --}}
{{--        } --}}

{{--        .search-input.active input { --}}
{{--            border-radius: 110vw 100vw 0 0; --}}
{{--        } --}}

{{--        .search-input .autocom-box { --}}
{{--            padding: 0; --}}
{{--            opacity: 0; --}}
{{--            pointer-events: none; --}}
{{--            max-height: 280px; --}}
{{--            overflow-y: auto; --}}
{{--        } --}}

{{--        .search-input.active .autocom-box { --}}
{{--            padding: 10px 8px; --}}
{{--            opacity: 1; --}}
{{--            pointer-events: auto; --}}
{{--        } --}}

{{--        .autocom-box li { --}}
{{--            list-style: none; --}}
{{--            padding: 8px 12px; --}}
{{--            display: none; --}}
{{--            width: 100%; --}}
{{--            cursor: default; --}}
{{--            border-radius: 3px; --}}
{{--        } --}}

{{--        .search-input.active .autocom-box li { --}}
{{--            display: block; --}}
{{--        } --}}

{{--        .autocom-box li:hover { --}}
{{--            background: #efefef; --}}
{{--        } --}}

{{--        .search-input .icon { --}}
{{--            position: absolute; --}}
{{--            right: 0px; --}}
{{--            top: 0px; --}}
{{--            height: 55px; --}}
{{--            width: 55px; --}}
{{--            text-align: center; --}}
{{--            line-height: 55px; --}}
{{--            font-size: 20px; --}}
{{--            color: #e4ff4b; --}}
{{--            cursor: pointer; --}}
{{--        } --}}

{{--        .custom-table { --}}
{{--            border: 2px solid black; --}}
{{--            color: black; --}}
{{--        } --}}

{{--        .custom-table tbody td { --}}
{{--            color: black; --}}
{{--            font-weight: bold; --}}
{{--        } --}}
{{--    </style> --}}
{{--    <div class="wrapper"> --}}
{{--        <div class="search-input"> --}}
{{--            <a href="" target="_blank" hidden></a> --}}
{{--            <input type="text" id="search" placeholder="Type to search.."> --}}
{{--            <div class="autocom-box"> --}}
{{--            </div> --}}
{{--        </div> --}}

{{--        <button class="btn btn-primary p-button" id="search-btn">Search</button> --}}

{{--        <!-- Display data container --> --}}
{{--        <div id="data-container" style="display: none;"> --}}
{{--            <!-- Here, you can display the fetched data --> --}}
{{--        </div> --}}
{{--    </div> --}}
{{--    <div class="container"> --}}
{{--        <table id="user-table" class="table custom-table table-responsive" style="color: black;"> --}}
{{--            <thead> --}}
{{--                <tr> --}}
{{--                    <th scope="col">User Name</th> --}}
{{--                    <th scope="col">Name</th> --}}
{{--                    <th scope="col">Role</th> --}}
{{--                    <th scope="col">Active</th> --}}
{{--                    <th scope="col">Credit Point</th> --}}
{{--                    <th scope="col">Commission Point</th> --}}
{{--                    <th scope="col">Commission Percentage</th> --}}
{{--                    <th scope="col">Game</th> --}}
{{--                    <th scope="col">Bet</th> --}}
{{--                    <th scope="col">Won</th> --}}
{{--                    <th scope="col">Win Position</th> --}}
{{--                    <th scope="col">Start Point</th> --}}
{{--                    <th scope="col">Dr Time</th> --}}
{{--                    <th scope="col">Dr Date</th> --}}
{{--                    <th scope="col">Create Date</th> --}}
{{--                </tr> --}}
{{--            </thead> --}}
{{--            <tbody> --}}
{{--                <!-- Data will be dynamically inserted here --> --}}
{{--            </tbody> --}}
{{--        </table> --}}
{{--    </div> --}}
{{-- @endsection --}}
{{-- @push('custom-scripts') --}}
{{--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}

{{--    /* --}}
{{--    <script type="text/javascript"> --}}
{{--        $(document).ready(function() { --}}
{{--            var route = "{{ url('searchUsers') }}"; --}}
{{--            var searchInput = $('#search'); --}}
{{--            var autocompleteResults = $('#autocom-box'); --}}

{{--            searchInput.typeahead({ --}}
{{--                source: function(query, process) { --}}
{{--                    return $.get(route, { --}}
{{--                        searchTerm: query --}}
{{--                    }, function(data) { --}}
{{--                        return process(data); --}}
{{--                    }); --}}
{{--                }, --}}
{{--                updater: function(item) { --}}

{{--                    searchInput.val(item.userName); --}}
{{--                    return item.userName; --}}
{{--                } --}}
{{--            }); --}}

{{--            searchInput.on('input', function() { --}}
{{--                var query = searchInput.val(); --}}
{{--                if (query === '') { --}}
{{--                    autocompleteResults.empty(); --}}
{{--                } --}}
{{--            }); --}}

{{--            autocompleteResults.on('click', 'li', function() { --}}
{{--                var selectedUsername = $(this).text(); --}}
{{--                searchInput.val(selectedUsername); --}}
{{--                autocompleteResults.empty(); --}}
{{--            }); --}}
{{--        }); --}}
{{--    </script>*/ --}}

{{--    <script type="text/javascript"> --}}
{{--        const searchWrapper = document.querySelector(".search-input"); --}}
{{--        const inputBox = searchWrapper.querySelector("input"); --}}
{{--        const suggBox = searchWrapper.querySelector(".autocom-box"); --}}
{{--        const icon = searchWrapper.querySelector(".icon"); --}}
{{--        let linkTag = searchWrapper.querySelector("a"); --}}
{{--        let webLink; --}}

{{--        inputBox.onkeyup = (e) => { --}}
{{--            let userData = e.target.value; --}}
{{--            let emptyArray = []; --}}
{{--            if (userData) { --}}
{{--                icon.onclick = () => { --}}
{{--                    webLink = `http://127.0.0.1:8000/q=${userData}`; --}}
{{--                    linkTag.setAttribute("href", webLink); --}}
{{--                    linkTag.click(); --}}
{{--                } --}}
{{--                emptyArray = suggestions.filter((data) => { --}}
{{--                    return data.toLowerCase().startsWith(userData.toLowerCase()); --}}
{{--                }); --}}
{{--                emptyArray = emptyArray.map((data) => { --}}
{{--                    return `<li>${data}</li>`; --}}
{{--                }); --}}
{{--                searchWrapper.classList.add("active"); --}}
{{--                showSuggestions(emptyArray); --}}
{{--                let allList = suggBox.querySelectorAll("li"); --}}
{{--                for (let i = 0; i < allList.length; i++) { --}}
{{--                    allList[i].addEventListener("click", function() { --}}
{{--                        select(this); --}}
{{--                    }); --}}
{{--                } --}}
{{--            } else { --}}
{{--                searchWrapper.classList.remove("active"); --}}
{{--            } --}}
{{--        } --}}

{{--        function select(element) { --}}
{{--            let selectData = element.textContent; --}}
{{--            inputBox.value = selectData; --}}
{{--            icon.onclick = () => { --}}
{{--                webLink = `/q=${selectData}`; --}}
{{--                linkTag.setAttribute("href", webLink); --}}
{{--                linkTag.click(); --}}
{{--            } --}}
{{--            searchWrapper.classList.remove("active"); --}}
{{--        } --}}

{{--        function showSuggestions(list) { --}}
{{--            let listData; --}}
{{--            if (!list.length) { --}}
{{--                userValue = inputBox.value; --}}
{{--                listData = `<li>${userValue}</li>`; --}}
{{--            } else { --}}
{{--                listData = list.join(''); --}}
{{--            } --}}
{{--            suggBox.innerHTML = listData; --}}
{{--        } --}}
{{--        document.getElementById("search-btn").addEventListener("click", function() { --}}
{{--            const userName = inputBox.value; // Get the user name from the input --}}
{{--            console.log(userName); --}}
{{--            // Fetch user data from the server using the userName --}}
{{--            fetch(`/fetch/${userName}`) --}}
{{--                .then(response => response.json()) --}}
{{--                .then(data => { --}}
{{--                    // Check if the data is available --}}
{{--                    if (data && data.length > 0) { --}}
{{--                        // Display the data in the table --}}
{{--                        const tableBody = document.querySelector("#user-table tbody"); --}}
{{--                        tableBody.innerHTML = ""; // Clear previous data --}}

{{--                        data.forEach(user => { --}}
{{--                            const row = document.createElement("tr"); --}}
{{--                            row.innerHTML = ` --}}
{{--                            <td>${user.userName}</td> --}}
{{--                            <td>${user.name}</td> --}}
{{--                            <td>${user.role}</td> --}}
{{--                            <td>${user.isActive ? 'Yes' : 'No'}</td> --}}
{{--                            <td>${user.creditPoint}</td> --}}
{{--                            <td>${user.commissionPoint}</td> --}}
{{--                            <td>${user.commissionPercentage}</td> --}}
{{--                            <td>${user.game}</td> --}}
{{--                            <td>${user.bet}</td> --}}
{{--                            <td>${user.won}</td> --}}
{{--                            <td>${user.winPosition}</td> --}}
{{--                            <td>${user.startPoint}</td> --}}
{{--                            <td>${user.DrTime}</td> --}}
{{--                            <td>${user.DrDate}</td> --}}
{{--                            <td>${user.createDate}</td> --}}
{{--                    `; --}}
{{--                            tableBody.appendChild(row); --}}
{{--                        }); --}}

{{--                        // Show the data container --}}
{{--                        document.getElementById("data-container").style.display = "block"; --}}
{{--                    } else { --}}
{{--                        // Handle the case where no data is found --}}
{{--                        alert("User not found!"); --}}
{{--                    } --}}
{{--                }) --}}
{{--                .catch(error => { --}}
{{--                    console.error("Error fetching user data:", error); --}}
{{--                }); --}}
{{--        }); --}}
{{--    </script> --}}
{{-- @endpush  --}}
@extends('layout.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding: 0 20px;
        }

        ::selection {
            color: #fff;
            background: #ff654a;
        }

        .wrapper {
            max-width: 450px;
            margin: 21px auto;
        }

        .wrapper .search-input {
            background: #fff;
            width: 100%;
            border-radius: 5px;
            position: relative;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }

        .search-input input {
            height: 55px;
            width: 100%;
            outline: none;
            border: none;
            border-radius: 5px;
            padding: 0 60px 0 20px;
            font-size: 18px;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .search-input.active input {
            border-radius: 110vw 100vw 0 0;
        }

        .autocom-box {
            position: relative;
            display: inline-block;
            width: 200px;
            /* Adjust the width as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style for the suggestions list */
        #suggestions {
            list-style: none;
            margin: 0;
            padding: 0;
            max-height: 150px;
            /* Adjust the max height as needed */
            overflow-y: auto;
            border-top: 1px solid #ccc;
        }

        /* Style for each suggestion item */
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Hover effect for suggestion items */
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }

        .search-input .autocom-box {
            padding: 0;
            opacity: 0;
            pointer-events: none;
            max-height: 280px;
            overflow-y: auto;
        }

        .search-input.active .autocom-box {
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }

        .autocom-box li {
            list-style: none;
            padding: 8px 12px;
            display: none;
            width: 100%;
            cursor: default;
            border-radius: 3px;
        }

        .search-input.active .autocom-box li {
            display: block;
        }

        .autocom-box li:hover {
            background: #efefef;
        }

        .search-input .icon {
            position: absolute;
            right: 0px;
            top: 0px;
            height: 55px;
            width: 55px;
            text-align: center;
            line-height: 55px;
            font-size: 20px;
            color: #e4ff4b;
            cursor: pointer;
        }

        .custom-table {
            border: 2px solid black;
            color: black;
        }

        .table-container {
            max-width: 800px;
            /* Set the maximum width for the container */
            margin: 0 auto;
            /* Center-align the container horizontally */
            overflow-x: auto;
            /* Add horizontal scrollbar if the content overflows */
        }

        #user-table {
            width: 100%;
            /* Set the table width to 100% of its container */
        }

        .suggestion-item {
            padding: 10px;
            cursor: grab;
            /* Add this line to set the cursor to pointer */
            transition: background-color 0.3s;
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 2 / 2 / 3;
        }

        .div2 {
            grid-area: 1 / 3 / 2 / 4;
        }

        .div3 {
            grid-area: 1 / 4 / 2 / 5;
        }
    </style>

    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">

                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h5>Profile Search</h5>
                                    <div class="search-input">
                                        <a href="" target="_blank" hidden></a>
                                        <input type="text" id="search" placeholder="Type to search..">
                                    </div>
                                    <button class="btn btn-primary p-button" id="submit-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <ul class="list-group list-group-flush">
                            <div class="autocom-box"></div>
                            <li id="suggestions" style="text-center"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>User Information</h5>
                            <div class="d-flex flex-column  text-left">
                                <div class="mt-3">
                                    <h5>User Name:&nbsp; <span id="username"></span></h5>
                                    <span>Name:&nbsp; <span id="name"></span> </span><br>
                                    <span>Role:&nbsp; <span id="role"></span> </span><br>
                                    <span>Referral:&nbsp; <span id="referral-username"></span> </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Credit Point: <span id="credit-point-value">N/A</span></h5>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Total Balance: <span id="total-balance-value">N/A</span></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Total Play Point: <span id="total-play-points-value">N/A</span></h5>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Total Won Point: <span id="total-won-points-value">N/A</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters-sm mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Recent Transaction</h5>
                        <table id="bets-table" class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>START POINT</th>
                                    <th>PLAY POINT</th>
                                    <th>WON</th>
                                    <th>DATE</th>
                                    <th>GAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables on the bets table
            var betsTable = $('#bets-table').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "info": true // Show table information
            });

            // Function to fetch user suggestions
            function searchUsers(query) {
                $.ajax({
                    url: 'searchUsers', // Use the correct endpoint
                    type: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(response) {
                        var suggestions = $('#suggestions');
                        suggestions.empty();

                        // Display the suggestions in a list
                        $.each(response, function(key, value) {
                            suggestions.append('<li class="text-left">' + value + '</li>');
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching suggestions:", error);
                    }
                });
            }

            $('#submit-btn').on('click', function(event) {
                event.preventDefault(); // Prevent the form from submitting

                var userName = $('#search').val();

                // Send an AJAX request to fetch user data from /fetch newdata
                $.ajax({
                    url: 'fetch/' + userName, // Use the correct endpoint
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response && Object.keys(response.userData).length > 0) {
                            // Populate HTML elements with user data
                            $('#username').text(response.userData.userName || 'N/A');
                            $('#name').text(response.userData.name || 'N/A');
                            $('#role').text(response.userData.role || 'N/A');
                            $('#referral-username').text(response.userData.referralUsername ||
                                'N/A');
                            $('#credit-point-value').text(response.userData.creditPoint ||
                                'N/A');
                            $('#total-balance-value').text(response.userData.creditPoint ||
                                'N/A');
                            $('#total-play-points-value').text(response.userData
                                .playPoint || 'N/A');
                            $('#total-won-points-value').text(response.userData.wonPoint ||
                                'N/A');

                            // Clear existing data in the DataTable
                            betsTable.clear().draw();
                            console.log(response.userData.startPoint);
                            // Populate DataTable with bets data
                            if (response.bets && response.bets.length > 0) {
                                for (var i = 0; i < response.bets.length; i++) {
                                    var bet = response.bets[i];
                                    betsTable.row.add([
                                        bet.userName,
                                        response.userData.name,
                                        bet.startPoint ||
                                        'N/A', // Use 'N/A' if data is missing
                                        response.userData.playPoint ||
                                        'N/A', // Use 'N/A' if data is missing
                                        bet.won || 'N/A',
                                        bet.createDate,
                                        bet.game = 'FunRoulette' || 'FunTarget',
                                    ]).draw(false);
                                }
                            }
                        } else {
                            alert("User not found!");
                        }
                    },
                    error: function(error) {
                        console.error("Error fetching user data:", error);
                    }
                });
            });

            $('#search').on('input', function() {
                var query = $(this).val();

                // Call the searchUsers function to fetch user suggestions
                searchUsers(query);
            });

            $('#suggestions').on('click', 'li', function() {
                var selectedSuggestion = $(this).text();
                $('#search').val(selectedSuggestion);
                $('#suggestions').empty(); // Clear the suggestions

                // Automatically trigger the submit button click after selecting a suggestion
                $('#submit-btn').click();
            });
        });
    </script>
@endpush
