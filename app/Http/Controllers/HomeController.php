<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

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
        $recentJob = Job::where('status','Active')->paginate(2);
        $categoryAll = Category::all();

        return view('home',compact('posts','recentJob','categoryAll'));
    }
}
