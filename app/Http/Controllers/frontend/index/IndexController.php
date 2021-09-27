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

class IndexController extends Controller
{
    public function detialpro($id){
        $detail_product=Product::find($id);
        $product=product::get();
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $relateProducts=Product::where([['id','!=',$id],['category_id',$detail_product->category_id]])->get();

        $category=category::get();
        $subcategory=subcategory::get();
        $brands=brand::get();
        $category=category::with(['subcategory'=> function ($data) {
            $data->with(['product'=>function($data){
                $data->with(['brand','offer']);
            }]);
        }])->get();
        return view('frontend.product_page.product_details',compact('detail_product',
        'totalStock','relateProducts','product','category','brands'));
    }
     public function quickView($id)
    {
        $product=Product::find($id);
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $relateProducts=Product::where([['id','!=',$id],['category_id',$product->category_id]])->get();
        return view('frontend.product_page.quick_view',compact('product','totalStock','relateProducts'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
     public function wishlist(){
        $product=product::all();
        $cart=Cart::content();
        $category=category::get();
         $subcategory=subcategory::get();
         $brands=brand::get();

         $totalPrice=Cart::total();
         $subtotal=Cart::subtotal();
         $text=Cart::tax();
         return view('frontend.product_page.wishlist',compact('product','cart',
         'category','brands','totalPrice' ,'subtotal','text'));
    }

}
