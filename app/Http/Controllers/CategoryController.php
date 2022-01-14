<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Auth;
use Session;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        $r=request(); 
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        return redirect()->route('admin.category');
    }


    public function view(){
        $viewCategory=Category::all();
        return view('admin.category')->with('categories',$viewCategory);
    }

    public function delete($id){
        $deleteCategory=Category::find($id);
        $deleteCategory->delete();
        
        Session::flash('success',"Category delete successfully!");
        return redirect()->route('admin.category');
    }
}
