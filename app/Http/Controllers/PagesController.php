<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    // public function storage(){
    // 	return view('pages.storage');
    // }

    // public function enquiry(){
    //     return view('pages.enquiry');
    // }
}