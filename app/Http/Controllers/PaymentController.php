<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Stripe;
use DB;
use Auth;
use Session;
use Notification;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function userView(){
        
        $orders=DB::table('orders')
        ->where('orders.userID','=',Auth::id())
        ->where('orders.status','=','unpaid')
        ->orderBy('created_at','desc')
        ->first();

        $date=Carbon::now();
        $orders->purchaseDate=$date->toDateString();
        $endDate = Carbon::today()->addDays(7);
        $orders->serviceDate=$endDate->toDateString();
        
        return view('checkout')->with('orders',compact('orders'));
    }

    public function userViewID($id){
       
        $orders=Order::find($id);
        
        $date=Carbon::now();
        $orders->purchaseDate=$date->toDateString();
        $endDate = Carbon::today()->addDays(7);
        $orders->serviceDate=$endDate->toDateString();
        $orders->save();
        
        return view('checkout')->with('orders',compact('orders'));
    }

    public function userAdd(Request $request){
        $newOrder=Order::Create([
            'status' => 'unpaid',
            'userID' =>Auth::id(),
            'amount' =>$request->sub,
        ]);

        $items=$request->input('cid');
        foreach($items as $item=>$value){
            $carts=Cart::find($value);
            $carts->orderID=$newOrder->id;
            $carts->save();
        }

        return redirect()->route('user.checkout.view');
    }

    public function userPayment(Request $request){
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $request->amount * 100,
            "currency" => "MYR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of southern online",
        ]);
        

        $orders=Order::find($request->id);

        $r=request();
        $orders->purchaseDate=$request->purchaseDate;
        $orders->serviceDate=$request->serviceDate;
        $orders->status='paid';
        $orders->amount=$request->amount;
        $orders->save();

        return redirect()->route('user.order.view');
    }

}
