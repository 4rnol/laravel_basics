<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $user = Auth::user();
        return view('home',compact('user'));
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
        $request->validate([
            'first_name' => [ 'string','min:2', 'max:255'],
            'last_name' => [ 'string','min:2', 'max:255'],
            'email' => [ 'string','min:2', 'max:255'],
            'phone_number' => [ 'string','min:2', 'max:255'],
            'fb_id' => [ 'string','min:2', 'max:255'],
            'user_role' => [ 'string','min:2', 'max:255'],

        ]);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->user_role = $request->user_role;

            if ($request->password) $user->password = Hash::make($request->password);

            $user->save();
            return $this->tables();

    }
    public function userDestroy(User $user)
    {
        $user->delete();


        return $this->tables();
    }

}
