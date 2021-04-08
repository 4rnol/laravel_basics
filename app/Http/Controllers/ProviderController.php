<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Spot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
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
    public function create()
    {
        return view('provider_create');
    }

    public function show()
    {
        $providers = Provider::all();
        return view('provider/providers_table',compact('providers'));
    }

    public function userProviderTable(User $user)
    {
        $providers = User::find($user->id)->providers;
        return view('provider/user_provider_table',compact('providers'));
    }

    public function providerSpotsTable(Provider $provider)
    {
        $spots = Provider::find($provider->id)->spots;
        return view('provider/provider_spots',compact('spots'));
    }
}
