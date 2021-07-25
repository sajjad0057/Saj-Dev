<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        //Using Eloquent ORM read Data 
        // $category = Category::all();
        //sorting by latest data 
        $category = Category::latest()->paginate(4);
        $trashCategory = Category::onlyTrashed()->latest()->paginate(2);

        return view('admin.category.index', compact('category','trashCategory'));
    }



    public function AddCategory(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:64',
                //'field_name' => 'required|unique:table_name|max:maximum_length'

            ],

        );

        //another style Eloquent ORM 
        $category = new Category;
        $category -> category_name = $request->category_name;
        $category -> user_id = Auth::user()->id;
        $category->save();
        return Redirect()->back()->with("success", "Category Inserted Successfully");

    }

    public function EditCategory($id)
    {
        // Eloquent ORM
        $category = Category::find($id);

        //echo $category;

        //Query Builder 
        // $category = DB::table('categories')->where('id',$id)->first();

        return view('admin.category.edit',compact('category'));
    }



    public function UpdateCategory(Request $request , $id)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:64',
            ],

        );
        //Using Eloquent ORM
       $update = Category::find($id)->update([
           'category_name' => $request->category_name, // $request->form_field_name
           'user_id' => Auth::user()->id,
       ]);


    // Using Query Builder : 
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id',$id)->update($data);


       return Redirect()->route('all.category')->with('success','Category Updated Successfully');
    }



    public function DeleteCategory($id)
    {
        Category::find($id)->delete();

        return Redirect()->back()->with('success','Category Temporary Delete and Store in Trashed');

    }


    public function DeleteCategoryParmantly($id)
    {
      Category::onlyTrashed()->find($id)->forceDelete();

      return Redirect()->back()->with('success','Category Pramanently Deleted  Successfully');
    }


    public function RestoreCategory($id)
    {
        Category::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success','Category Restored Successfully');
    }




}
