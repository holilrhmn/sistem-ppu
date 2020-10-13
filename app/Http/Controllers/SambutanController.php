<?php

namespace App\Http\Controllers;

use App\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sambutan = Sambutan::latest()->get();
        return view('Dashboard.sambutan.index', compact('sambutan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.sambutan.create');
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
            'isi_sambutan' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $foto = $request->file('foto');

            $nama_file = time() . "_" . $foto->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/sambutan';
            $foto->move($tujuan_upload, $nama_file);

            $sambutan = Sambutan::create([
                'foto'       => $nama_file,
                'isi_sambutan'     => $request->input('isi_sambutan')
            ]);
            if ($sambutan) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.sambutan.index');
        } else {
            return redirect('/dashboard/sambutan')->with('error', 'Anda tidak memiliki akses ini');
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
    public function edit(Sambutan $sambutan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.sambutan.edit', [
                'sambutan' => $sambutan,
            ]);
        } else {
            return redirect('/dashboard/sambutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sambutan $sambutan)
    {
        $this->validate($request, [
            'isi_sambutan' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            if ($request->file('foto') == "") {

                $sambutan = Sambutan::findOrFail($sambutan->id);
                $sambutan->update([
                    'isi_sambutan'     => $request->input('isi_sambutan')
                ]);
            } else {
                //remove old image
                File::delete('public/sambutan/' . $sambutan->foto);

                //upload new image
                $foto = $request->file('foto');

                $nama_file = time() . "_" . $foto->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/sambutan';
                $foto->move($tujuan_upload, $nama_file);


                $sambutan = Sambutan::findOrFail($sambutan->id);
                $sambutan->update([
                    'foto'       => $nama_file,
                    'isi_sambutan'     => $request->input('isi_sambutan')
                ]);
            }

            if ($sambutan) {
                session()->flash('success', 'Data Galeri Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Galeri Gagal Disimpan');
            }

            return redirect()->route('dashboard.sambutan.index');
        } else {
            return redirect('/dashboard/sambutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sambutan $sambutan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            File::delete('public/sambutan/' . $sambutan->foto);
            $sambutan->delete();
            return redirect()->route('dashboard.sambutan.index')
                ->with('danger', 'Data Sambutan Berhasil dihapus');
        } else {
            return redirect('/dashboard/sambutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
