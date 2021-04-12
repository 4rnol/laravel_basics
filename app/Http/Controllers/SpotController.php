<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spots = Spot::all();
        return view('spot/spots_table',compact('spots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers=Provider::all();
        return view('spot/create',compact('providers'));
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
            'name' => ['required', 'string','min:2', 'max:255'],
            'title' => ['required', 'string','min:2', 'max:255'],
            'subtitle' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string','min:5', 'max:255'],
            'status' =>['required', 'string','min:5', 'max:255'],
            'providers_id' => 'required'
        ]);

        Spot::create($request->all());

        return redirect()->route('spots.index')
            ->with('success','Spot created successfully.');
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
    public function edit(Spot $spot)
    {
        $providers=Provider::all();
        return view('spot/edit',compact('spot','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'name' => ['required', 'string','min:2', 'max:255'],
            'title' => ['required', 'string','min:2', 'max:255'],
            'subtitle' => ['required', 'string','min:2', 'max:255'],
            'description' => ['required', 'string','min:2', 'max:255'],
            'status' => ['required', 'string','min:2', 'max:255'],
            'providers_id' => 'required'
        ]);
        $spot->name = $request->name;
        $spot->title = $request->title;
        $spot->subtitle = $request->subtitle;
        $spot->description = $request->description;
        $spot->status = $request->status;
        $spot->providers_id = $request->providers_id;

        $spot->save();

        return redirect()->route('spots.index')
            ->with('success','Payment modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spot $spot)
    {
        $spot->delete();
        return back()->with('success','Spot deleted successfully.');
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
