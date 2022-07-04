<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'body' => 'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        session()->flash('message', 'Comment created successfully');
        return back();
    }
}
