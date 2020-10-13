<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = Link::latest()->get();
        return view('Dashboard.Link.index',compact('link'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.link.create');
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
            'link' => 'required|min:8',
            'title' => 'required|min:10',
        ]);

        $lvl = Auth::user()->level;
        if ($lvl == 100) {
           
            $link = Link::create([
                'link'     => $request->input('link'),
                'title'     => $request->input('title')
            ]);
            if($link) {
                session()->flash('success', 'Data saved successfully');
            } else {
                session()->flash('error', 'Data failed to save');
            }
             return redirect()->route('dashboard.link.index');
        }else{  
            return redirect('/dashboard/link')->with('message', 'Anda tidak memiliki akses ini');
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
    public function edit(Link $link)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            return view('Dashboard.link.edit', [
                'link' => $link,
            ]);
        }else{
            return redirect('/dashboard/link')->with('message', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $this->validate($request, [
            'link' => 'required|min:8',
            'title' => 'required|min:10',
        ]);
        $lvl = Auth::user()->level;
        if ($lvl == 100) {

            $link->update([
                'title'=> $request->title,
                'link'=> $request->link,
            ]);
            if($link) {
                session()->flash('success', 'Data Link Terkait Berhasil Diperbarui');
            } else {
                session()->flash('error', 'Data Link Terkait Gagal Disimpan');
            }
            return redirect()->route('dashboard.link.index');
        }else{  
            return redirect('/dashboard/link')->with('error', 'Anda tidak memiliki akses ini');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $lvl = Auth::user()->level;
        if ($lvl == 100) {
            $link->delete();
            return redirect()->route('dashboard.link.index')
            ->with('danger', 'Data Pelayanan Berhasil dihapus');
        }else{
            return redirect('/dashboard/link')->with('error', 'Anda tidak memiliki akses ini');
        }
    }
}
