<!DOCTYPE html>
<html>

<head>
    <title>Gold Star</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon2.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- end plugin css -->

    @stack('plugin-styles')
    <style type="text/css">
        .card-title {
            text-transform: none !important;
        }
    </style>

    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')
</head>

<body data-base-url="{{ url('/') }}" class="sidebar-dark">

    <script src="{{ asset('assets/js/spinner.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="main-wrapper" id="app">
        @include('layout.sidebar')
        <div class="page-wrapper">
            @include('layout.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- end base js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>


    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    <script>
        var ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        var tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
        var teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen',
            'nineteen'
        ];

        function convert_millions(num) {
            if (num >= 1000000) {
                return convert_millions(Math.floor(num / 1000000)) + " million " + convert_thousands(num % 1000000);
            } else {
                return convert_thousands(num);
            }
        }

        function convert_thousands(num) {
            if (num >= 1000) {
                return convert_hundreds(Math.floor(num / 1000)) + " thousand " + convert_hundreds(num % 1000);
            } else {
                return convert_hundreds(num);
            }
        }

        function convert_hundreds(num) {
            if (num > 99) {
                return ones[Math.floor(num / 100)] + " hundred " + convert_tens(num % 100);
            } else {
                return convert_tens(num);
            }
        }

        function convert_tens(num) {
            if (num < 10) return ones[num];
            else if (num >= 10 && num < 20) return teens[num - 10];
            else {
                return tens[Math.floor(num / 10)] + " " + ones[num % 10];
            }
        }

        function convert(num) {
            if (num == 0) return "zero";
            else return convert_millions(num);
        }
        $(document).ready(function() {
            // Hide the initial elements
            $('#shown_balance_a').hide();
            $('#shown_balance_lbl').hide();

            // Handle click on hidden_balance_a
            $('#hidden_balance_a').on('click', function() {
                $('#hidden_balance_a').hide();
                $('#hidden_balance_lbl').hide();
                $('#shown_balance_a').show();
                $('#shown_balance_lbl').show();

                // Retrieve user ID from the session
                const userId = '{{ Session::get('id') }}';

                // Fetch and display data from the URL with the user ID in the path
                const url = `http://127.0.0.1:8000/getUpdatedCreditPoint/${userId}`;

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Update the HTML element with the fetched data
                        $('#shown_balance_lbl').text('Balance: ' + data.users[0]);
                    },
                    error: function() {
                        // Handle errors
                        console.log('Error fetching data.');
                    }
                });
            });

            // Handle click on shown_balance_a (if needed)
            $('#shown_balance_a').on('click', function() {
                $('#shown_balance_a').hide();
                $('#shown_balance_lbl').hide();
                $('#hidden_balance_a').show();
                $('#hidden_balance_lbl').show();
            });
        });
    </script>

    {{--  this is custom script for the dropdown menu in side bar   --}}
    {{--  <script>
        document.addEventListener("DOMContentLoaded", function() {
            const usersToggle = document.getElementById("usersToggle");
            const usersMenu = document.getElementById("usersMenu");
            const usersNavItem = document.getElementById("usersNavItem");

            usersToggle.addEventListener("click", function(e) {
                e.preventDefault();
                usersNavItem.classList.toggle("open");
            });

            // Close the dropdown when clicking outside of it
            document.addEventListener("click", function(event) {
                if (!usersNavItem.contains(event.target)) {
                    usersNavItem.classList.remove("open");
                }
            });
        });
    </script>  --}}


    @stack('custom-scripts')
</body>

</html>
