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
        $activejobs = Job::where('status',1)->get();
        return view('admin.jobs.active',compact('activejobs'));
    }
    public function deactiveJobs(){
        $deactivejobs = Job::where('status',0)->get();
        return view('admin.jobs.deactive',compact('deactivejobs'));
    }

    public function applyJobs(){
        $jobapply = Apply::all();
        return view('admin.jobs.apply',compact('jobapply'));
    }
    public function categoryJob($id){

        $categoryJobs = Job::where('category_id',$id)->get();
        
        return view('pages.job.category-job',compact('categoryJobs'));

    }
    public function statusactive(Request $request, $id){
        $job = Job::where('id',$id)->first();
        $job->status = 1;
        $job->save();
       return redirect()->back()->with('success','Job Status Updated!');
      


    }
    public function statusdeactive(Request $request, $id){
        $job = Job::where('id',$id)->first();
        $job->status = 0;
        $job->save();
    //   // return redirect()->back();
    //    return response()->json([
    //     'message'=>'success fully update status',
    //     'user' => $user,
    //    ]);
    return redirect()->back()->with('success','Job Status Updated!');

    }
}
