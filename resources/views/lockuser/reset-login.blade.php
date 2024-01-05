@extends('layout.master')

@section('content')
    <h1>Reset Login</h1>

    <p>Are you sure you want to reset the login status for this user?</p>

    <form action="{{ route('user.reset-login', $user->_id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-warning">Reset Login</button>
    </form>
@endsection
