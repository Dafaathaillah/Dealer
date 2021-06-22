<?php

namespace App\Http\Controllers;

use App\Models\KendaraanMasuk;
use Illuminate\Http\Request;

class KendaraanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraanMasuks = KendaraanMasuk::all();
        return view('kendaraanMasuk.index', compact('kendaraanMasuks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraanMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'tahun_pembuatan' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        KendaraanMasuk::create($request->all());
        return redirect()->route('kendaraanmasuk.index')-> with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(KendaraanMasuk $kendaraanMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraanMasuk = KendaraanMasuk::find($id);
        return view('kendaraanMasuk.edit', compact('kendaraanMasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'tahun_pembuatan' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        KendaraanMasuk::find($id)->update($request->all());
        return redirect()->route('kendaraanmasuk.index')-> with('success', 'Data Berhasil DiUpdate');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KendaraanMasuk::find($id)->delete();
        return redirect()->route('kendaraanmasuk.index')-> with('success', 'Data Berhasil Dihapus');
    }
}
