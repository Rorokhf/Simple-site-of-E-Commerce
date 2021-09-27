<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\user\phone;
use App\Models\order\order;
use App\Models\order\Coupon;
use App\Models\user\address;
use Illuminate\Http\Request;
use App\Models\product\brand;
use App\Models\product\product;
use App\Models\product\category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\Relation;

class UserController extends Controller
{
    public function phone()
    {
        //return $phone = phone::get();
        $user = User::with([
            'phone' => function ($data) {
                $data->select('code', 'number', 'user_id');
            },
            'address' => function ($data) {
                $data->select('street', 'floor', 'flat', 'building', 'user_id');
            }, 'coupon', 'order'=>function ($data) {
                $data->with(['product'=>function($data){
                    $data->with(['brand','offer']);
                }]);
            }])->get();
        // $user->makeHidden(['user_id']);
       // $product = product::get();

        // $order = order::with(['product' ])->get();
        // return response()->json($order);
        //return Coupon::get();
        //return order::get();
        return response()->json($user);
    }

    public function profile()
    {

       // $user = Auth::user()->id;
       $user = auth()->user();
//dd($user);
 //$id = auth()->user()->name;
 //dd($id);
        $Alluser = User::with([
            'phone' => function ($data) {
                $data->select('code', 'number', 'user_id');
            },
            'address' => function ($data) {
                $data->select('street', 'floor', 'flat', 'building', 'user_id');
            }
        ])->get();
//return $user;
        return view('user.body.profile', compact('user'));
    }

    public function order()
    {
        $user = auth()->user();

        $Alluser = User::with(['order'])->get();
        return view('user.body.order', compact('user'));
    }
    public function login(){

        $category=category::with(['subcategory'])->get();
        $brands=brand::get();
        $products=product::all();
        return view('auth.login',compact('category','brands','products'));
    }
    public function Register(){

        $category=category::with(['subcategory'])->get();
        $brands=brand::get();
        $products=product::all();
        return view('auth.register',compact('category','brands','products'));
    }
}
