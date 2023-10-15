@extends('layout.master')

@section('content')
    <h1>Lock User</h1>

    <p>Are you sure you want to lock this user?</p>

    <form action="{{ route('user.lock', $user->_id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-danger">Lock User</button>
    </form>
@endsection
