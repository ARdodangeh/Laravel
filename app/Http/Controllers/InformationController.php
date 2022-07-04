<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        return view('information.index', compact('informations'));
    }

    public function create()
    {
        return view('information.create');
    }
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'education' => 'required',
            'city' => 'required',
        ]);
        $validator->validate();
        Information::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'gender' => request('gender'),
            'age' => request('age'),
            'education' => request('education'),
            'city' => request('city'),
        ]);
        session()->flash('message', 'Information recieved successfully');
        return redirect()->route('informations.index');
    }
    public function male()
    {
        $males = DB::table('information')->where('gender', '=', 'male')->get();
        return view('information.male', compact('males'));
    }
    public function female()
    {
        $females = DB::table('information')->where('gender', '=', 'female')->get();
        return view('information.female', compact('females'));
    }
    public function bachelor()
    {
        $bachelors = DB::table('information')->where('education', '=', 'bachelor')->get();
        return view('information.bachelor', compact('bachelors'));
    }
    public function master()
    {
        $masters = DB::table('information')->where('education', '=', 'master')->get();
        return view('information.master', compact('masters'));
    }
    public function tehran()
    {
        $tehrans = DB::table('information')->where('city', '=', 'tehran')->get();
        return view('information.tehran', compact('tehrans'));
    }
    public function mashhad()
    {
        $mashhads = DB::table('information')->where('city', '=', 'mashhad')->get();
        return view('information.mashhad', compact('mashhads'));
    }
    public function esfahan()
    {
        $esfahans = DB::table('information')->where('city', '=', 'esfahan')->get();
        return view('information.esfahan', compact('esfahans'));
    }
    public function sort()
    {
        $sorts = DB::table('information')->orderBy('age')->get();
        return view('information.sort', compact('sorts'));
    }
}
