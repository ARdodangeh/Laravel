<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Postuser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostuserController extends Controller
{
    public function index()
    {
        $likes = Postuser::all();
        return view('likes.index', compact('likes'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        $likes = DB::table('postusers')->where('user_id', '=', $input['user_id'])->where('post_id', '=', $input['post_id'])->get();
        
        if (isset($likes['0'])) {
            session()->flash('message', 'You like post before');
        } else {
            Postuser::create($input);
            session()->flash('message', 'You like post');
        }
        return back();
    }
}
