<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'image' => 'nullable|image',
        ]);
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }
        $data = array_merge($validated_data, ['user_id' => auth()->user()->id], ['image' => $image]);
        Post::create($data);
        session()->flash('message', 'Post created successfully');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if ($post->comments()->exists()) {
            $post->comments()->delete();
        }
        $post->delete();
        session()->flash('message', 'Post deleted successfully');
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $like = DB::table('postusers')->where('post_id', '=', $post->id)->get();
        $count = count($like);
        return view('post.show', compact('post', 'count'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated_data = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:5',
        ]);
        $post->update($validated_data);
        session()->flash('message', 'Post edited successfully');
        return redirect()->route('posts.index');
    }
}
