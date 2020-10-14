<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InfoTerkiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $info = InfoTerkini::latest()->get();
        return view('Dashboard.info.index',compact('info', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = User::select('id','name')->get();
        return view('Dashboard.info.create', compact('penulis'));
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
            'judul' => 'required|min:5',
            'deskripsi' => 'required',

    
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
           
            $info = InfoTerkini::create([
                'judul'     => $request->input('judul'),
                'deskripsi'     => $request->input('deskripsi'),
                'penulis_id' => Auth::user()->id,
                'slug' => Str::slug($request->input('judul'), '-'),
            ]);
            if($info) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.info-terkini.index');
        }else{  
            return redirect('/dashboard/info-terkini')->with('error', 'Anda tidak memiliki akses ini');
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
    public function edit(InfoTerkini $info)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $user = User::select('id','name')->get();
            return view('Dashboard.info.edit', [
                'info' => $info,
                'user' => $user
            ]);
        }else{
            return redirect('/dashboard/info-terkini')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoTerkini $info)
    {
        $this->validate($request, [
            
            'judul' => 'required|min:5',
            'deskripsi' => 'required',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $info->update([
                'judul'     => $request->input('judul'),
                'deskripsi'     => $request->input('deskripsi'),
                'penulis_id' => Auth::user()->id,
                'slug'        => Str::slug($request->input('judul'), '-')
            ]);
            if($info) {
                session()->flash('success', 'Data Info Terkini Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Info Terkini Gagal Disimpan');
            }
            return redirect()->route('dashboard.info-terkini.index');
        }else{  
            return redirect('/dashboard/info-terkini')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoTerkini $info)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $info->delete();
            return redirect()->route('dashboard.info-terkini.index')
            ->with('danger', 'Data Pelayanan Berhasil dihapus');
        }else{
            return redirect('/dashboard/info-terkini')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
