<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function AllCategory()
    {
        return view('admin.category.index');
    }

    public function AddCategory(Request $request)
    {
        $validated = $request->validate([
            'category-name' => 'required|unique:categories|max:6',
            //'field_name' => 'required|unique:table_name|max:maximum_length'

        ],
        [   
            // customized validation error message 
            'category-name.required' => 'Please Set Category Name '
            
        ]
    
    );
    }
}
