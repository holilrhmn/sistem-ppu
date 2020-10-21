<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::latest()->get();
        return view('Dashboard.merk.index', compact('type'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.type.create');
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
            'jumlah' => 'required|min:1',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $type = Type::create([
                'name'     => $request->input('name'),
                'jumlah'     => $request->input('jumlah'),
            ]);
            if ($type) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.type.index');
        } else {
            return redirect('/dashboard/type')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Type $type)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.type.edit', [
                'type' => $type,
            ]);
        } else {
            return redirect('/dashboard/type')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'jumlah' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $type->update([
                'name' => $request->name,
                'jumlah' => $request->jumlah,
            ]);
            if ($type) {
                session()->flash('success', 'Data Kajian Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kajian Gagal Disimpan');
            }
            return redirect()->route('dashboard.type.index');
        } else {
            return redirect('/dashboard/type')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $type->delete();
            return redirect()->route('dashboard.type.index')
                ->with('danger', 'Data Pelayanan Berhasil dihapus');
        } else {
            return redirect('/dashboard/type')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
