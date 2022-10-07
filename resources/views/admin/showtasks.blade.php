@extends('layout.admin')
@section('content')
<div class="show-tasks">
    <h2>{{ $employee->name }} has the following tasks for {{ $project->name }} project</h2>
    @if($tasks->count() > 0)
    @foreach ($tasks as $t )
    <div class="tasks">
        <p>{{ $t->name }}</p>
        <p>{{ $t->status }}</p>
    </div>
    @endforeach
    @else
    <p>No tasks Assigned</p>
    @endif
</div>
@endsection
