<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Provider;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
        $payments=Payment::all();
        return view('payment/index',compact('payments','usr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr=$this->getUsr();
        $providers = Provider::all();
        $spots = Spot::all();
        return view('payment/create',compact('providers','spots','usr'));
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
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string','min:2', 'max:255'],
            'provider_id' => 'required',
            'spot_id' => 'required'
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')
            ->with('success','Payment created successfully.');
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
    public function edit(Payment $payment)
    {
        $usr=$this->getUsr();
        $providers = Provider::all();
        $spots = Spot::all();
        return view('payment/edit',compact('payment','providers','spots','usr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string','min:2', 'max:255'],
            'providers_id' => 'required',
            'spots_id' => 'required'
        ]);

        $payment->amount = $request->amount;
        $payment->description = $request->description;
        $payment->provider_id = $request->providers_id;
        $payment->spot_id = $request->spots_id;

        $payment->save();

        return redirect()->route('payments.index')
            ->with('success','Payment modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success','Payment deleted successfully.');
    }
}
