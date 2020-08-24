<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\SubCategory;
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
        $subcategories = SubCategory::where('publication_status',1)->get();
        return view('admin.Product.addProduct',[
            'categories'=>$categories,
            'brands'=>$brands,
            'subcategories'=>$subcategories
        ]);
    }
    protected function productValidation($request){
        $this->validate($request,[
            'category_id'=>'required',
            'sub_category_id'=>'required',
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
        $product->sub_category_id= $request->sub_category_id;
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
           ->join('sub_categories','products.sub_category_id','=','sub_categories.id')
           ->select('products.*','categories.category_name','brands.brand_name','sub_categories.sub_category_name')
           ->get();

       return view('admin.Product.manageProduct',[
           'products'=>$products
       ]);

    }
    public function editProduct($id){
       $product = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        $subcategories = SubCategory::where('publication_status',1)->get();

       return view('admin.Product.editProduct',[
           'product'=>$product,
           'categories'=>$categories,
           'brands'=>$brands,
           'subcategories'=>$subcategories
       ]);

    }
    public function updateProduct(Request $request){

      $productImage  = $request->file('product_image');
     if($productImage){
         $product   = Product::find($request->product_id);
         unlink($product->product_image);
         $fileType = $productImage->getClientOriginalExtension();
         $ImageName = $request->product_name.rand(1,20).'.'.$fileType;
         $directory = 'product-image/';
         $ImageUrl = $directory.$ImageName;
         //$productImage->move($directory,$ImageName);
         Image::make($productImage)->resize(200,200)->save($ImageUrl);

         $product->category_id= $request->category_id;
         $product->sub_category_id= $request->sub_category_id;
         $product->brand_id= $request->brand_id;
         $product->product_name= $request->product_name;
         $product->product_price= $request->product_price;
         $product->product_quantity= $request->product_quantity;
         $product->short_description= $request->short_description;
         $product->long_description= $request->long_description;
         $product->product_image= $ImageUrl;
         $product->publication_status= $request->publication_status;
         $product->save();
         return redirect('manage-product')->with('message','product update successfully');



     }
         else{
             $product   = Product::find($request->product_id);
             $product->category_id= $request->category_id;
             $product->sub_category_id= $request->sub_category_id;
             $product->brand_id= $request->brand_id;
             $product->product_name= $request->product_name;
             $product->product_price= $request->product_price;
             $product->product_quantity= $request->product_quantity;
             $product->short_description= $request->short_description;
             $product->long_description= $request->long_description;
             $product->publication_status= $request->publication_status;
             $product->save();
             return redirect('manage-product')->with('message','product update successfully');
         }

    }
    public function deleteProduct($id){
        $product   = Product::find($id);
        $product->delete();
        return redirect('manage-product')->with('message','product delete successfully');


    }
    public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('manage-product')->with('message','Product info unpublished Successful');
    }
    public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('manage-product')->with('message','Product info published Successful');
    }
    public function detailsProduct($id){
       $product = Product::find($id);
        return view('admin.Product.productDetails');
    }
}
