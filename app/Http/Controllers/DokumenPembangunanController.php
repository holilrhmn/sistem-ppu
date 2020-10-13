<?php

namespace App\Http\Controllers;

use App\dokumenPembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class DokumenPembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembangunan = dokumenPembangunan::latest()->get();
        return view('Dashboard.pembangunan.index', compact('pembangunan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.pembangunan.create');
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
            'deskripsi' => 'required|min:5',
            'dokumen' => 'required'
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $dokumen = $request->file('dokumen');

            $nama_file = time() . "_" . $dokumen->getClientOriginalName();

            //  folder tempat kemana file diupload
            $tujuan_upload = 'public/pembangunan';
            $dokumen->move($tujuan_upload, $nama_file);

            $pembangunan = dokumenPembangunan::create([
                'dokumen'       => $nama_file,
                'judul'     => $request->input('judul'),
                'deskripsi'     => $request->input('deskripsi'),
            ]);
            if ($pembangunan) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.dokumen-pembangunan.index');
        } else {
            return redirect('/dashboard/dokumen-pembangunan')->with('error', 'Anda tidak memiliki akses ini');
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
    public function edit(dokumenPembangunan $pembangunan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.pembangunan.edit', [
                'pembangunan' => $pembangunan,
            ]);
        } else {
            return redirect('/dashboard/dokumen-pembangunan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokumenPembangunan $pembangunan)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            if ($request->file('dokumen') == "") {

                $dokumen = dokumenPembangunan::findOrFail($pembangunan->id);
                $dokumen->update([
                    'judul'     => $request->input('judul'),
                    'tentang'     => $request->input('tentang'),
                ]);
            } else {
                //remove old image
                File::delete('public/pembangunan/' . $pembangunan->dokumen);

                //upload new image
                $dokumen = $request->file('dokumen');

                $nama_file = time() . "_" . $dokumen->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/pembangunan';
                $dokumen->move($tujuan_upload, $nama_file);


                $pembangunan = dokumenPembangunan::findOrFail($pembangunan->id);
                $pembangunan->update([
                    'dokumen'       => $nama_file,
                    'judul'     => $request->input('judul'),
                    'deskripsi'     => $request->input('deskripsi'),
                ]);
            }

            if ($pembangunan) {
                session()->flash('success', 'Data Dokumen Pembangunan Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Dokumen Pembangunan Gagal Disimpan');
            }

            return redirect()->route('dashboard.dokumen-pembangunan.index');
        } else {
            return redirect('/dashboard/dokumen-pembangunan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokumenPembangunan $pembangunan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            File::delete('public/pembangunan/' . $pembangunan->dokumen);
            $pembangunan->delete();
            return redirect()->route('dashboard.dokumen-pembangunan.index')
                ->with('danger', 'Data Privacy Berhasil dihapus');
        } else {
            return redirect('/dashboard/dokumen-pembangunan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    public function download($dokumen)
    {

        return response()->download('public/pembangunan/' . $dokumen);
    }
}
