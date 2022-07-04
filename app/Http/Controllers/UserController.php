<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{



    public function create()
    {
        return view('user.create');
    }



    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $validator->validate();
        User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        session()->flash('message', 'User created successfully');
        return redirect()->route('users.index');
    }


    
    public function index()
    {
        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }



    public function destroy(User $user)
    {
        if ($user->posts()->exists()) {
            $user->posts()->delete();
        }
        $user->delete();
        session()->flash('message', 'User deleted successfully');
        return redirect()->route('users.index');
    }



    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }



    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:8',
        ]);
        $data = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
        ];
        if (isset($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }
        $user->update($data);
        session()->flash('message', 'User updated successfully');
        return redirect()->route('users.index');
    }



    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }
}
