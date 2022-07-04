@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}}
</div>
@endif
<a href="{{route('posts.create')}}" class="d-block btn btn-success">Create post</a>
<table class="table table-hover">
    <thead>
        <tr>
            <td>#</td>
            <td>Image</td>
            <td>Title</td>
            <td>Body</td>
            <td>User fullname</td>
            <td>Created at</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td class="align-middle">
                    <a href="{{route('posts.show', $post->id)}}">
                        {{$post->id}}
                    </a>
                </td>
                <td class="align-middle">
                    <img width="100px" height="75px" class="rounded" src="{{asset('storage/' . $post->image)}}" alt="No images">
                </td>
                <td class="align-middle">{{$post->title}}</td>
                <td class="align-middle">{{$post->body}}</td>
                <td class="align-middle">{{$post->user->first_name}} {{$post->user->last_name}}</td>
                <td class="align-middle">{{$post->created_at}}</td>
                <td class="align-middle">
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}
@endsection