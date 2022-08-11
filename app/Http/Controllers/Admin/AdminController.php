<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Category;
use App\Models\Apply;

use Auth;

class AdminController extends Controller
{
    public function index(){


        $totalusers = User::all()->count();
        $activeusers = User::where('status',1)->count();
        $deactiveusers = User::where('status',0)->count();

        $jobs = Job::all()->count();
        $activejobs = Job::where('status','Active')->count();
        $deactivejobs = Job::where('status','Deactive')->count();
        $jobapply = Apply::all()->count();
        $category = Category::all()->count();

        return view('Admin.index',compact('totalusers','activeusers','deactiveusers','jobs','activejobs','deactivejobs','jobapply','category'));
    }
    public function login(){
        return view('admin.login');
    }
    public function handleLogin(Request $req)
    {
        if(Auth::guard('admin')
               ->attempt($req->only(['email', 'password'])))
        {
            return redirect()
                ->route('admin.index')->with('success','Successfully login ');
        }
        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }
    public function logout()
    {
        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login.form')->with('success','Successfully Logout!');
    }
}

