<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function show(){
        $spots = Spot::all();
        return view('spot/spots_table',compact('spots'));
    }
    public function spotProvidersTable(Spot $spot)
    {

        $spots = Spot::with('providers')->get();
        $providers=[];
        foreach ($spots as $spt){
            if($spt->id==$spot->id) {
                $providers=$spt->providers;
            }
        }
        return view('spot/spot_providers',compact('providers'));
    }

}
