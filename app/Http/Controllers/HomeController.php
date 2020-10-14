<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function editProfil(User $user)
    {
        $user = Auth::user();
        return view('Dashboard.layouts.profil',compact('user'));
    }

   public function updateProfil(Request $request ){

        $user = Auth::user();

            

        $this->validate($request,[
    
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,'.$user->id,
            'foto' => 'required|image|max:5048',
        ]);
       
		$pict = 'foto';

    if($file = $request->file('foto') == ""){
        $user->name = $request->name;
        $user->email = $request->email;

          
    }else{
        $file = $request->file('foto');
        $image_path = "/public/foto".$user->foto; 
        File::delete($image_path);
        $user->name = $request->name;
        $user->email = $request->email;
        $b = $request->email;
        $a = $pict.$b.'.jpg';
        $name = $file->getClientOriginalName();
        $file->move('foto', $a);
        $user->foto = $a;
    }
     
        $user->update();

        
        return redirect()->back()->with('message','User Profil Berhasil Diperbarui');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("message","Password Berhasil Diperbarui !");

    }
}
