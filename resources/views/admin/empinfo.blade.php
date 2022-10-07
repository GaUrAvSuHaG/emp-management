@extends('admin.home')
@section('content')
    <div class="emp-info-div">
        <h2>{{ $emp->name }}</h2>
        <div class="projects">
            <h2>Projects Assigned</h2>
            <div class="proj-list">
                @if ($emp->projects->count() > 0)
                    @foreach ($emp->projects as $p)
                        <p>{{ $p->name }}</p>
                    @endforeach
                @else
                    <p>No Projects Assigned</p>
                @endif
            </div>

        </div>
        <div class="form-container">
            <form action="{{ route('admin.assignproj') }}" method="POST">
                @csrf
                <div class="form-field">
                    <select name="project_id" id="">
                        <option value="">Select Project..</option>
                        @foreach ($projects as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{ $emp->id }}">
                <div class="form-field">
                    <input type="submit" value="Assign">
                </div>
            </form>
        </div>
    </div>
@endsection
