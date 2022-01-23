<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Warranty;
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
        ->leftjoin('warranties','warranties.id','=','products.WarrantyID')
        ->select('carts.quantity as cartQty','carts.id as cid','products.*','categories.name as categoryID','warranties.name as warrantyID')
        ->where('carts.orderID','=','')
        ->where('carts.userID','=',Auth::id())
        ->paginate(10);
        Return view('cart')->with('products',$carts);
    }

    public function userDelete($id){
        $deleteCarts=Cart::find($id);
        $deleteCarts->delete();
        
        Session::flash('success',"Cart delete successfully!");
        return redirect()->route('user.cart.view');
    }

    public function userEdit(){
        $r=request();
        $carts=Cart::find($r->id);

        $carts->quantity=$r->quantity;
        $carts->save();
        
        Session::flash('success',"Cart update successfully!");
        return redirect()->route('user.cart.view');
    }
}
