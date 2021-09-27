<?php

namespace App\Http\Controllers\admin\category;

use App\traits\generalTrait;
use Illuminate\Http\Request;
use App\Models\product\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\product\subcategory;

class SubCategoriesController extends Controller
{
    use generalTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   return  $request->fullUrlWithQuery(['id' => 'category_id']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::get();
        $subcategory = $category->subcategory;
        return view('admin.category.allSubCat', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->fullUrlWithQuery(['id' => 'category_id']));
     // dd($request->flash());
       //dd($request->path());
        $rules = [
            'name'=>['required','string','max:100'],
            'status'=>['required','boolean'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1000']
        ];

        $request->validate($rules);
        // upload image ->general traite
 $photoName = $this->uploadPhoto($request->image,'subcategories');
        $data = $request->except('_token','image','add');
       // $subcategories = DB::table('subcategories')->insertGetId($data,['image'=>$photoName]);
       // DB::table('subcategories')->select(['image'=>$photoName])->insertGetId($data);
       $subcategories= DB::table('subcategories')->insertGetId(['image'=>$photoName,
       'name'=>$request->name,'status'=>$request->status,'category_id'=>$request->category_id]);
        return  redirect()->back()->with('subcategories',$subcategories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




        $category = category::find($id);

        $subcategory = $category->subcategory;

        //dd( $request->fullUrlWithQuery([$id => 'category_id']));
        return view('admin.category.allSubCat', compact('subcategory','id','category'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subcategory::where('id', $id)->delete();

        return redirect()->back();
    }
}
