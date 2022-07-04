@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        User
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$user->first_name}} {{$user->last_name}}</h5>
        <p class="card-text">{{$user->email}}</p>
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection