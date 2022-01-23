<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warranty;
use App\Models\Cart;
use Session;
use DB;

class ProductController extends Controller
{

    public function adminAdd(){
        return view('admin.product-add')->with('categories',Category::all())->with('warranties',Warranty::all());
    }

    public function adminCreate(){
        $r=request();

        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'CategoryID'=>$r->categoryID,
            'WarrantyID'=>$r->warrantyID,
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'price'=>$r->productPrice,
            'quantity'=>$r->productQuantity,
            'image'=>$imageName,
        ]);

        Session::flash('success',"Product create successfully!");
        return redirect()->route('admin.product.add');
    }

    public function adminView(){
   
        $viewProduct=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->leftjoin('warranties','warranties.id','=','products.WarrantyID')
        ->select('products.*','categories.name as categoryID','warranties.name as warrantyID')
        ->orderBy('created_at','desc')
        ->paginate(5);

        return view('admin.product-view')->with('products',$viewProduct);
    }

     public function adminEdit($id){
        $products=Product::all()->where('id',$id);
        return view('admin.product-edit')->with('products',$products)
                                  ->with('categoryID', Category::all())
                                  ->with('warrantyID', Warranty::all());
    }

     public function adminUpdate(){
        $r=request();
        $products=Product::find($r->id);

        if($r->file('productImage')!= ''){
            $image=$r->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }

        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->CategoryID=$r->categoryID;
        $products->WarrantyID=$r->warrantyID;
        $products->save();
        
        Session::flash('success',"Product update successfully!");
        return redirect()->route('admin.product.view');
    }

    public function adminDelete($id){
        $deleteProducts=Product::find($id);
        $deleteProducts->delete();
        
        Session::flash('success',"Product delete successfully!");
        return redirect()->route('admin.product.view');
    }

    public function adminSearch(){
        $r=request();
        $keyword=$r->name;
        $products=DB::table('products')
        ->where('products.name','like','%'.$keyword.'%')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->leftjoin('warranties','warranties.id','=','products.WarrantyID')
        ->select('products.*','categories.name as categoryID','warranties.name as warrantyID')
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('admin.product-view')->with('products',$products);
    }
    /*
    | ----------------------------------------------------------------
    | User
    | ----------------------------------------------------------------
    */

    public function userView(){
        $products = DB::table('products')
        ->select('products.*')
        ->paginate(9);

        return view('product-show')->with('categories',Category::all())->with('products',$products);
    }

    public function userViewDetail($id){
        
        $products=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->leftjoin('warranties','warranties.id','=','products.WarrantyID')
        ->select('products.*','categories.name as categoryID','warranties.name as warrantyID')
        ->where('products.id',$id)
        ->get();

        return view('product-show-detail')->with('products',$products);
    }

    public function userSearch(){
        $r=request();
        $keyword=$r->keyword;
        $products=DB::table('products')->where('name','like','%'.$keyword.'%')->paginate(9);
        Session::flash('success',"No Results Found.");
        return view('product-show')->with('products',$products)->with('categories',Category::all());
    }

    public function userSearchDetail($id){
        $carts=Cart::find($id);
        $products=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->leftjoin('warranties','warranties.id','=','products.WarrantyID')
        ->select('products.*','categories.name as categoryID','warranties.name as warrantyID')
        ->where('products.id',$carts->productID)
        ->get();
        Session::flash('success',"No Results Found.");
        return view('product-show-detail')->with('products',$products);
       
    }

    public function userSearchCategory($id){
        $categoryID=Category::find($id);

        $products = DB::table('products')
        ->where('products.categoryID','=',$categoryID->id)
        ->paginate(9);
        Session::flash('success',"No Results Found.");
        return view('product-show')->with('categories',Category::all())->with('categoryID',compact('categoryID'))->with('products',$products);
    }
}
