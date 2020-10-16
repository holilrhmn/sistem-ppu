<?php

namespace App\Http\Controllers;

use App\dokumenPembangunan;
use App\Faq;
use App\InfoTerkini;
use App\Link;
use App\Regulasi;
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

    public function updateProfil(Request $request, $id){

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'password' => 'same:confirm-password',


        ]);



        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = array_except($input,array('password'));

        }



        $user = User::find($id);

        $user->update($input);

        return redirect()->route('edit.profil')

                        ->with('success','User Profil Berhasil Diperbarui');
    }

    public function dashboard(){
        $info = InfoTerkini::all()->count();
        $link = Link::all()->count();
        $faq = Faq::all()->count();
        $regulasi = Regulasi::all()->count();
        $dokumen = dokumenPembangunan::all()->count();
        $user = User::all()->count();
        return view('Dashboard.dashboard', compact('info','link','faq','regulasi','dokumen', 'user'));
    }
}
