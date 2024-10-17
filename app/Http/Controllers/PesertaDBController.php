<?php

namespace App\Http\Controllers;

use App\Models\PesertaDB;
use Illuminate\Http\Request;

class PesertaDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = PesertaDB::all();
        return view('peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.create');
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
            'name' => 'required',
            'sekolah' => 'required',
            'tanggallahir' => 'required|date',
            'alamat' => 'required',
            'nisn' => 'required|numeric',
        ]);

        PesertaDB::create([
            'name' => $request->name,
            'sekolah' => $request->sekolah,
            'tanggallahir' => $request->tanggallahir,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesertaDB  $pesertaDB
     * @return \Illuminate\Http\Response
     */
    public function show(PesertaDB $pesertaDB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesertaDB  $pesertaDB
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = PesertaDB::find($id);
        return view('peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesertaDB  $pesertaDB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'sekolah' => 'required',
            'tanggallahir' => 'required|date',
            'alamat' => 'required',
            'nisn' => 'required|numeric',
        ]);

        PesertaDB::where('id', $id)->update([
            'name' => $request->name,
            'sekolah' => $request->sekolah,
            'tanggallahir' => $request->tanggallahir,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
        ]);
        return redirect()->route('peserta.home')->with('success', 'Berhasil mengubah data peserta!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesertaDB  $pesertaDB
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PesertaDB::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data peserta!');
    }
}
