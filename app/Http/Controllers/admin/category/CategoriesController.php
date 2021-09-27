<?php

namespace App\Http\Controllers\admin\category;

use App\traits\generalTrait;
use Illuminate\Http\Request;
use App\Models\product\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\product\product;

class CategoriesController extends Controller
{
    use generalTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::get();
        return view('admin.category.all', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::get();
        return view('admin.category.all', compact('category'));
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
            'name' => ['required', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg', 'max:1000']
        ];

        $request->validate($rules);
        // upload image ->general traite
        $photoName = $this->uploadPhoto($request->image, 'categories');
        $request->image->image = $photoName;

        $data = $request->except('_token', 'add','image');
        DB::table('categories')->insert(['image'=>$photoName,'name'=>$request->name,'id'=>$request->id]);
      //  $categories = DB::table('categories')->save($data,['image'=>$photoName]);
        //DB::table('categories')->insert(['image'=>$photoName,'category_id'=>$categories,'primary_image'=>1]);
        return redirect()->back();
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
        $category = category::find($id);
        // category::where('id', $id)->delete();
        $category->subcategory()->delete();
        $category->subcategory();
        category::where('id', $id)->delete();
        return redirect()->back();
    }
}
