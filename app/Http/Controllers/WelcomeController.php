<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\SubCategory;
use App\slideImage;


class WelcomeController extends Controller
{
    public function index(){

        $new_arraivals  = Product::where('publication_status',1)
                             ->orderBy('id','DESC')
                             ->take(8)
                               ->get();
        $new_products  = Product::where('publication_status',1)
            ->orderBy('id','DESC')
            ->skip(5)
            ->take(8)
            ->get();

        $slideImages = slideImage::all()->take(4);

        return view('FrontEnd.Home.home',[
            'new_arraivals' => $new_arraivals,
            'new_products' => $new_products,
            'slideImages' => $slideImages

        ]);

    }
    public function categoryProduct($id){
              $subcategories = SubCategory::all();
              $categoryProducts =  Product::where('category_id',$id)
                                         ->where('publication_status',1)
                                         ->get();
        return view('frontEnd.Category.category-product',[
            'categoryProducts' => $categoryProducts,
            'subcategories' => $subcategories
        ]);


    }
    public function subcategoryProduct($category_id ,$id){
        $subcategories = SubCategory::all();
        $subcategoryProducts =  Product::where('category_id',$category_id)
                                 ->where('sub_category_id',$id)
                                ->where('publication_status',1)
                                ->get();
        return view('frontEnd.Sub-Category.subcategoryProduct',[
            'subcategoryProducts' => $subcategoryProducts,
            'subcategories' => $subcategories

        ]);
    }
    public function productDetials($id){

        $product = Product::find($id);

        return view('FrontEnd.Product.productDetails',[

            'product' => $product
        ]);
    }

}
