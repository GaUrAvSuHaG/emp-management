@extends('layout.admin')
@section('content')
<div class="add-task-form">

    <div class="form-container">
        <h2>Assigning to - {{ $employee->name }}</h2>
        <h2>Project Name - {{ $project->name }}</h2>
        <div class="form-heading">
            <p>Add Task</p>
        </div>
        <form action="{{ route('admin.posttask',['emp'=>$employee->id]) }}" method="POST">
            @csrf
            <div class="form-field">
                <p>Task details</p>
                <input type="text" name="name">
                <input type="hidden" name="user_id" value="{{ $employee->id }}">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
            </div>
            @error('name')
            <p class="errorp">{{ $message }}</p>
            @enderror
            <div class="form-field">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
@endsection
