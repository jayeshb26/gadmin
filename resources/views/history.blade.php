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

@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-danger" role="alert">
            {{ Session::has('msg') ? Session::get('msg') : '' }}
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    @endif

    @if (Request::segment(2) != 'detail')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="get" id="myFormID" action="{{ url('/history') }}">
                            <div class="forms-sample">
                                <div class="form-group row">
                                    <div class="col-sm-1 text-center mt-2">Game</div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="game">
                                            <option selected disabled>Select Game</option>
                                            <option value="1"
                                                {{ isset($_GET['game']) ? ($_GET['game'] == 1 ? 'selected' : '') : '' }}>
                                                RouletteTimer60
                                            </option>
                                            <option value="2"
                                                {{ isset($_GET['game']) ? ($_GET['game'] == 2 ? 'selected' : '') : '' }}>
                                                funtarget</option>
                                            <option value="3"
                                                {{ isset($_GET['game']) ? ($_GET['game'] == 3 ? 'selected' : '') : '' }}>
                                                Roulette
                                            </option>
                                            <option value="4"
                                                {{ isset($_GET['game']) ? ($_GET['game'] == 4 ? 'selected' : '') : '' }}>
                                                Spin To Win
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-6">
                                        <label class="control-label mt-2">From :</label>
                                        <div class="input-group date datepicker" id="datePickerExample2">
                                            <input type="text" class="form-control" name="from" id="START_DATE_TIME"
                                                value={{ !empty($_GET['from']) ? $_GET['from'] : '' }}><span
                                                class="input-group-addon"><i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label mt-2">To :</label>
                                        <div class="input-group date datepicker" id="datePickerExample1">
                                            <input type="text" class="form-control" name="to" id="END_DATE_TIME"
                                                value={{ !empty($_GET['to']) ? $_GET['to'] : date('d-m-Y') }}><span
                                                class="input-group-addon"><i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-12">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Player History</h6>
                        <div class="row text-right">
                            <a href="javascript:history.back()" class="btn btn-success"><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>HandId</th>
                                    <th>Username</th>
                                    <th>Start Point</th>
                                    <th>Play point</th>
                                    <th>Won</th>
                                    <th>End Point</th>
                                    <th>Date</th>
                                    <th>Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $SR_No = 1;
                                @endphp
                                @foreach ($data as $key => $value)
                                    <tr role="row">
                                        <td class=""><?= $data->firstItem() + $key ?></td>
                                        <td><a href="{{ url('historyDetail/' . $value['_id']) }}"
                                                target="_blank">{{ substr($value['_id'], -7) }}</a></td>
                                        <td>{{ $value['userName'] }}</td>
                                        <td>{{ moneyFormatIndia($value['startPoint']) }}</td>
                                        <td>{{ moneyFormatIndia($value['bet']) }}</td>
                                        <td>{{ moneyFormatIndia($value['won']) }}</td>
                                        <td>{{ moneyFormatIndia($value['startPoint'] - $value['bet'] + $value['won']) }}
                                        </td>
                                        <td>{{ $createdAt ?? '' }}</td>
                                        <td>{{ ucfirst($value['game']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>{{ moneyFormatIndia($totalStartPoint) }}</th>
                                    <th>{{ moneyFormatIndia($total) }}</th>
                                    <th>{{ moneyFormatIndia($totalWin) }}</th>
                                    <th>{{ moneyFormatIndia($totalEnd) }}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="mt-3">{{ $data->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    @if (Request::segment(2) != 'detail')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h6>Date Vise Player History Data</h6>
                    </div>
                    <div class="card-body">
                        <form id="myFormID" name="myform">
                            <div class="forms-sample">
                                <span class="text-center" id="jsError"></span>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="input-group date datepicker" id="datePickerExample4">
                                            <input type="text" class="form-control" name="from"
                                                placeholder="From"><span class="input-group-addon"><i
                                                    data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center mt-2">To</div>
                                    <div class="col-sm-4">
                                        <div class="input-group date datepicker" id="datePickerExample3">
                                            <input type="text" class="form-control" name="to"
                                                placeholder="To"><span class="input-group-addon"><i
                                                    data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="{{ url('/deletePlayerHistory') }}"
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
    @endif
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
        $("#datePickerExample4").datepicker({
            format: 'dd-mm-yyyy'
        });
        $("#datePickerExample1").datepicker({
            format: 'dd-mm-yyyy'
        });
        $("#datePickerExample2").datepicker({
            format: 'dd-mm-yyyy'
        });
        $("#datePickerExample3").datepicker({
            format: 'dd-mm-yyyy'
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

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush
