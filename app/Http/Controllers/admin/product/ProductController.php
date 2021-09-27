<?php

namespace App\Http\Controllers\admin\product;

use App\traits\generalTrait;
use Illuminate\Http\Request;
use App\Models\product\brand;
use App\Models\product\product;
use Illuminate\Validation\Rule;
use App\Models\product\category;
use Illuminate\Support\Facades\DB;
use App\Models\product\subcategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    use generalTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::get();

        return view("admin.products.allProduct",compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::get();
        $subcategories=subcategory::get();
        $brands=brand::get();
       // dd($categories);
        return view('admin.products.addProduct',compact('categories','subcategories','brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name'=>['required','string','max:255'],
            'code'=>['required','integer','digits:5','min:10000','max:99999','unique:products'],
            'price'=>['required','numeric','max:100000'],
            'quantity'=>['required','integer','min:1'],
            'status'=>['required','boolean'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'category_id'=>['required','integer','exists:categories,id'],
            'description'=>['nullable','string'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1000']
        ];

        $request->validate($rules);
 // upload image ->general traite
 $photoName = $this->uploadPhoto($request->image,'products');
        $data = $request->except('_token','image','add');
        $product_id = DB::table('products')->insertGetId($data);
       // DB::table('products')->insert(['image'=>$photoName]);
        DB::table('products_images')->insert(['image'=>$photoName,'primary_image'=>$product_id,'primary_image'=>1]);
        if($request->add == 'add')
        //with => create sission
            return redirect()->route('product.index')->with('Success','Product Has Been Successfully Created');
        else
            return redirect()->back()->with('Success','Product Has Been Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=product::find($id);
        $categories=category::get();
        $subcategories=subcategory::get();
        $brands=brand::get();
      // dd($products);
        return view('admin.products.update',compact('categories','subcategories','brands','products'));
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
        $rules  = [
            'name'=>['required','string','max:255'],
            'code'=>['required','integer','digits:5','min:10000','max:99999',Rule::unique('products')->ignore($id,'id')],
            'price'=>['required','numeric','max:100000'],
            'quantity'=>['required','integer','min:1'],
            'status'=>['required','boolean'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'description'=>['nullable','string'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1000']
        ];

        $request->validate($rules);
        if($request->has('image')){
            $photoName = $this->uploadPhoto($request->image,'products');
            // query to get image name by product id
           DB::table('products')->select('image')->update(['image'=>$photoName]);
            // to delete old photo
            $oldPath = public_path('images\products\\'.$request->oldPhoto);
            if(file_exists($oldPath)){
                unlink($oldPath);
            }
        $data = $request->except('_token','image','update','_method','oldPhoto');
        DB::table('products')->where('id',$id)->update($data);
        // redirect on page
        if($request->update == 'update')
            return redirect()->route('product.index')->with('Success','Product Has Been Successfully Updated');
        else
            return redirect()->back()->with('Success','Product Has Been Successfully Updated');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        // delete product DB
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('Success','Product '.$id.' Has Been Successfully Deleted');
    }
}
