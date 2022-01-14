<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Auth;
use Session;
use DB;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function userAdd(){
        $r=request();
        $addCart=Cart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'productID'=>$r->id,
            'userID'=>Auth::id(),
        ]);
        Return redirect()->route('user.product.view');
    }
    
    public function userView(){
        $carts=DB::table('carts')
        ->leftjoin('products','products.id','=','carts.productID')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('carts.quantity as cartQty','carts.id as cid','products.*','categories.name as categoryID')
        ->where('carts.orderID','=','')
        ->where('carts.userID','=',Auth::id())
        ->paginate(5);
        Return view('cart')->with('products',$carts);
    }
}
