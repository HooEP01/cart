<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use DB;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function userView(){
        $accounts=DB::table('users')
        ->where('users.id','=',Auth::id())
        ->get();

        return view('account')->with('accounts',$accounts);
    }
}
