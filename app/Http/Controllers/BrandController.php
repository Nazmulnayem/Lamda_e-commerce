<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('admin.Brand.addBrand');
    }

    public function saveBrand(Request $request){

        $this->validate($request,[
            'brand_name'=>'required',
            'brand_description'=>'required'
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('add-brand')->with('message','Brand Saved Successfully');

    }
    public function manageBrand(){

        $brands = Brand::all();
            return view('admin.Brand.manageBrand',
                ['brands'=>$brands]
            );
    }
    public function unpublishedBrand($id){

        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand info unpublished Successful');


    }
    public function publishedBrand($id){

        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand info published Successful');


    }

    public function editBrand($id){
        $brand = Brand::find($id);

        return view('admin.Brand.editBrand',

            ['brand'=>$brand]


        );

    }
    public function updateBrand(Request $request){
        $brand = Brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand Updated successful');



    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('manage-brand')->with('message','Brand deleted successful');
    }
}
