@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}}
</div>
@endif
<div class="card">
    <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="No images">
    <div class="card-body">
        <h4 class="card-title">{{$post->title}}</h4>
        <span>{{$post->created_at}}</span>
        <br>
        <form method="post" action="{{ route('likes.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
        <input type="submit" class="btn btn-warning" value="Like" />
        </form>
        <i class="bi bi-heart-fill btn">{{ $count }}</i>
        <hr>
        <p class="card-text">{{$post->body}}</p>
    </div>
    <div class="card-footer">
        <h4>Comments</h4>
        <hr>
        @include('comment.display', ['comments' => $post->comments, 'post_id' => $post->id])
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <textarea value="type your comment" class="form-control" name="body"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Comment" />
            </div>
        </form>
    </div>
</div>
@endsection