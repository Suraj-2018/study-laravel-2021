<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'password' => ['required','string','min:8','confirmed'],
        ]);


        $user = User::find(base64_decode($request->id));

        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('home')->with('success', 'User Updated Successfully');
        
    }

    public function adminEdit($id)
    {
        $users = User::find(base64_decode($id));
        return view('edit-user',compact('users'));
    }

    Public function updateAdminUser(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'password' => ['required','string','min:8','confirmed'],
        ]);


        $user = User::find(base64_decode($request->id));

        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('home')->with('success', 'User Updated Successfully');
    }

    public function adminDelete($id)
    {
        $user = User::find(base64_decode($id));
        $user->delete();
        return redirect()->route('home')->with('success', 'User Deleted Successfully');
    }
}
