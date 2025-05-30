<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        /**
         * Menampilkan semua jabatan
         */
        $jabatans = Jabatan::paginate(10);
        return view('dashboard.jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        /**
         * Menampilkan form untuk menambah jabatan
         */
        return view('dashboard.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        //
        /**
         * Menyimpan jabatan baru ke database
         */
        Jabatan::create($request->validated());
        return redirect()->route('dashboard.jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
        /**
         * Menampilkan form untuk mengedit jabatan
         */
        return view('dashboard.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        //
        /**
         * Mengupdate jabatan yang sudah ada
         */
        $jabatan->update($request->validated());
        return redirect()->route('dashboard.jabatan.index')->with('success', 'Jabatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
        /**
         * Menghapus jabatan dari database
         */
        $jabatan->delete();
        return redirect()->route('dashboard.jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
