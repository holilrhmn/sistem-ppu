<?php

namespace App\Http\Controllers;

use App\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::latest()->get();
        return view('Dashboard.merk.index', compact('merk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.merk.create');
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

        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $merk = Merk::create([
                'name'     => $request->input('name'),

            ]);
            if ($merk) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.merk.index');
        } else {
            return redirect('/dashboard/merk')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Merk $merk)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.merk.edit', [
                'merk' => $merk,
            ]);
        } else {
            return redirect('/dashboard/merk')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merk $merk)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $merk->update([
                'name' => $request->name,

            ]);
            if ($merk) {
                session()->flash('success', 'Data Kajian Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kajian Gagal Disimpan');
            }
            return redirect()->route('dashboard.merk.index');
        } else {
            return redirect('/dashboard/merk')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $merk->delete();
            return redirect()->route('dashboard.merk.index')
                ->with('danger', 'Data Pelayanan Berhasil dihapus');
        } else {
            return redirect('/dashboard/merk')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
