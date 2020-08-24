<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.Sub-category.AddSubCategory',[
            'categories' => $categories
        ]);
    }
    public function saveSubCategory(Request $request){
        $subcategory = New SubCategory();

        $subcategory->category_id = $request->category_id;
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->sub_category_description = $request->sub_category_description;
        $subcategory->publication_status = $request->publication_status;
        $subcategory->save();
        return redirect('add-sub-category')->with('message','subcategory save successful');

    }
    public function subCategorymanage(){
        $subcategories =  SubCategory::all();
        return view('admin.Sub-category.manageSubCategory',
            ['subcategories'=>$subcategories]
        );


    }
    public function unpublishedsubCategory($id){

        $subcategory = SubCategory::find($id);
        $subcategory->publication_status = 0;
        $subcategory->save();
        return redirect('manage-sub-category')->with('message','subCategory info unpublished Successful');


    }
    public function publishedsubCategory($id){

        $subcategory = SubCategory::find($id);
        $subcategory->publication_status = 1;
        $subcategory->save();
        return redirect('manage-sub-category')->with('message','subCategory info published Successful');


    }

    public function editsubCategory($id){
        $subcategory = SubCategory::find($id);

        return view('admin.Sub-category.editsubCategory',

            ['subcategory'=>$subcategory]


        );

    }
    public function updatesubCategory(Request $request){
        $subcategory = SubCategory::find($request->sub_category_id);
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->sub_category_description = $request->sub_category_description;
        $subcategory->publication_status = $request->publication_status;
        $subcategory->save();
        return redirect('manage-sub-category')->with('message','subCategory Updated successful');



    }
    public function deletesubCategory($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect('manage-sub-category')->with('message','subCategory deleted successful');
    }
}
