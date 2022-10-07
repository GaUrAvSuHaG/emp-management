@extends('layout.admin')
@section('content')
    <div class="list-data-container">
        <h2>List of Employees</h2>

        @foreach ($emps as $e)
            <div class="list-data-fields">
                <div class="list-data-name">
                    <p>Name</p>
                </div>
                <div class="list-data-name">
                    <p>{{ $e->name }}</p>
                </div>
                <div class="list-data-name">
                    <p>Email</p>
                </div>
                <div class="list-data-name">
                    <p>{{ $e->email }}</p>
                </div>
                <div class="list-data-name">
                    <a href="{{ route('admin.showempinfo',['id'=>$e->id]) }}">More Info</a>
                </div>

            </div>
        @endforeach

    </div>
@endsection
