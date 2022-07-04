@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}}
</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <td>#</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Email</td>
            <td>Created at</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td><a href="{{route('users.show', $user->id)}}">{{$user->id}}</a></td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}
@endsection