<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use Image;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        return view('admin.Product.addProduct',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    protected function productValidation($request){
        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_image'=>'required | image',

        ]);
    }
    protected function Imageupload($request){
        $productImage   =  $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $ImageName = $request->product_name.rand(1,20).'.'.$fileType;
        $directory = 'product-image/';
        $ImageUrl = $directory.$ImageName;
        //$productImage->move($directory,$ImageName);
        Image::make($productImage)->resize(200,200)->save($ImageUrl);
        return $ImageUrl;
    }
    protected function productbasicinfoSave($request ,$ImageUrl){
        $product   = new Product();
        $product->category_id= $request->category_id;
        $product->brand_id= $request->brand_id;
        $product->product_name= $request->product_name;
        $product->product_price= $request->product_price;
        $product->product_quantity= $request->product_quantity;
        $product->short_description= $request->short_description;
        $product->long_description= $request->long_description;
        $product->product_image= $ImageUrl;
        $product->publication_status= $request->publication_status;
        $product->save();

    }

    public function saveProduct(Request $request){
           $this->productValidation($request);
        $ImageUrl = $this->Imageupload($request);
        $this->productbasicinfoSave($request,$ImageUrl);


        return redirect('add-product')->with('massage','product save successfully');

    }
    public function manageProduct(){
       $products = DB::table('products')
           ->join('categories','products.category_id','=','categories.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->select('products.*','categories.category_name','brands.brand_name')
           ->get();

       return view('admin.Product.manageProduct',[
           'products'=>$products
       ]);

    }
}
