<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Auth;
use File;

class UserController extends Controller
{
    public function profile(){
        return view('users.page.profile.index');
    }
    public function postAll(){
        $post = Job::where('user_id',Auth::user()->id)->get();
        $message = "No post yet";
        return view('users.page.post.index',compact('post','message'));
    }

    public function postForm(){
        return view('users.page.post.create');

    }
    public function storePost(Request $request){

        $validate = $request->validate([
            'title' => 'Required|max:10',
            'description' => 'Required|max:5',
        ]);

        // return $request->all();
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->status = $request->status;
        $job->user_id = Auth::user()->id;

        if($request->image){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/job";
            $file->move($path, $name);
            $job->image = $name;
        }

        $job->save();
        return redirect()->route('user.post.all');
    }
    public function editPost($id){
      $post = Job::find($id);
      return view('users.page.post.edit',compact('post'));
    }
    public function updatePost(Request $request,$id){

        // return $request->all();
         $validate = $request->validate([
             'title' => 'Required',
             'description' => 'Required',
         ]);
         $job = Job::find($id);
         $job->title = $request->title;
         $job->description = $request->description;
         if($request->image){

            if(File::exists($job->image)){
                File::unlink($job->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/job";
            $file->move($path, $name);
            $job->image = $name;
        }
         $job->save();
         return redirect()->route('user.post.all');
     }
     public function deletePost($id){
        $job = Job::find($id)->delete();
        return back();
     }

     public function profileUpdate(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return  back();

     }

     public function searchPost(Request $request){
        $search = $request->input('search');

        $posts = Job::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
        return view('search', compact('posts'));
    }
}
