<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->type == 'admin')
        {
            $users = User::paginate(10);
        }
        else {
            $users = User::where('id',auth()->user()->id)->paginate(10);
        }
        
        return view('home',compact('users'));
    }
}
