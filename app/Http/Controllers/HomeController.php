<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = event::orderBy("created_at","desc")->paginate(4);
        return view('home')->with(compact('data'));
    }
    
}
