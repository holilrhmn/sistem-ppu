<?php

namespace App\Http\Controllers;

use App\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regulasi = Regulasi::latest()->get();
        return view('Dashboard.regulasi.index', compact('regulasi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.regulasi.create');
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
            'tentang' => 'required|min:5',
            'dokumen' => 'required'
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $dokumen = $request->file('dokumen');

            $nama_file = time() . "_" . $dokumen->getClientOriginalName();

            //  folder tempat kemana file diupload
            $tujuan_upload = 'public/regulasi';
            $dokumen->move($tujuan_upload, $nama_file);

            $regulasi = Regulasi::create([
                'dokumen'       => $nama_file,
                'judul'     => $request->input('judul'),
                'tentang'     => $request->input('tentang'),
            ]);
            if ($regulasi) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.regulasi.index');
        } else {
            return redirect('/dashboard/regulasi')->with('error', 'Anda tidak memiliki akses ini');
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
    public function edit(Regulasi $regulasi)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.regulasi.edit', [
                'regulasi' => $regulasi,
            ]);
        } else {
            return redirect('/dashboard/regulasi')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulasi $regulasi)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'tentang' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            if ($request->file('dokumen') == "") {

                $dokumen = Regulasi::findOrFail($regulasi->id);
                $dokumen->update([
                    'judul'     => $request->input('judul'),
                    'tentang'     => $request->input('tentang'),
                ]);
            } else {
                //remove old image
                File::delete('public/regulasi/' . $regulasi->dokumen);

                //upload new image
                $dokumen = $request->file('dokumen');

                $nama_file = time() . "_" . $dokumen->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/regulasi';
                $dokumen->move($tujuan_upload, $nama_file);


                $regulasi = Regulasi::findOrFail($regulasi->id);
                $regulasi->update([
                    'dokumen'       => $nama_file,
                    'judul'     => $request->input('judul'),
                    'tentang'     => $request->input('tentang'),
                ]);
            }

            if ($regulasi) {
                session()->flash('success', 'Data Regulasi Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Regulasi Gagal Disimpan');
            }

            return redirect()->route('dashboard.regulasi.index');
        } else {
            return redirect('/dashboard/regulasi')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulasi $regulasi)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            File::delete('public/regulasi/' . $regulasi->dokumen);
            $regulasi->delete();
            return redirect()->route('dashboard.regulasi.index')
                ->with('danger', 'Data Privacy Berhasil dihapus');
        } else {
            return redirect('/dashboard/regulasi')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    public function download($dokumen)
    {

        return response()->download('public/regulasi/' . $dokumen);
    }
}
