<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OutletController extends Controller
{
    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$this->authorize('manage_outlet');

        //$outletQuery = Outlet::query();
        //$outletQuery->where('name', 'like', '%' . request('q') . '%');
        //$outlets = $outletQuery->paginate(1000);

        //return view('outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Outlet);

        return view('outlets.create');
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    /*
    public function store(Request $request)
    {

        $this->authorize('create', new Outlet);

        $newOutlet = $request->validate([
            'nib'       => 'required',
            'name'      => 'required',
            'address'   => 'required',
            'nama_pendaftar'   => 'required',
            'telepon_pendaftar'   => 'required',
            'email_pendaftar'   => 'required',
            'nik'   => 'required',
            'kelurahan' => 'required',
            'kbli' => 'required',
            'kecamatan'       => 'required',
            'kelurahan'     => 'nullable',
            'jumlah_tki_l'   => 'nullable',
            'jumlah_tki_p'   => 'nullable',
            'bangunan'   => 'nullable',
            'mesin_peralatan'   => 'nullable',
            'peralatan_impor'  => 'nullable',
            'pembelian_dan_pematangan_tanah'  => 'nullable',
            'investasi_lain_lain'       => 'nullable',
            'pembelian_pematangan_lain_lain'      => 'nullable',
            'modal_kerja_3_bulanan'   => 'nullable',
            'jumlah_investasisin_p'  => 'nullable',
            'tanggal_pengajuan_pemohonan_berusaha' => 'nullable',
            'tanggal_terbit_oss' => 'nullable',
            'jenis_perseroan' => 'nullable',
            'status_penanaman_modal' => 'nullable',
            'nama_pemegang_saham' => 'nullable',
            'total_modal' => 'nullable',
            'jabatan' => 'nullable',
            'negara_asal' => 'nullable',
            'penanggung_jawab' => 'nullable',
             'gambar'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15'
        ]);

        // Check if a profile image has been uploaded
        if ($request->has('gambar')) {
            // Get image file
            $image = $request->file('gambar');
            // Make a image name based on user name and current timestamp
            $name = auth()->id() . '_' . time().'_'.$image->getClientOriginalName();
            // Define folder path
            $folder = 'images';

            $image->move($folder, $name);

            $newOutlet['gambar'] = $name;
        }
        $newOutlet['creator_id'] = auth()->id();
        //dd($newOutlet);

        $outlet = Outlet::create($newOutlet);

        return redirect()->route('outlets.index');
    }
    */
    
    public function store(Request $request)
    {
        
        //$this->authorize('create', new Outlet);

        $newOutlet = $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'nama_pendaftar'   => 'required',
            'telepon_pendaftar'   => 'required',
            'email_pendaftar'   => 'required',

            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15'
        ]);

        $newOutlet['creator_id'] = auth()->id();
        //dd($newOutlet);

        $outlet = Outlet::create($newOutlet);

        return redirect()->route('outlets.index');
      
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function show(Outlet $outlet)
    {
        //dd($outlet);
        return view('outlets.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit(Outlet $outlet)
    {
        $this->authorize('update', $outlet);
        return view('outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Outlet $outlet)
    {
        $this->authorize('update', $outlet);

        $outletData = $request->validate([
            'nib'      => 'required',
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'nama_pendaftar'   => 'required',
            'telepon_pendaftar'   => 'required',
            'email_pendaftar'   => 'required',
            'nik'   => 'required',
            'jumlah_tki_l'    => 'nullable',
            'jumlah_tki_p'    => 'nullable',
            'jumlah_investasisin_p'  => 'nullable',
            'jenis_perseroan'  => 'nullable',
            'status_penanaman_modal'  => 'nullable',
            'nama_pemegang_saham'  => 'nullable',
            'total_modal'  => 'nullable',
            'jabatan'  => 'nullable',
            'negara_asal'  => 'nullable',
            'penanggung_jawab'  => 'nullable',
            'kbli'   => 'required',
            'bangunan'    => 'nullable',
            'mesin_peralatan'    => 'nullable',
            'peralatan_impor'  => 'nullable',
            'pembelian_dan_pematangan_tanah'  => 'nullable',
            'investasi_lain_lain'        => 'nullable',
            'pembelian_pematangan_lain_lain'       => 'nullable',
            'modal_kerja_3_bulanan'    => 'nullable',

            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $outlet->update($outletData);

        return redirect()->route('outlets.show', $outlet);
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Outlet $outlet)
    {

        //$this->authorize('delete', $outlet);

        $request->validate(['outlet_nib' => 'required']);

        if ($request->get('outlet_nib') == $outlet->id && $outlet->delete()) {
            return redirect()->route('outlets.index');
        }

        return back();
    }
}
