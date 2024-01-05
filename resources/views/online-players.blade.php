@extends('layout.master')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />

    <style>
        /* Style the DataTable */
        #online-players-table {
            width: 100%;
            border-collapse: collapse;
        }

        #online-players-table thead {
            background-color: #f2f2f2;
        }

        #online-players-table thead th {
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        #online-players-table tbody tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        #online-players-table tbody td {
            padding: 10px;
            text-align: left;
        }

        /* Add a hover effect on table rows */
        #online-players-table tbody tr:hover {
            background-color: #e0e0e0;
        }

        /* Online status indicator */
        .online {
            color: #2ecc71;
        }

        .offline {
            color: #e74c3c;
        }

        .blink {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <div class="container">

        <h3>Online Players <span class="online blink">&#9679;</span> </h3>
        <table id="online-players-table" class="table table-borderless">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach ($onlinePlayers as $player)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $player['Name'] }}</td>
                        <td>{{ $player['UserName'] }}</td>
                        <td>
                            @if ($player['LoginStatus'] === 'Online')
                                Online <span class="online blink">&#9679;</span>
                            @else
                                Offline <span class="offline">&#9679;</span>
                            @endif
                        </td>
                        <td>{{ $player['createdAt'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#online-players-table').DataTable();
            pagination: true
        });
    </script>
@endsection
