<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use DB;
use Carbon\Carbon;



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
      
        $posts = Job::where('status','Active')->get();

        return view('home',compact('posts'));
    }
}
