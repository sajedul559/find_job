<?php

namespace App\Http\Controllers\Backend;

use Auth;
use File;
use App\Models\Job;
use App\Models\Apply;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('pages.profile.index');
    }
    public function postAll(){
        $posts = Job::where('user_id',Auth::user()->id)->get();
        $message = "No post yet";
        return view('pages.post.index',compact('posts','message'));
    }

    public function postForm(){
        $categories = Category::all();
        return view('pages.post.create',compact('categories'));

    }
    public function storePost(Request $request){

        $validate = $request->validate([
            'title' => 'Required',
            'description' => 'Required|min:20',
        ]);

        // return $request->all();
        $job = new Job();
        $job->title = $request->title;
        $job->user_id = Auth::user()->id;
        $job->category_id = $request->cat_id;
        $job->vacancy = $request->vacancy;
        $job->company_name = $request->company;
        $job->salary_range = $request->salary_range;
        $job->location = $request->location;
        $job->type = $request->type;
        $job->web = $request->website;
        $job->email = $request->email;
        $job->description = $request->description;
        $job->status = $request->status;

        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/job";
            $file->move($path, $name);
            $job->image = $name;
        }
        $job->save();
         toastr()->success('Your job post successfully stor our DB');
         return redirect()->route('user.post.all');

    }
    public function editPost($id){
      $post = Job::find($id);
      $categories = Category::all();
      return view('pages.post.edit',compact('post','categories'));
    }
    public function updatePost(Request $request,$id){

         $validate = $request->validate([
             'title' => 'Required',
             'description' => 'Required',
         ]);
         $job = Job::find($id);
         
        $job->title = $request->title;
        $job->user_id = Auth::user()->id;
        $job->category_id = $request->cat_id;
        $job->vacancy = $request->vacancy;
        $job->company_name = $request->company;
        $job->salary_range = $request->salary_range;
        $job->location = $request->location;
        $job->type = $request->type;
        $job->web = $request->website;
        $job->email = $request->email;
        $job->description = $request->description;
        $job->status = $request->status;
         if($request->image){

              if(File::exists('images/job/'.$job->image)){
                File::delete('images/job/'.$job->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/job";
            $file->move($path, $name);
            $job->image = $name;
        }
         $job->save();
         toastr()->success('Your post  update successfully');

         return back();
     }
     public function deletePost($id){
        $job = Job::find($id)->delete();
        toastr()->success('Post delete successfully!');

        return back();
     }

     public function profileUpdate(Request $request){
        $validate = $request->validate([
            'phone' =>'required',

        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        toastr()->success('Your profile update successfully!');

        return  back();

     }

     public function searchPost(Request $request){
        $search = $request->input('search');

        $posts = Job::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
        return view('search', compact('posts'));
    }
    // public function searchPost(Request $request){
    //     // $search = $request->input('search');

    //      $posts = Job::where('title', 'LIKE', '%'.$request->search_string.'%')
    //          ->get();
    //          return $posts;
    //      return view('search', compact('posts'))->render();
    //  }
    public function singlePost($id){
      $post = Job::find($id);
      $previous = Job::where('id', '<', $post->id)->max('id');
      $next = Job::where('id', '>', $post->id)->min('id');
      
      return view('pages.post.single',compact('post','next','previous'));
    }
    public function apply(Request $request,$id){
        $post = Job::find($id);
        $apply = new Apply();
        $apply->job_id = $post->id;
        $apply->user_id = Auth::user()->id;
        $apply->save();
        return redirect()->route('home')->with('success','Successfully Applied!');
    }

    public function showApply(){
        $my_job_applys= Auth::user()->applies;

        return view('pages.apply.index',compact('my_job_applys'));
    }

    public function allJob(){
        $jobs = Job::all();
        $message = "No post available";
        $categories = Category::all();
        return view('pages.job.all',compact('jobs','message','categories'));
    }

    

}
