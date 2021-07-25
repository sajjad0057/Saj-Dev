<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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

        return view('admin.category.index', compact('category'));
    }



    public function AddCategory(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:6',
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }



    public function UpdateCategory(Request $request , $id)
    {
       $update = Category::find($id)->update([
           'category_name' => $request->update_category, // $request->form_field_name
           'user_id' => Auth::user()->id,
       ]);

       return Redirect()->route('all.category')->with('success','Category Updated Successfully');
    }



    public function DeleteCategory($id)
    {
        $category = Category::find($id);
    }




}
