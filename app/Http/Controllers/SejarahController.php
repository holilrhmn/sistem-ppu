<?php

namespace App\Http\Controllers;

use App\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejarah = Sejarah::latest()->get();
        return view('Dashboard.sejarah.index',compact('sejarah'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.sejarah.create');
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
            'isi_sejarah' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
           
            $sejarah = Sejarah::create([
                
                'isi_sejarah'     => $request->input('isi_sejarah')
            ]);
            if($sejarah) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.sejarah.index');
        }else{  
            return redirect('/dashboard/sejarah')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Sejarah $sejarah)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.sejarah.edit', [
                'sejarah' => $sejarah,
            ]);
        }else{
            return redirect('/dashboard/sejarah')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sejarah $sejarah)
    {
        $this->validate($request, [
            'isi_sejarah' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $sejarah->update([
                'isi_sejarah'=> $request->isi_sejarah,
            ]);
            if($sejarah) {
                session()->flash('success', 'Data Galeri Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Galeri Gagal Disimpan');
            }
                return redirect()->route('dashboard.sejarah.index');
        }else{  
            return redirect('/dashboard/sejarah')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $sejarah->delete();
            return redirect()->route('dashboard.sejarah.index')
            ->with('danger', 'Data Privacy Berhasil dihapus');
        }else{
            return redirect('/dashboard/sejarah')->with('message', 'Anda tidak memiliki akses ini');
        }
    }
}
