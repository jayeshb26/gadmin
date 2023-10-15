@extends('layout.master')


@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@push('style')
    <style type="text/css">
        .panel-primary {
            border-color: #337ab7;
        }
    </style>
@endpush

@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-danger" role="alert">
            {{ Session::has('msg') ? Session::get('msg') : '' }}
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card panel-primary">
                <div class="card-header bg-primary">
                    <div class="col-md-12 d-flex">
                        <span class="col-md-6 text-white font-weight-bold" style="font-size:16px;">Draw Details -
                            {{ $game }}</span>
                        <div class="col-md-6 text-right">
                            <div class="dropdown pull-right">
                                <button class="btn btn-outline-success text-white dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Draw Details</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('gamedraw/1') }}">FunRoulette</a>
                                    <a class="dropdown-item" href="{{ url('gamedraw/2') }}">FunTarget</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div id="accordion" class="accordion" role="tablist">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Sl no</td>
                                        <td>Game</td>
                                        <td>Draw</td>
                                        <td>Time</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data as $key => $bets)
                                        <tr>
                                            <td><?= $data->firstItem() + $key ?></td>
                                            <td>{{ $bets['gameName'] }}</td>
                                            @if ($game == 'Andar Bahar')
                                                <td><img src="{{ asset('assets/images/card/' . $bets['result'] . '.png') }}"
                                                        style="border-radius: 0px; width: 5%;"></td>
                                            @else
                                                <td>{{ $bets['result'] }}</td>
                                            @endif
                                            <td><?php echo date('d/m/Y h:i A', strtotime($bets['createdAt']->toDateTime()->format('r'))); ?></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">{{ $data->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h6>Date Vise Game Draw History Data</h6>
                </div>
                <div class="card-body">
                    <form id="myFormID" name="myform">
                        <div class="forms-sample">
                            <span class="text-center" id="jsError"></span>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="input-group date datepicker" id="datePickerExample4">
                                        <input type="text" class="form-control" name="from" placeholder="From"><span
                                            class="input-group-addon"><i data-feather="calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center mt-2">To</div>
                                <div class="col-sm-4">
                                    <div class="input-group date datepicker" id="datePickerExample3">
                                        <input type="text" class="form-control" name="to" placeholder="To"><span
                                            class="input-group-addon"><i data-feather="calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{ url('/deleteWinHistory') }}"
                                        class="btn btn-primary form-control delete-all" type="submit"
                                        value="Delete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datePickerExample4").datepicker({
                format: 'dd-mm-yyyy'
            });

            $("#datePickerExample2").datepicker({
                format: 'dd-mm-yyyy'
            });

            $("#datePickerExample3").datepicker({
                format: 'dd/mm/yyyy'
            });
        });
    </script>
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@push('custom-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.delete-all').on('click', function(event) {
            // event.preventDefault();
            event.preventDefault();
            const url = $(this).attr('href');
            var from = document.forms['myform']['from'].value;
            var to = document.forms['myform']['to'].value;
            const swalWithBootstrapButtons = Swal.mixin({
                input: 'text',
                confirmButtonText: 'Done',
                showCancelButton: true,
                progressSteps: []
            }).queue([{
                title: 'Are You Sure fetch Player History Delete',
                text: 'Admin Password'
            }, ]).then((result) => {
                if (result.value) {
                    window.location.href = url + "/" + result.value + "?from=" + from + "&to=" + to;
                }
            })
        });
    </script>
@endpush
