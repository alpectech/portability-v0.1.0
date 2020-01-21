<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Move;
use App\Constituency;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $constituencies=Constituency::pluck('name','id');
        return view('move.create')->with('constituencies',$constituencies);
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
            'originConstituency'=>'required',
            'originWard'=>'required',
            'originEstate'=>'nullable|max:30',
            'destinationConstituency'=>'required',
            'destinationWard'=>'required',
            'destinationEstate'=>'nullable|max:30',
            'freight'=>'required',
            'date'=>'required',
            'paymentTerms'=>'required'
        ]);
        $origin=$request->input('originConstituency').','.$request->input('originWard').','.$request->input('originEstate');
        $destination=$request->input('destinationConstituency').','.$request->input('destinationWard').','.$request->input('destinationEstate');
        //Store moving information in moves table
        $move=new Move;
        $move->origin=$origin;
        $move->destination=$destination;
        $move->freight=$request->input('freight');
        $move->depature=$request->input('date');
        $move->mode_of_payment=$request->input('paymentTerms');
        $move->user_id=auth()->user()->id;
        $move->save();

        return redirect('/move/create')->with('success','Request Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
