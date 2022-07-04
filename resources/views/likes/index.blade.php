@extends('layouts.app')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Liked</td>
            <td>Created at</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($likes as $like)
            <tr>
                <td class="align-middle">{{$like->user->first_name}} {{$like->user->last_name}}</td>
                <td class="align-middle">{{$like->user->email}}</td>
                <td class="align-middle">{{$like->post->title}}</td>
                <td class="align-middle">{{$like->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection