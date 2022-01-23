<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Session;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |----------------------------------------------------------------------------------------
    | Admin
    |----------------------------------------------------------------------------------------
    */
    public function adminAdd(){
        return view('admin.order-add');
    }

    public function adminCreate(){
        $r=request();

        $addOrder=Order::create([
            'userID'=>$r->userID,
            'purchaseDate'=>$r->purchaseDate,
            'installDate'=>$r->installDate,
            'serviceDate'=>$r->serviceDate,
            'status'=>$r->status,
            'amount'=>$r->amount,
        ]);

        Session::flash('success',"Order create successfully!");
        return redirect()->route('admin.order.add');
    }

    public function adminEdit($id){
        $orders=Order::all()->where('id',$id);
        return view('admin.order-edit')->with('orders',$orders);
    }

    public function adminUpdate(){
        $r=request();
        $orders=Order::find($r->id);

        $orders->purchaseDate=$r->purchaseDate;
        $orders->installDate=$r->installDate;
        $orders->serviceDate=$r->serviceDate;
        $orders->status=$r->status;
        $orders->amount=$r->amount;
        $orders->save();
        
        Session::flash('success',"Order update successfully!");
        return redirect()->route('admin.order.view');
    }

    public function adminDelete($id){
        $deleteOrders=Order::find($id);
        $deleteOrders->delete();
        
        Session::flash('success',"Order delete successfully!");
        return redirect()->route('admin.order.view');
    }

    public function adminView()
    {
        $orders = DB::table('orders')
            ->select('orders.*')
            ->where('orders.status', '!=', 'delete')
            ->orderBy('created_at','desc')
            ->paginate(5);

       
        return view('admin.order-view')->with('orders', $orders);
    }

    public function adminViewStatus($status){
        
        $orders = DB::table('orders')
        ->where('status','=',$status)
        ->where('orders.status', '!=', 'delete')
        ->orderBy('created_at','desc')
        ->paginate(5);

        $date = '0';
        return view('admin.order-view')->with('orders',$orders)->with('status',$status);
    }

    

    public function adminViewOrder(){
        $r=request();
        $keyword=$r->orderID;
        $orders=DB::table('orders')
        ->where('id','like','%'.$keyword.'%')
        ->where('orders.status', '!=', 'delete')
        ->orderBy('created_at','desc')
        ->paginate(5);;
        return view('admin.order-view')->with('orders',$orders);
    }
    /*
    |----------------------------------------------------------------------------------------
    | User
    |----------------------------------------------------------------------------------------
    */

    public function userView()
    {
        $orders = DB::table('orders')
            ->select('orders.*')
            ->where('orders.userID', '=', Auth::id())
            ->where('orders.status', '!=', 'delete')
            ->orderBy('created_at','desc')
            ->paginate(5);
   
        return view('order-show')->with('orders', $orders);
    }

    public function userDelete($id)
    {
        $orders=Order::find($id);
        $orders->status='delete';
        $orders->save();
        
        Session::flash('success',"Order delete successfully!");
        return redirect()->route('user.order.view');
    }

    public function userViewDetail($id){

        $carts=db::table('carts')
        ->leftjoin('products','products.id','=','carts.productID')
        ->select('carts.*','products.name as productID',)
        ->where('orderID',$id)
        ->paginate(5);

        $products=Cart::all()->where('orderID',$id);

        return view('order-show-detail')->with('carts',$carts)->with('products',$products);

    }

    public function userViewStatus($status){
        $orders = DB::table('orders')
        ->where('status','=',$status)
        ->where('orders.userID', '=', Auth::id())
        ->where('orders.status', '!=', 'delete')
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('order-show')->with('orders',$orders)->with('status',$status);
    }
}

