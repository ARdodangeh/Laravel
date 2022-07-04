@extends('layouts.app')
@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="No images">
    </div>
    <div class="mb-3">
        <label for="Title" class="form-label">Title</label>
        <input value="{{ old('title', $post->title) }}" name="title" type="text" class="form-control" id="Title">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="Body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="Body" cols="30" rows="10">{{ old('body', $post->body) }}</textarea>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection