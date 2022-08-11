<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Apply;
class JobManageController extends Controller
{
    public function allJobs(){
        $jobs = Job::all();
        return view('admin.jobs.all',compact('jobs'));
    }
    public function activeJobs(){
        $activejobs = Job::where('status','Active')->get();
        return view('admin.jobs.active',compact('activejobs'));
    }
    public function deactiveJobs(){
        $deactivejobs = Job::where('status','Deactive')->get();
        return view('admin.jobs.deactive',compact('deactivejobs'));
    }

    public function applyJobs(){
        $jobapply = Apply::all();
        return view('admin.jobs.apply',compact('jobapply'));
    }
}
