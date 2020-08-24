<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){

    return view('admin.Category.addCategory');


}
    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required'
        ]);

          $category = new Category();

           $category->category_name = $request->category_name;
           $category->category_description = $request->category_description;
           $category->publication_status = $request->publication_status;
           $category->save();
           return redirect('add-category')->with('message','Category Saved Successfully');



    }
    public function manageCategory(){
        $categories =  Category::all();
        return view('admin.Category.manageCategory',
        ['categories'=>$categories]
        );


    }
    public function unpublishedCategory($id){

        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect('manage-category')->with('message','Category info unpublished Successful');


    }
    public function publishedCategory($id){

        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('manage-category')->with('message','Category info published Successful');


    }

    public function editCategory($id){
        $category = Category::find($id);

        return view('admin.Category.editCategory',

        ['category'=>$category]


        );

    }
    public function updateCategory(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('manage-category')->with('message','Category Updated successful');



    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('manage-category')->with('message','Category deleted successful');
    }

}
