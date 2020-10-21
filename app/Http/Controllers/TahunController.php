<?php

namespace App\Http\Controllers;

use App\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = Tahun::latest()->get();
        return view('Dashboard.tahun.index', compact('tahun'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.tahun.create');
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
            'tahun' => 'required|min:4',
            'jumlah' => 'required|min:1',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $tahun = Tahun::create([
                'tahun'     => $request->input('tahun'),
                'jumlah'     => $request->input('jumlah'),
            ]);
            if ($tahun) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.tahun.index');
        } else {
            return redirect('/dashboard/tahun')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Tahun $tahun)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.tahun.edit', [
                'tahun' => $tahun,
            ]);
        } else {
            return redirect('/dashboard/tahun')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahun $tahun)
    {
        
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $tahun->update([
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
            ]);
            if ($tahun) {
                session()->flash('success', 'Data tahun Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data tahun Gagal Disimpan');
            }
            return redirect()->route('dashboard.tahun.index');
        } else {
            return redirect('/dashboard/tahun')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahun $tahun)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $tahun->delete();
            return redirect()->route('dashboard.tahun.index')
                ->with('danger', 'Data Pelayanan Berhasil dihapus');
        } else {
            return redirect('/dashboard/tahun')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
