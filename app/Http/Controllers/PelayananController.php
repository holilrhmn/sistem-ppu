<?php

namespace App\Http\Controllers;

use App\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelayanan = Pelayanan::latest()->get();
        return view('Dashboard.pelayanan.index',compact('pelayanan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.pelayanan.create');
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
            'isi_pelayanan' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
           
            $pelayanan = Pelayanan::create([
                'isi_pelayanan'     => $request->input('isi_pelayanan')
            ]);
            if($pelayanan) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.pelayanan.index');
        }else{  
            return redirect('/dashboard/pelayanan')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Pelayanan $pelayanan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.pelayanan.edit', [
                'pelayanan' => $pelayanan,
            ]);
        }else{
            return redirect('/dashboard/pelayanan')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $this->validate($request, [
            'isi_pelayanan' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $pelayanan->update([
                'isi_pelayanan'=> $request->isi_pelayanan,
            ]);
            if($pelayanan) {
                session()->flash('success', 'Data Pelayanan Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Pelayanan Gagal Disimpan');
            }
            return redirect()->route('dashboard.pelayanan.index');
        }else{  
            return redirect('/dashboard/pelayanan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $pelayanan->delete();
            return redirect()->route('dashboard.pelayanan.index')
            ->with('danger', 'Data Pelayanan Berhasil dihapus');
        }else{
            return redirect('/dashboard/sejarah')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
