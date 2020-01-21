<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Move;

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
        $moves=Move::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(7);
        return view('home')->with('moves',$moves);
    }

}
