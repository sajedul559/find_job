<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }
    public function store(Request $request)
    {
        
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category added sussessfully');
    }
    public function edit($id)
    {
     // $data=DB::table('categories')->where('id',$id)->first();
      $data=Category::findorfail($id);
      // return view('admin.category.category.edit',compact('data'));
       return response()->json($data);
    }
    public function update(Request $request){
        $data = Category::where('id',$request->id)->first();
    }
}
