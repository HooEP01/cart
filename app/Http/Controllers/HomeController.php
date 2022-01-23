<?php
    
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warranty;
use App\Models\User;
use DB;
    
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users=DB::table('users')
        ->orderBy('created_at','desc')
        ->first();

        $orders=DB::table('orders')
        ->orderBy('created_at','desc')
        ->first();

        return view('admin.home')->with('users',compact('users'))->with('orders',compact('orders'));
    }

    /*
    | ----------------------------------------------------------------
    | Admin
    | ----------------------------------------------------------------
    */
     
}