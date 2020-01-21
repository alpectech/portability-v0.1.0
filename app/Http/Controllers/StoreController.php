<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constituency;
use App\Warehouse;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses=Warehouse::pluck('address','id');
        $constituencies=Constituency::pluck('name','id');
        $data=array(
            'warehouses'=>$warehouses,
            'constituencies'=>$constituencies
        );
        return view('store.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'location'=>'required',
            'pickupConstituency'=>'required',
            'pickupWard'=>'required',
            'pickupEstate'=>'nullable|max:30',
            'freight'=>'required',
            'pickupDate'=>'required',
            'paymentTerms'=>'required',
        ]);

        $pickupPoint=$request->input('pickupConstituency').','.$request->input('pickupWard').','.$request->input('pickupEstate');
        //Store moving information in moves table
        $store=new Store;
        $store->location=$request->input('location');
        $store->pickup_point=$pickupPoint;
        $store->freight=$request->input('freight');
        $store->pickup_date=$request->input('pickupDate');
        $store->mode_of_payment=$request->input('paymentTerms');
        $store->user_id=auth()->user()->id;
        $store->save();

        return redirect('/store/create')->with('success','Request Submitted Successfully');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
