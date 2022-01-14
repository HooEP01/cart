<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Warranty;
use Auth;
use Session;

class WarrantyController extends Controller
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
        return view('admin.warranty-add');
    }

    public function adminCreate(){
        $r=request();

        $addWarranty=Warranty::create([
            'name'=>$r->name,
            'inclusion'=>$r->inclusion,
            'exclusion'=>$r->exclusion,
            'year'=>$r->year,
        ]);

        Session::flash('success',"Warranty create successfully!");
        return redirect()->route('admin.warranty.add');
    }

    public function adminEdit($id){
        $warranties=Warranty::all()->where('id',$id);
        return view('admin.warranty-edit')->with('warranties',$warranties);
    }

     public function adminUpdate(){
        $r=request();
        $warranties=Warranty::find($r->id);

        $warranties->name=$r->name;
        $warranties->inclusion=$r->inclusion;
        $warranties->exclusion=$r->exclusion;
        $warranties->year=$r->year;
        $warranties->save();
        
        Session::flash('success',"Warranty update successfully!");
        return redirect()->route('admin.warranty.view');
    }

    public function adminDelete($id){
        $deleteWarranties=Warranty::find($id);
        $deleteWarranties->delete();
        
        Session::flash('success',"Warranty delete successfully!");
        return redirect()->route('admin.warranty.view');
    }

    public function adminView()
    {
        $warranties = DB::table('warranties')
            ->select('warranties.*')
            ->get();
        return view('admin.warranty-view')->with('warranties', $warranties);
    }

    /*
    |----------------------------------------------------------------------------------------
    | User
    |----------------------------------------------------------------------------------------
    */

    public function userView(){
        $warranties=Warranty::all();
        return view('warranty-show')->with('warranties',$warranties);
    }
}
