<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index(){
       
        return view('Admin.index');
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
