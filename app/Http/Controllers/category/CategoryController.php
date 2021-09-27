<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Models\product\category;
use Illuminate\Support\Facades\DB;
use App\Models\product\subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;

class CategoryController extends Controller
{
    public function category(){

        $category = category::select('id', 'name', 'status','image')->get();

        return view('admin.category.all', compact('category'));
    }
    public function updateCat(Request $request){

        //dd($request);

        $rules = [
            'name'=>['nullable','string','max:255'],
            'status'=>['nullable','boolean'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1000']
        ];
        $request->validate($rules);
        $data = $request->except('_token','image','add');
        DB::table('category')->insertGetId($data);

    }

    public function subcategory($category_id)
    {
        $category = category::find($category_id);
        $subcategory = $category->subcategory;
        return view('admin.category.allSubCat', compact('subcategory'));
    }

    public function delet($category_id){
        $category = category::find($category_id);
        if (!$category)
            return abort('404');

        $category->subcategory()->truncate();
        $category->subcategory();

        return redirect() -> route('cat');
    }
}
