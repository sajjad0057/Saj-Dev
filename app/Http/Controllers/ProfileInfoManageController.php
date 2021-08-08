<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


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


    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('success','password is change successfully !');

        }else{
            return Redirect()->back()->with('error','current password is invalid');
        }

    }


    public function UserProfile()
    {  
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.profile.profileinfo',compact('user'));
            }
        }
    }



    public function UpdateProfile(Request $request)
    {   

        $validated = $request->validate(
            [
                'name' => 'required|max:64',
                'email' => 'required',
            ]
        );


        $user = User::find(Auth::user()->id);
        

        if($user){

            $old_img = $request->old_image;

            $profile_pic = $request->file('pro_pic');
            
            if ($profile_pic) {
                // storage/profile-photos
                //using image.intervention packages manage image size - 
                $name_gen = hexdec(uniqid()).'.'.$profile_pic->getClientOriginalExtension();//generate unique Id . and concate with  image extension .
                Image::make($profile_pic)->resize(500,350)->save('storage/profile-photos/'.$name_gen);
                $last_img = 'storage/profile-photos/'. $name_gen ;
    
                unlink($old_img);  // remove old image 
    
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'profile_photo_path' => $last_img,
                    'created_at' => Carbon::now()
                ]);
                return Redirect()->back()->with('success','User Profile is updated Succussfully !');
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'created_at' => Carbon::now()
                ]);
                return Redirect()->back()->with('success','User Profile is updated Succussfully !');
            }
    
        }

    }
}
