<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::latest()->get();
        return view('Dashboard.faq.index', compact('faq'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.faq.create');
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
            'pertanyaan' => 'required|min:5',
            'jawaban' => 'required|min:5',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $faq = Faq::create([
                'pertanyaan'     => $request->input('pertanyaan'),
                'jawaban'     => $request->input('jawaban')
            ]);
            if ($faq) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
            return redirect()->route('dashboard.faq.index');
        } else {
            return redirect('/dashboard/faq')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Faq $faq)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.faq.edit', [
                'faq' => $faq,
            ]);
        } else {
            return redirect('/dashboard/faq')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'pertanyaan' => 'required|min:5',
            'jawaban' => 'required|min:5',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $faq->update([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
            ]);
            if ($faq) {
                session()->flash('success', 'Data Kajian Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Kajian Gagal Disimpan');
            }
            return redirect()->route('dashboard.faq.index');
        } else {
            return redirect('/dashboard/faq')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $faq->delete();
            return redirect()->route('dashboard.faq.index')
                ->with('danger', 'Data Pelayanan Berhasil dihapus');
        } else {
            return redirect('/dashboard/faq')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
