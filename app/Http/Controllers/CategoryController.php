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
         Session::flash('success',"Category add successfully!");
        return redirect()->route('admin.category');
    }


    public function view(){
        $viewCategory = DB::table('categories')
            ->orderBy('created_at','desc')
            ->paginate(5);
        return view('admin.category')->with('categories',$viewCategory);
    }

    public function delete($id){
        $deleteCategory=Category::find($id);
        $deleteCategory->delete();
        
        Session::flash('success',"Category delete successfully!");
        return redirect()->route('admin.category');
    }

    public function search(){
        $r=request();
        $keyword=$r->name;
        $categories=DB::table('categories')
        ->where('name','like','%'.$keyword.'%')
        ->orderBy('created_at','desc')
        ->paginate(5);;
        return view('admin.category')->with('categories',$categories);
    }
}
