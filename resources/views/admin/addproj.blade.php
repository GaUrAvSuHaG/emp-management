@extends('layout.admin')
@section('content')
<div class="form-container">
    <div class="form-heading">
        <p>Add Project</p>
    </div>
    <form action="{{ route('admin.addproj') }}" method="POST">
        @csrf
        <div class="form-field">
            <p>Name</p>
            <input type="text" name="name">
        </div>
        @error('name')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <p>Description</p>
            <input type="text" name="desc">
        </div>
        @error('desc')
        <p class="errorp">{{ $message }}</p>
        @enderror
        <div class="form-field">
            <input type="submit" value="Add">
        </div>
    </form>
</div>
@endsection
