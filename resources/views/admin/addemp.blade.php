@extends('layout.admin')
@section('content')
<div class="form-container">
    <div class="form-heading">
        <p>Add employee</p>
    </div>
    <form action="{{ route('admin.addemp') }}" method="POST">
        @csrf
        <div class="form-field">
            <p>Name</p>
            <input type="text" name="name">
        </div>
        @error('name')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <p>Email</p>
            <input type="text" name="email">
        </div>
        @error('email')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <p>Password</p>
            <input type="password" name="password">
        </div>
        @error('password')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <input type="submit" value="Register">
        </div>
    </form>
</div>
@endsection
