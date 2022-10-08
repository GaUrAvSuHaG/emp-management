@extends('layout.emp')
@section('content')
<div class="my-projects">
    <h2>Projects assigned to {{ $user->name }}</h2>
    @if($user->projects->count() > 0)
    @foreach ($user->projects as $p)
        <p>{{$p->name }}</p>
        <a href="{{ route('emp.projinfo',['id'=>$p->id]) }}">Details</a>
    @endforeach
    @else
    <p>No Projects Assigned</p>
    @endif
</div>
@endsection
