<?php

namespace App\Http\Controllers;

use App\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kajian = Kajian::latest()->get();
        return view('Dashboard.kajian.index',compact('kajian'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.kajian.create');
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
            'isi_kajian' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
           
            $kajian = Kajian::create([
                'isi_kajian'     => $request->input('isi_kajian')
            ]);
            if($kajian) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.kajian.index');
        }else{  
            return redirect('/dashboard/kajian')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Kajian $kajian)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.kajian.edit', [
                'kajian' => $kajian,
            ]);
        }else{
            return redirect('/dashboard/kajian')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kajian $kajian)
    {
        $this->validate($request, [
            'isi_kajian' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $kajian->update([
                'isi_kajian'=> $request->isi_kajian,
            ]);
            if($kajian) {
                session()->flash('success', 'Data Kajian Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kajian Gagal Disimpan');
            }
            return redirect()->route('dashboard.kajian.index');
        }else{  
            return redirect('/dashboard/kajian')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kajian $kajian)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $kajian->delete();
            return redirect()->route('dashboard.kajian.index')
            ->with('danger', 'Data Pelayanan Berhasil dihapus');
        }else{
            return redirect('/dashboard/kajian')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
