<?php

namespace App\Http\Controllers;

use App\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\File;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = StrukturOrganisasi::latest()->get();
        return view('Dashboard.struktur.index', compact('struktur'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.struktur.create');
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
            'gambar' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $gambar = $request->file('gambar');

            $nama_file = time() . "_" . $gambar->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/struktur';
            $gambar->move($tujuan_upload, $nama_file);

            $struktur = StrukturOrganisasi::create([
                'gambar'       => $nama_file,
            ]);
            if ($struktur) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.struktur.index');
        } else {
            return redirect('/dashboard/struktur')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(StrukturOrganisasi $struktur)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.struktur.edit', [
                'struktur' => $struktur,
            ]);
        } else {
            return redirect('/dashboard/struktur')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrukturOrganisasi $struktur)
    {

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            //remove old image
            File::delete('public/sambutan/' . $struktur->gambar);

            //upload new image
            $gambar = $request->file('gambar');

            $nama_file = time() . "_" . $gambar->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/struktur';
            $gambar->move($tujuan_upload, $nama_file);

            $struktur = StrukturOrganisasi::findOrFail($struktur->id);
            $struktur->update([
                'gambar'       => $nama_file,

            ]);

            if ($struktur) {
                session()->flash('success', 'Data Struktur Organisasi Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Struktur Organisasi Gagal Disimpan');
            }

            return redirect()->route('dashboard.struktur.index');
        } else {
            return redirect('/dashboard/struktur')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturOrganisasi $struktur)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            File::delete('public/sambutan/' . $struktur->gambar);
            $struktur->delete();
            return redirect()->route('dashboard.struktur.index')
                ->with('danger', 'Data Privacy Berhasil dihapus');
        } else {
            return redirect('/dashboard/struktur')->with('message', 'Anda tidak memiliki akses ini');
        }
    }
}
