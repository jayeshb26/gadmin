@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h5>Users Roles</h5>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="ajax-crud-datatable">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Password</th>
                            <th>Transaction Pin</th>
                            <th>Credit</th>
                            <th>Action</th>
                            <th>Last Login</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  <a href="{{ route('retailer.details', ['id' => $retailer->id]) }}">View Retailer Details</a>  --}}
                        @php
                            $SR_No = 1;
                        @endphp
                        @foreach ($data as $key => $value)
                            <tr role="row" class="odd content">
                                <td class="">{{ $SR_No++ }}</td>
                                <td>
                                    @if ($value['role'] == 'player')
                                        <a href="{{ url('player/detail/' . $value['_id']) }}">{{ $value['userName'] }}<i
                                                class="mdi mdi-eye"></i></a>
                                    @else
                                        <a href="{{ url('detail/' . $value['_id']) }}">{{ $value['userName'] }}<i
                                                class="mdi mdi-eye"></i></a>
                                    @endif
                                </td>
                                <td>{{ Request::segment(2) == 'Franchise' ? 'f_' . $value['role'] : $value['role'] }}</td>
                                {{--  <td>{{ $value->refer->userName ?? '--' }}</td>  --}}
                                <td>{{ $value['password'] }}</td>
                                @if (Session::get('role') == 'Admin')
                                    <td>{{ $value['transactionPin'] }}</td>
                                @endif
                                <td>{{ number_format($value['creditPoint'], 2) }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ url('admin/' . $value['_id'] . '/edit') }}" type="button"
                                            class="btn btn-sm btn-outline-info" title="Edit user"><i
                                                class="mdi mdi-pencil-box" style="font-size:20px;"></i></a>
                                        <a href="{{ url('transfercredit/' . $value['_id']) }}"
                                            class="btn btn-sm btn-outline-success" title="Transfer Credit"><i
                                                class="mdi mdi-package-up" style="font-size:20px;"></i></a>
                                        <a href="{{ url('adjustcredit/' . $value['_id']) }}"
                                            class="btn btn-sm btn-outline-warning" title="Adjust Credit"><i
                                                class="mdi mdi-package-down" style="font-size:20px;"></i></a>
                                    </div>
                                    <div></div>
                                    <div class="btn-group btn-group-sm">
                                        @if ($value['isActive'] == 1)
                                            <a href="{{ url('banuser/' . $value['_id'] . '/' . $value['isActive']) }}"
                                                class="btn btn-sm btn-outline-success" title="Block User"><i
                                                    class="mdi mdi-close-box" style="font-size:20px;"></i></a>
                                        @elseif($value['isActive'] == 0)
                                            <a href="{{ url('banuser/' . $value['_id'] . '/0') }}"
                                                class="btn btn-sm btn-outline-danger" title="Unblock User"><i
                                                    class="mdi mdi-checkbox-marked" style="font-size:20px;"></i></a>
                                        @endif
                                        @if ($value['isActive'] == 1)
                                            <a href="{{ url('blockUser/' . $value['_id'] . '/' . $value['isActive']) }}"
                                                class="btn btn-sm btn-outline-success" title="Deactivate User"><i
                                                    class="mdi mdi-close-octagon" style="font-size:20px;"></i></a>
                                        @elseif($value['isActive'] == 0)
                                            <a href="{{ url('blockUser/' . $value['_id'] . '/0') }}"
                                                class="btn btn-sm btn-outline-danger" title="Activate User"><i
                                                    class="mdi mdi mdi-pause-octagon" style="font-size:20px;"></i></a>
                                        @endif
                                        @if (Session::get('role') == 'Admin')
                                            <a href="{{ url('admin/delete/' . $value['_id']) }}"
                                                class="btn btn-sm btn-outline-danger delete-confirm" title="Delete"><i
                                                    class="mdi mdi-delete" style="font-size:20px;"></i></a>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ date('d-m-Y h:i:s A', strtotime($value['updatedAt'])) }}</td>
                                <td>{{ date('d-m-Y h:i:s A', strtotime($value['createdAt'])) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
@endpush

@push('custom-scripts')
    {{-- <script src="{{ asset('assets/js/data-table.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#ajax-crud-datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ],
                initComplete: function() {
                    var api = this.api();
                    api.columns([2]).indexes().flatten().each(function(i) {
                        var column = api.column(i);
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($("#filterText"))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '' + val + '' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });
        });

        // function filterText() {
        //     var rex = new RegExp($('#filterText').val());
        //     console.log(rex);
        //     if (rex == "/all/") {
        //         clearFilter()
        //     } else {
        //         $('.content').hide();
        //         $('.content').filter(function() {
        //             return rex.test($(this).text());
        //         }).show();
        //     }
        // }

        // function clearFilter() {
        //     $('.filterText').val('');
        //     $('.content').show();
        // }
    </script>

    {{-- <script src="{{ asset('assets/js/sweet-alert.js') }}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'ml-2',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endpush
