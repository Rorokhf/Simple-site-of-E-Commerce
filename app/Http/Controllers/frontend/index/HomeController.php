<?php

namespace App\Http\Controllers\frontend\index;

use Illuminate\Http\Request;
use App\Models\product\brand;
use App\Models\product\product;
use App\Models\product\category;
use App\Models\product\subcategory;
use App\Http\Controllers\Controller;
use App\Models\product\ProductAtrr_model;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products=product::with(['brand','offer'=>function ($data) {
        $data->select('descount');
    }])->get();
        $category=category::get();
        $subcategory=subcategory::get();
        $brands=brand::get();
        $Allproducts = category::with([
            'subcategory' => function ($data) {
                $data->with(['product'=>function($data){
                    $data->with(['brand','offer']);
                }]);
            }])->get();
       // return $Allproducts;
       $totalStock=ProductAtrr_model::where('products_id')->sum('stock');
        return view('frontend.home.index',compact('products','category','subcategory','brands','Allproducts','totalStock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::with(['subcategory'])->get();
        $brands=brand::get();
        return view('frontend.app.app',compact('category','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = Cart::total(0);
        $product=product::findorfail($request->input('product_id'));
        Cart::add(
        $product->id,
         $product->name,
         $product->quantity,
         $product->price ,

        );
        Cart::instance('wishlist')->add(
            $product->id,
             $product->name,
             $product->quantity,
             $product->price ,

            );
        return redirect()->route('index.index')->with('message','done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
