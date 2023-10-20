@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />

    <style>
        #superDistributerId,
        #role,
        #s1 {
            display: none;

        }
    </style>
@endpush

@section('content')
    {{-- <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Forms</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
  </ol>
</nav> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h6>Edit User</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('msg'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::has('msg') ? Session::get('msg') : '' }}
                        </div>
                    @elseif(Session::has('success'))
                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                    @endif

                    @php
                        if (request()->segment(1) == 'retailer') {
                            $role = 'retailer';
                        } elseif (request()->segment(1) == 'distributer') {
                            $role = 'distributer';
                        } elseif (request()->segment(1) == 'super') {
                            $role = 'superDistributer';
                        } elseif (request()->segment(1) == 'superAdmin') {
                            $role = 'superAdmin';
                        }
                    @endphp
                    <form method="post" action="{{ url($role . '/' . $edata['_id']) }}">
                        @csrf
                        @method('PUT')
                        {{-- @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">{{Session::get("error")}}</div>
                        @elseif(Session::has('success'))
                            <div class="alert alert-success" role="alert">{{Session::get("success")}}</div>
                        @endif --}}
                        {{-- <div class="form-group d-flex">
                        <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Username</label>
                        <div class="col-sm-6"> --}}
                        <input type="hidden"
                            class="form-control ui-autocomplete-input @error('username') is-invalid @enderror"
                            id="exampleInputUsername1" value="{{ $edata['userName'] }}" name="username" autocomplete="off"
                            placeholder="Enter Username">
                        {{-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Name</label>
                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control ui-autocomplete-input @error('name') is-invalid @enderror"
                                    id="exampleInputUsername1" value="{{ $edata['name'] }}" name="name"
                                    autocomplete="off" placeholder="Enter Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (Session::get('role') == 'Admin')
                            <div class="form-group d-flex">
                                <label class="col-sm-2 offset-lg-1 text-right control-label mt-2" id="role">Role
                                    Management</label>
                                <div class="col-sm-6">
                                    <div class="form-group mb-2">
                                        <select class="form-control hiddenselect" name="role" id="role" readonly>
                                            <option selected readonly disabled>Select Role</option>
                                            @if (Session::get('role') == 'Admin' ||
                                                    Session::get('role') == 'super_distributor' ||
                                                    Session::get('role') == 'distributor')
                                                @if ($edata['is_franchise'] == 1)
                                                    <option value="3"
                                                        {{ $edata['role'] == 'super_distributor' ? 'selected' : '' }}
                                                        readonly>
                                                        Super Distributor
                                                    </option>
                                                    <option value="5"
                                                        {{ $edata['role'] == 'distributor' ? 'selected' : '' }} readonly>
                                                        Distributor
                                                    </option>
                                                    <option value="7"
                                                        {{ $edata['role'] == 'player' ? 'selected' : '' }} readonly>
                                                        Player
                                                    </option>
                                                @else
                                                    <option value="1"
                                                        {{ $edata['role'] == 'admin' ? 'selected' : '' }} readonly>
                                                        Admin
                                                    </option>
                                                    <option value="3"
                                                        {{ $edata['role'] == 'super_distributor' ? 'selected' : '' }}
                                                        readonly>
                                                        Super Distributor
                                                    </option>
                                                    <option value="5"
                                                        {{ $edata['role'] == 'distributor' ? 'selected' : '' }} readonly>
                                                        Distributor
                                                    </option>
                                                    <option value="7"
                                                        {{ $edata['role'] == 'player' ? 'selected' : '' }} readonly>
                                                        player
                                                    </option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        @if (Session::get('role') == 'Admin')
                            @if ($edata['role'] == 'Admin')
                                <input type='hidden' class='form-control ui-autocomplete-input' id='exampleInputUsername1'
                                    value='{{ $edata['referralId'] }}' name='referralId' autocomplete='off'
                                    placeholder='Enter Firm Name'>
                                <div class="form-group d-flex" id="referral2">
                                    <label class="col-sm-2 offset-lg-1 text-right control-label mt-2"
                                        id="s1">Substitute</label>
                                    <div class="col-sm-6" id="s2">
                                        <div class="form-group mb-2">
                                            <select class="form-control superDistributerId" name="superDistributerId"
                                                id="superDistributerId">
                                                <option selected disabled>Select Super Distributor</option>
                                                @foreach ($udata as $value)
                                                    @if ($edata['referralId'] == $value['_id'])
                                                        <option value="{{ $edata['referralId'] }}"
                                                            {{ $edata['referralId'] == $value['_id'] ? 'selected' : '' }}>
                                                            {{ $value['userName'] . ' ' . $value['name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('superDistributer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @elseif($edata['role'] == 'super_distributor')
                                <input type='hidden' class='form-control ui-autocomplete-input' id='exampleInputUsername1'
                                    value='{{ $edata['referralId'] }}' name='referralId' autocomplete='off'
                                    placeholder='Enter Firm Name'>
                                <div class="form-group d-flex" id="referral2">
                                    <label class="col-sm-2 offset-lg-1 text-right control-label mt-2"
                                        id="s1">Substitute</label>
                                    <div class="col-sm-6" id="s2">
                                        <div class="form-group mb-2">
                                            <select class="form-control superDistributerId" name="superDistributerId"
                                                id="superDistributerId">
                                                <option selected disabled>Select Super Distributor</option>
                                                @foreach ($udata as $value)
                                                    @if ($edata['referralId'] == $value['_id'])
                                                        <option value="{{ $edata['referralId'] }}"
                                                            {{ $edata['referralId'] == $value['_id'] ? 'selected' : '' }}>
                                                            {{ $value['userName'] . ' ' . $value['name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('superDistributer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @elseif($edata['role'] == 'distributor')
                                <div class="form-group d-flex" id="referral2">
                                    <label class="col-sm-2 offset-lg-1 text-right control-label mt-2"
                                        id="s1">Substitute</label>
                                    <div class="col-sm-6" id="s2">
                                        <div class="form-group mb-2">
                                            <select class="form-control superDistributerId" name="superDistributerId"
                                                id="superDistributerId">
                                                <option selected disabled>Select Super Distributor</option>
                                                @foreach ($udata as $value)
                                                    @if ($edata['referralId'] == $value['_id'])
                                                        <option value="{{ $edata['referralId'] }}"
                                                            {{ $edata['referralId'] == $value['_id'] ? 'selected' : '' }}>
                                                            {{ $value['userName'] . ' ' . $value['name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('superDistributer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @elseif($edata['role'] == 'player')
                                <div class="form-group d-flex" id="referral2">
                                    <label class="col-sm-2 offset-lg-1 text-right control-label mt-2"
                                        id="s1">Substitute</label>
                                    <div class="col-sm-6" id="s2">
                                        <div class="form-group mb-2">
                                            <select class="form-control superDistributerId" name="superDistributerId"
                                                id="superDistributerId">
                                                <option selected>Select Super Distributor</option>
                                                @foreach ($udata as $value)
                                                    @if ($edata['referralId'] == $value['_id'])
                                                        <option value="{{ $edata['referralId'] }}"
                                                            {{ $edata['referralId'] == $value['_id'] ? 'selected' : '' }}>
                                                            {{ $value['userName'] . ' ' . $value['name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('superDistributer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @else
                            @if ($edata['role'] == 'super_distributor' || $edata['role'] == 'distributor' || $edata['role'] == 'player')
                                <input type='hidden' class='form-control ui-autocomplete-input'
                                    id='exampleInputUsername1' value='{{ $edata['referralId'] }}' name='referralId'
                                    autocomplete='off' placeholder='Enter Firm Name'>
                                <input type='hidden' class='form-control ui-autocomplete-input'
                                    id='exampleInputUsername1' value='{{ $edata['role'] }}' name='role'
                                    autocomplete='off' placeholder='Enter Firm Name'>
                            @endif
                        @endif

                        <div class="d-flex" id="referral">

                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Password</label>
                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control ui-autocomplete-input @error('password') is-invalid @enderror"
                                    id="exampleInputUsername1" value="{{ $edata['password'] }}" name="password"
                                    autocomplete="off" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Transaction Pin</label>
                            <div class="col-sm-6">
                                <input type="number"
                                    class="form-control ui-autocomplete-input @error('transactionPin') is-invalid @enderror"
                                    id="exampleInputUsername1" value="{{ $edata['transactionPin'] }}"
                                    name="transactionPin" autocomplete="off" placeholder="Enter Transaction Pin">
                                @error('transactionPin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Commission %</label>
                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control ui-autocomplete-input @error('commissionPercentage') is-invalid @enderror"
                                    id="exampleInputUsername1" value="{{ $edata['commissionPercentage'] }}"
                                    name="commissionPercentage" autocomplete="off"
                                    placeholder="Enter CommissionPercentage" readonly>
                                @error('commissionPercentage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  --}}
                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Total Play Point</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control ui-autocomplete-input "
                                    value="{{ $edata['playPoint'] }}" readonly autocomplete="off"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Total Win Point</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control ui-autocomplete-input "
                                    value="{{ $edata['wonPoint'] }}" readonly autocomplete="off"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2">Register Date</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control ui-autocomplete-input "
                                    value="{{ date('d-m-Y h:i:s A', strtotime($edata['created_at'])) }}" readonly
                                    autocomplete="off" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group d-flex" id="perissions">
                            <div class="col-sm-3">
                                <input type="hidden" class="form-check-input" name="permission[]" id="retailer"
                                    value="retai">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-2 offset-lg-1 text-right control-label mt-2"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#role').change(function() {
                var Role = $(this).val();
                // alert(Role);
                var uri;
                if (parseInt(Role) == 1) {
                    $('#s1').hide();
                    $('#s2').hide();
                    $('#s1').closest('.form-group').css('margin-bottom', '0px');
                    uri = "{{ url('/get_data') }}";
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url: uri,
                        type: 'POST',
                        data: {
                            role: Role,
                            _token: token
                        },
                        success: function(res) {
                            $('#referral').html(res);
                            $('#perissions').show();
                        }
                    });
                } else if (parseInt(Role) == 3) {
                    $('#s1').hide();
                    $('#s2').hide();
                    $('#s1').closest('.form-group').css('margin-bottom', '0px');
                    uri = "{{ url('/get_data') }}";
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url: uri,
                        type: 'POST',
                        data: {
                            role: Role,
                            _token: token
                        },
                        success: function(res) {
                            $('#referral').html(res);
                        }
                    });
                } else if (parseInt(Role) == 5) {
                    $('#s1').hide();
                    $('#s2').hide();
                    $('#s1').closest('.form-group').css('margin-bottom', '0px');
                    uri = "{{ url('/get_data') }}";
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url: uri,
                        type: 'POST',
                        data: {
                            role: Role,
                            _token: token
                        },
                        success: function(res) {
                            $('#referral').addClass('form-group');
                            $('#referral').html(res);
                        }
                    });
                } else if (parseInt(Role) == 7) {
                    $('#s1').show();
                    $('#s2').show();
                    $('#s1').closest('.form-group').css('margin-bottom', '11px');
                    uri = "{{ url('/get_data') }}";
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url: uri,
                        type: 'POST',
                        data: {
                            role: Role,
                            _token: token
                        },
                        success: function(res) {
                            $("#retailer").attr("checked", "checked");
                            $('.superDistributerId').html(res);
                            $('#referral1').html(res);
                        }
                    });
                }
                $('#superDistributerId').change(function() {
                    var id = $(this).val();
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ url('/get_distributer') }}",
                        type: 'POST',
                        data: {
                            role: id,
                            _token: token
                        },
                        success: function(res) {
                            $('#referral').addClass('form-group');
                            $('#referral').html(res);
                        }
                    });
                });
            });
        });
    </script>
@endpush
