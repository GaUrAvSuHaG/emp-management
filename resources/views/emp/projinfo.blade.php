@extends('layout.emp')
@section('content')
<div class="show-tasks">
    <h2>Tasks assigned to you on {{ App\Models\Project::find($pid)->name }}</h2>
    @if($tasks->count() > 0)
    @foreach ($tasks as $task )
    <div class="tasks">
        <p>{{ $task->name }}</p>
        <form action="{{ route('emp.updatestatus') }}">
            <select name="status">
                <option value="pending" {{$task->status =='pending'?'selected':'' }}>Pending</option>
                <option value="completed" {{$task->status =='completed'?'selected':'' }}>Completed</option>
            </select>
            <input style="margin-left: 20px" type="submit" value="Update status">
            <input type="hidden" name = "id" value="{{ $task->id}}">
        </form>
    </div>

    @endforeach
    @else
    <p>
        No tasks assigned yet!!
    </p>
    @endif
</div>
@endsection
