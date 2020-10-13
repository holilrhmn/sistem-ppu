<?php

namespace App\Http\Controllers;

use App\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::latest()->get();
        return view('Dashboard.kontak.index',compact('kontak'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.kontak.create');
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
            'nama' => 'required|min:5',
            'telp' => 'required|numeric',
            'alamat' => 'required|min:5',
            'email' => 'required|email',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $logo = $request->file('logo');
 
            $nama_file = time()."_".$logo->getClientOriginalName();
        
                // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/kontak';
            $logo->move($tujuan_upload,$nama_file);

            $kontak = Kontak::create([
                'logo'       => $nama_file,
                'nama'     => $request->input('nama'),
                'email'     => $request->input('email'),
                'telp'     => $request->input('telp'),
                'alamat'     => $request->input('alamat'),
            ]);
            if($kontak) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.kontak.index');
        }else{  
            return redirect('/dashboard/kontak')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Kontak $kontak)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.kontak.edit', [
                'kontak' => $kontak,
            ]);
        }else{
            return redirect('/dashboard/kontak')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontak $kontak)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'telp' => 'required|numeric',
            'alamat' => 'required|min:5',
            'email' => 'required|email',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            if ($request->file('logo') == "") {

                $kontak = Kontak::findOrFail($kontak->id);
                $kontak->update([
                 
                    'nama'     => $request->input('nama'),
                    'email'     => $request->input('email'),
                    'telp'     => $request->input('telp'),
                    'alamat'     => $request->input('alamat'),
                ]);

            } else {
                //remove old image
                Storage::disk('public')->delete('public/kontak/'.$kontak->foto);

                //upload new image
                $foto = $request->file('foto');
 
                $nama_file = time()."_".$foto->getClientOriginalName();
            
                    // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/kontak';
                $foto->move($tujuan_upload,$nama_file);


                $kontak = Kontak::findOrFail($kontak->id);
                $kontak->update([
                    'logo'       => $nama_file,
                    'nama'     => $request->input('nama'),
                    'email'     => $request->input('email'),
                    'telp'     => $request->input('telp'),
                    'alamat'     => $request->input('alamat'),
                ]);

            }

            if($kontak) {
                session()->flash('success', 'Data Kontak Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kontak Gagal Disimpan');
            }
        
                return redirect()->route('dashboard.kontak.index');
        }else{  
            return redirect('/dashboard/sambutan')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $kontak)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $kontak->delete();
            return redirect()->route('dashboard.kontak.index')
            ->with('danger', 'Data Kontak Berhasil dihapus');
        }else{
            return redirect('/dashboard/kontak')->with('message', 'Anda tidak memiliki akses ini');
        }
    }
}
