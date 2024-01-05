@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-8 col-sm-12 col-xs-12 mt-2">
                        <div class="btn-group flex-wrap">
                            @php
                                $mon = strtotime('last monday');
                                $monday = date('W', $mon) == date('W') ? $mon - 7 * 86400 : $mon;
                                $sunday = strtotime(date('Y-m-d', $monday) . ' +6 days');
                                $week_sd = date('Y-m-d', $monday);
                                $week_ed = date('Y-m-d', $sunday);
                                $checkmonday = date('l') == 'Monday' ? date('Y-m-d') : date('Y-m-d', strtotime('last monday'));
                                // die();
                            @endphp
                            <a href="{{ url(Request::segment(1) . '?type=1&from=' . date('Y-m-d', strtotime('-6 month')) . '&to=' . date('Y-m-d')) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == 1 ? 'active' : '' }}">Last 6
                                Months</a>
                            <a href="{{ url(Request::segment(1) . '?type=2&from=' . date('Y-m-01') . '&to=' . date('Y-m-t')) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '2' ? 'active' : '' }}">Current
                                Month</a>
                            <a href="{{ url(Request::segment(1) . '?type=3&from=' . date('Y-m-d', strtotime('first day of last month')) . '&to=' . date('Y-m-d', strtotime('last day of last month'))) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '3' ? 'active' : '' }}">Last
                                Month</a>
                            <a href="{{ url(Request::segment(1) . '?type=4&from=' . $week_sd . '&to=' . $week_ed) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '4' ? 'active' : '' }}">Last
                                Week</a>
                            <a href="{{ url(Request::segment(1) . '?type=5&from=' . $checkmonday . '&to=' . date('Y-m-d', strtotime('+' . (7 - date('w')) . ' days'))) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '5' ? 'active' : '' }}">Current
                                Week</a>
                            <a href="{{ url(Request::segment(1) . '?type=6&from=' . date('Y-m-d', strtotime('-1 day')) . '&to=' . date('Y-m-d', strtotime('-1 day'))) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '6' ? 'active' : '' }}">Yesterday</a>
                            <a href="{{ url(Request::segment(1) . '?type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                                class="btn btn-outline-info {{ $_GET['type'] == '7' ? 'active' : '' }}">Today</a>
                            <button type="button" class="btn btn-outline-info {{ $_GET['type'] == '8' ? 'active' : '' }}"
                                data-toggle="modal" data-target="#myModal">Date Range</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mt-2">
                        <?php $type = $_GET['type']; ?>
                        <?php if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) { ?>
                        <span class="bg-success text-white p-1 px-2 rounded"><?php echo date('d-m-Y', strtotime($_GET['from'])); ?></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span
                            class="bg-success text-white p-1 px-2 rounded"><?php echo date('d-m-Y', strtotime($_GET['to'])); ?></span>
                        <?php } elseif ($type == 7 || $type == 6) { ?>
                        <span class="bg-success text-white p-1 px-2 rounded"><?php echo date('d-m-Y', strtotime($_GET['to'])); ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="bg-light" id="live2">
                        <div class="col-sm-12">
                            <table class="table table-bordered text-center data-table-top">
                                <thead>
                                    <tr>
                                        <td class="bg-gradient-primary text-white">Total PlayPoints</td>
                                        <td class="bg-gradient-danger text-white">Total WinPoints</td>
                                        <td class="bg-gradient-info text-white">End Point</td>
                                        <td class="bg-gradient-warning text-white">Total Commision</td>
                                        <td class="bg-gradient-info text-white">Net</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Game Summary</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ url('TurnOver_Report') }}" method="get">
                <div class="modal-body">
                    <input type="hidden" name="type" value="8" />
                    From
                    <div class="input-group date datepicker" id="datePickerExample1">
                        <input type="text" class="form-control" name="from" placeholder="From"><span
                            class="input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                    To
                    <div class="input-group date datepicker" id="datePickerExample">
                        <input type="text" class="form-control" name="to" placeholder="To"><span
                            class="input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Get Summary</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between mb-2">
                    <b>Retailer Turnover Report</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UserName</th>
                                    <th>Play Point</th>
                                    <th>Win Point</th>
                                    <th>End Point</th>
                                    <th>Admin Commission</th>
                                    <th>Distributer Commission</th>
                                    <th>Agent Commission</th>
                                    <th>Net</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script type="text/javascript">
    
    $("#datePickerExample").datepicker();
        $("#datePickerExample1").datepicker();
    var type = '{{ $_GET['type'] }}';
    var from = '{{ $_GET['from'] }}';
    var to = '{{ $_GET['to'] }}';
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('TurnOver_Report') }}",
                data: function (d) {
                    d.type = type,
                    d.from = from,
                    d.to = to
                }
            },  
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                },
                {
                    data: 'user_name',
                    name: 'UserName'
                },
                {
                    data: 'play_amount',
                    name: 'Unique Id'
                },
                {
                    data: 'win_amount',
                    name: 'Chips'
                },

                {
                    data: 'end_amount',
                    name: 'Is Online'
                },
                {
                    data: 'super_distri_commission_amount',
                    name: 'Last Login'
                },
                {
                    data: 'distri_commission_amount',
                    name: 'Last Login'
                },
                {
                    data: 'commission_amount',
                    name: 'Last Login'
                },
                {
                    data: 'ntp_amount',
                    name: 'action',
                },
            ],
            order: [
                [6, 'desc']
            ]
        });
        var table = $('.data-table-top').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
            ajax: {
                url: "{{ route('TurnOver_Report.top') }}",
                data: function (d) {
                    d.type = type,
                    d.from = from,
                    d.to = to
                }
            },
            columns: [{
                    data: 'play_amount',
                    name: 'Unique Id'
                },
                {
                    data: 'win_amount',
                    name: 'Chips'
                },

                {
                    data: 'end_amount',
                    name: 'Is Online'
                },
                {
                    data: 'commission_amount',
                    name: 'Last Login'
                },
                {
                    data: 'ntp_amount',
                    name: 'action',
                },
            ]
        });
    });
    </script>
@endpush
