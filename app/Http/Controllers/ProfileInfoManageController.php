<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileInfoManageController extends Controller
{
    public function __construct()
    {      
        $this->middleware('auth');
    }


    public function ChangePassword()
    {
        return view('admin.profile.changepassword');
    }
}
