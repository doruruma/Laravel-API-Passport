<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct() 
    {
        $this->middleware('login');
    }
    
    public function index()
    {
        $data = Auth::user();
        return view('home', compact('data'));
    }

}
