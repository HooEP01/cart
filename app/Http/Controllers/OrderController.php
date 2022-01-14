<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Session;
use PDF;

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
            ->get();
        return view('admin.order-view')->with('orders', $orders);
    }

    /*
    |----------------------------------------------------------------------------------------
    | User
    |----------------------------------------------------------------------------------------
    */
    public function pdfReport()
    {

        $data = DB::table('orders')
            ->select('orders.*')
            ->where('orders.userID', '=', Auth::id())
            ->get();

        $pdf = PDF::loadView('myPDF', compact('data'));

        return $pdf->download('Order_report.pdf');
    }

    public function view()
    {
        $orders = DB::table('orders')
            ->select('orders.*')
            ->where('orders.userID', '=', Auth::id())
            ->get();
        return view('order')->with('orders', $orders);
    }
}

