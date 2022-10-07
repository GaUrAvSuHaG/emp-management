@extends('layout.main')
@section('content')
<div class="form-container">
    <div class="form-heading">
        <p>Admin Login</p>
    </div>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-field">
            <p>Email</p>
            <input type="text" name="email">
        </div>
        @error('email')
        <p class="errorp">{{ $message }}</p>
        @enderror
        @if (Session::has('fail'))
            <p class="errorp">
                {{ Session::get('fail') }}
            </p>
        @endif
        <div class="form-field">
            <p>Password</p>
            <input type="password" name="password">
        </div>
        @error('password')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <input type="submit" value="Login">
        </div>
    </form>
</div>
@endsection
