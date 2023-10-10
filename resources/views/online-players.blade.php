@extends('layout.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>

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
    </style>
    <div class="container">
        <h3>Online Players</h3>
        <table id="online-players-table" class="table table-borderless">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Login Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($onlinePlayers as $player)
                    <tr>
                        <td>{{ $player['Name'] }}</td>
                        <td>{{ $player['UserName'] }}</td>
                        <td>{{ $player['LoginStatus'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#online-players-table').DataTable({

            });

        });
    </script>
@endsection
