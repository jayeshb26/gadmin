@extends('layout.master')

@section('content')
    <h1>Unlock User</h1>

    <p>Are you sure you want to unlock this user?</p>

    <form action="{{ route('user.unlock', $user->_id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success">Unlock User</button>
    </form>
@endsection
