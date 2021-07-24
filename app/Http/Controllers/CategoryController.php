<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//use Carbon\Carbon;
use Auth;
// use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function AllCategory()
    {
        //Using Eloquent ORM read Data 
        // $category = Category::all();
        //sorting by latest data 
        $category = Category::latest()->get();
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

        //Using Eloquent ORM insert Data 

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        //another style Eloquent ORM 
        $category = new Category;
        $category -> category_name = $request->category_name;
        $category -> user_id = Auth::user()->id;
        $category->save();


        //Using Query Builder  Insert Data

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);




        return Redirect()->back()->with("success", "Category Inserted Successfully");
    }
}
