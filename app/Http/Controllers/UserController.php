<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->get();
        return view('Dashboard.user.index', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'level' => 'required',
            'password' => 'required|min:4',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $password = Hash::make($request->input('password'));
            $user = User::create([
                'name'     => $request->input('name'),
                'email'     => $request->input('email'),
                'level'     => $request->input('level'),
                'password' => $password,

            ]);
            if ($user) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.user.index');
        } else {
            return redirect('/dashboard/user')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.user.edit', [
                'user' => $user,
            ]);
        } else {
            return redirect('/dashboard/user')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'level' => 'required|',
            'password' => 'required|min:4',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $password = Hash::make($request->input('password'));
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'password' => $password
            ]);
            if ($user) {
                session()->flash('success', 'Data user Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data user Gagal Disimpan');
            }
            return redirect()->route('dashboard.user.index');
        } else {
            return redirect('/dashboard/user')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $user->delete();
            return redirect()->route('dashboard.user.index')
                ->with('danger', 'Data User Berhasil dihapus');
        } else {
            return redirect('/dashboard/user')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
