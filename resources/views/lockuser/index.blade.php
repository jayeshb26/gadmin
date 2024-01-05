@extends('layout.master')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />


    <div class="row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Lock User </label>
    </div>
    <table id="userTable" class="table table-striped table-bordered table-responsive-md">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->userName }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->isLocked)
                            <span class="btn btn-danger">Locked</span>
                        @else
                            <span class="btn btn-success">Unlocked</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                @if ($user->isLocked)
                                    <a class="dropdown-item"
                                        href="{{ route('updateUserStatus', ['id' => $user->id, 'action' => 'unlock']) }}">Unlock</a>
                                @else
                                    <a class="dropdown-item"
                                        href="{{ route('updateUserStatus', ['id' => $user->id, 'action' => 'lock']) }}">Lock</a>
                                @endif
                                <a class="dropdown-item"
                                    href="{{ route('updateUserStatus', ['id' => $user->id, 'action' => 'reset-login']) }}">Reset
                                    Login</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('custom-scripts')
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
            $('#userTable').DataTable();
        });
    </script>
@endpush
