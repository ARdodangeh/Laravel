@extends('layouts.app')
@section('content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="Title" class="form-label">Title</label>
        <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="Title">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="Body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="Body" cols="30" rows="10">{{ old('body') }}</textarea>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="Image" class="form-label">Image</label>
        <input name="image" type="file" class="form-control" id="Image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection