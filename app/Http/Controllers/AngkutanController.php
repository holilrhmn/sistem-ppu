<?php

namespace App\Http\Controllers;

use App\Angkutan;
use App\Merk;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AngkutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $angkutan = Angkutan::latest()->get();
        return view('Dashboard.angkutan.index', compact('angkutan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::select('id', 'name')->get();
        $type = Type::select('id', 'name')->get();
        return view('Dashboard.angkutan.create', compact('merk', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $angkutan = Angkutan::create([
                'nama_angkutan'     => $request->input('nama_angkutan'),
                'nama_supir'     => $request->input('nama_supir'),
                'plat_no'     => $request->input('plat_no'),
                'merk_id'     => $request->input('merk_id'),
                'type_id'     => $request->input('type_id'),
                'tahun_kendaraan'     => $request->input('tahun_kendaraan'),
                'frekuensi'     => $request->input('frekuensi'),
                'jumlah_tps'     => $request->input('jumlah_tps'),
                'panjang_rute'     => $request->input('panjang_rute'),
                'panjang_jalan'     => $request->input('panjang_jalan'),
                'durasi_pengangkutan'     => $request->input('durasi_pengangkutan'),
                'total_waktu'     => $request->input('total_waktu'),
                'trayek'     => $request->input('trayek'),
            ]);
            if ($angkutan) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.angkutan.index');
        } else {
            return redirect('/dashboard/angkutan')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Angkutan $angkutan)
    {

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $merk = Merk::select('id', 'name')->get();
            $type = Type::select('id', 'name')->get();
            return view('Dashboard.angkutan.edit', [
                'angkutan' => $angkutan,
                'merk' => $merk,
                'type' => $type,
            ]);
        } else {
            return redirect('/dashboard/angkutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angkutan $angkutan)
    {

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $angkutan->update([
                'nama_angkutan'     => $request->input('nama_angkutan'),
                'nama_supir'     => $request->input('nama_supir'),
                'plat_no'     => $request->input('plat_no'),
                'merk_id'     => $request->input('merk_id'),
                'type_id'     => $request->input('type_id'),
                'tahun_kendaraan'     => $request->input('tahun_kendaraan'),
                'frekuensi'     => $request->input('frekuensi'),
                'jumlah_tps'     => $request->input('jumlah_tps'),
                'panjang_rute'     => $request->input('panjang_rute'),
                'panjang_jalan'     => $request->input('panjang_jalan'),
                'durasi_pengangkutan'     => $request->input('durasi_pengangkutan'),
                'total_waktu'     => $request->input('total_waktu'),
                'trayek'     => $request->input('trayek'),
            ]);
            if ($angkutan) {
                session()->flash('success', 'Data Kajian Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kajian Gagal Disimpan');
            }
            return redirect()->route('dashboard.angkutan.index');
        } else {
            return redirect('/dashboard/angkutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angkutan $angkutan)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $angkutan->delete();
            return redirect()->route('dashboard.angkutan.index')
                ->with('danger', 'Data Pelayanan Berhasil dihapus');
        } else {
            return redirect('/dashboard/angkutan')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
