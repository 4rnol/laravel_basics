<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function getUsr(){
        return Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr=$this->getUsr();
        $providers = Provider::all();
//        $providers = DB::table('providers')->paginate(15);
//        return $providers->{'data'};
        return view('provider/providers_table',compact('providers','usr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr=$this->getUsr();
        $users=User::all();
        return view('provider/create',compact('users','usr'));
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
            'bussines_name' => ['required', 'string','min:2', 'max:255'],
            'address' => ['required', 'string','min:2', 'max:255'],
            'business_phone' => ['required', 'min:2', 'max:255'],
            'website' => ['required', 'string','min:5', 'max:255'],
            'dob' => 'required',
            'users_id' => 'required'
        ]);

        Provider::create($request->all());

        return redirect()->action('ProviderController@index')->with('success','Provider created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $usr=$this->getUsr();
        $users=User::all();
        return view('provider/edit',compact('provider','users','usr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'bussines_name' => ['required', 'string','min:2', 'max:255'],
            'address' => ['required', 'string','min:2', 'max:255'],
            'business_phone' => ['required', 'min:2', 'max:255'],
            'website' => ['required', 'string','min:5', 'max:255'],
            'dob' => 'required',
            'users_id' => 'required'

        ]);

        $provider->bussines_name = $request->bussines_name;
        $provider->address = $request->address;
        $provider->business_phone = $request->business_phone;
        $provider->website = $request->website;
        $provider->dob = $request->dob;
        $provider->users_id = $request->users_id;

        $provider->save();
        return redirect()->route('providers.index')->with('success','Provider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return back()->with('success','Provider deleted successfully.');
    }
}
