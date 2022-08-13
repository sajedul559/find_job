<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect,Response;


class UserManageController extends Controller
{
    public function allUsers(){
        $users = User::all();
        return view('admin.users.all',compact('users'));
    }
    public function activeUsers(){
        $activeusers = User::where('status',1)->get();
        return view('admin.users.active',compact('activeusers'));
    }
    public function deactiveUsers(){
        $deactiveusers = User::where('status',0)->get();
        return view('admin.users.deactive',compact('deactiveusers'));
    }
    public function createuser(Request $request){

        return view('admin.users.create');
    }
    public function storeuser (Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address =$request->address;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('admin.user.allUsers')->with('success','Successfully user created!');
        return response()->json(['status'=>true,"redirect_url"=>url('admin/all-users')]);

    }
    public function editeuser($id){
        $user = User::where('id',$id)->delete();
        return view('admin.users.edit',compact('user'));
    }
    public function deleteuser ($id){
        $user = User::where('id',$id)->delete();
      //  return back()->with('success','Successfully user deleted!');
      return response()->json([
        'success' => 'Record deleted successfully!'
    ]);

      return Response::json($user);
    }
    public function statusactive(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->status = 1;
        $user->save();
       return back()->with('success','Status Updated');
      


    }
    public function statusdeactive(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->status = 0;
        $user->save();
    //   // return redirect()->back();
    //    return response()->json([
    //     'message'=>'success fully update status',
    //     'user' => $user,
    //    ]);
    return back()->with('success','Status Updated');

    }
    public function showallusers(){
        $user = User::all();
        return response()->json($user);
    }

}

