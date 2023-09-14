<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class admin_logout extends Controller
{
    public function logout(){//logout
     Auth::logout();
     return redirect('login')->with('msg','You are log out...');
    }
    public function changepass(){//change password
      
        return view('admin.changepass');
       }
       public function updatepass(Request $r){//updating password
      $r->validate([
          'current_password'=>'required',
          'password'=>'required|confirmed|min:8',
      ]);

      if(Hash::check($r->current_password, Auth::user()->password)){
      $user=user::find(Auth::user()->id);
      $user->password=Hash::make($r->password);
      $user->save();
     Auth::logout();

return redirect('login')->with('msg','password updated sucessfully');
       }
return redirect()->back()->with('msg','Incorrect Passsword');
    }
    public function updateprofile(){//update profile
        if(Auth::user()->id){
            return view('admin.profile');
        }
    }
    public function saveprofile(Request $request){//update profile
    $user=user::find(Auth::user()->id);
     
if($user){

    if($request->file){
//  unlink($user->profile_photo_path);

        $request->validate([
            'file'=>'mimes:jpg,png,jpeg|max:2048',
 
        ]);
        $imgs=$request->file('file');
    $img_ext=$request->file('file')->getClientOriginalExtension();
    $img_name=rand().".$img_ext";
    Image::make($imgs)->save('images/setting/'.$img_name);
    $user->profile_photo_path='images/setting/'.$img_name;
    }
    
        $user->email=$request->email;
    $user->name=$request->username;
$user->save(); 
return redirect()->back()->with('msg',"Profile updated");

    
}
return redirect()->back();

    }
}
