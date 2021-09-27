<?php

namespace App\Http\Controllers\admin\brand;

use App\traits\generalTrait;
use Illuminate\Http\Request;
use App\Models\product\brand;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    use generalTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=brand::get();
        return view('admin.brand.brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>['required','string','max:100'],
            'status'=>['required','boolean'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1000']
        ];

        $request->validate($rules);
        // upload image ->general traite
 $photoName = $this->uploadPhoto($request->image,'brands');
        $data = $request->except('_token','image','add');
       // $brands = DB::table('brands')->insertGetId($data);
        //DB::table('brands')->insert(['image'=>$photoName]);
        $brands= DB::table('brands')->insertGetId(['image'=>$photoName,
       'name'=>$request->name,'status'=>$request->status]);
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
        brand::where('id', $id)->delete();
        return redirect()->back();
    }
}
