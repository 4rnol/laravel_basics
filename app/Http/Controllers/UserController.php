<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//
//    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getUsr(){
        return Auth::user();
    }

    public function index()
    {
        $usr=$this->getUsr();
        $users = User::all();
        return view('user/index',compact('users','usr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string','min:2', 'max:255'],
            'last_name' => ['required', 'string','min:2', 'max:255'],
            'email' => ['required', 'min:2', 'max:255','unique:users'],
            'phone_number' => ['required', 'string','min:5', 'max:255'],
            'fb_id' => 'required',
            'user_role' => 'required',
            'password' => ['required','string', 'min:3']
        ]);
        $user = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'fb_id' => $request->get('fb_id'),
            'user_role' => $request->get('user_role'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();
        $users = User::all();
        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $usr=$this->getUsr();
        return view('user/edit',compact('user','usr'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => [ 'string','min:2', 'max:255'],
            'last_name' => [ 'string','min:2', 'max:255'],
            'email' => [ 'string','min:2', 'max:255'],
            'phone_number' => [ 'string','min:2', 'max:255'],
            'fb_id' => [ 'string','min:2', 'max:255'],
            'user_role' => [ 'string','min:2', 'max:255'],
        ]);

        if ($request->password) $request->validate([
            'password'=>[ 'string','min:2']
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->user_role = $request->user_role;

        if ($request->password) $user->password = Hash::make($request->password);


        $user->save();
        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $users = User::all();
        return back()->with('success','Provider deleted successfully.');;
    }

}
