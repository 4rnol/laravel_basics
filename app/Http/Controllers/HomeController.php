<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        return view('home');
    }
    public function tables()
    {
        $users = User::all();

        return view('users_table',compact('users'));
    }
    public function userEdit(User $user)
    {
        return view('user_edit',compact('user'));
    }
    public function userUpdate(Request $request, User $user){
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->user_role = $request->user_role;
        $user->save();

        $users = User::all();
        return view('users_table',compact('users'));
    }
    public function userDestroy(User $user)
    {
        $user->delete();
        $users = User::all();

        return view('users_table',compact('users'));
    }

}
