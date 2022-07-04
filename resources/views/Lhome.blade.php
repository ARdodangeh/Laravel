@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col">
                            <div class="card">
                                <img width="200px" height="175px" src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="No images">
                                <div class="card-body">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->body}}</p>
                                    <span>{{$post->created_at}}</span>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-success" href="{{route('posts.show', $post->id)}}">
                                        <span>Show more</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection