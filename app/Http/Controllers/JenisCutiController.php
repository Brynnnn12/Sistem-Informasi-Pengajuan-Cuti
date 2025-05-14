<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Http\Requests\StoreJenisCutiRequest;
use App\Http\Requests\UpdateJenisCutiRequest;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Menampilkan semua jenis cuti
         */
        $jenisCutis = JenisCuti::paginate(10);
        return view('dashboard.jenis-cuti.index', compact('jenisCutis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        /**
         * Menampilkan form untuk menambah jenis cuti
         */
        return view('dashboard.jenis-cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisCutiRequest $request)
    {

        /**
         * Menyimpan jenis cuti baru ke database
         */
        JenisCuti::create($request->validated());
        return redirect()->route('dashboard.jenis-cuti.index')->with('success', 'Jenis cuti berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisCuti $jenisCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisCuti $jenisCuti)
    {

        /**
         * Menampilkan form untuk mengedit jenis cuti
         */
        return view('dashboard.jenis-cuti.edit', compact('jenisCuti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisCutiRequest $request, JenisCuti $jenisCuti)
    {
        //
        /**
         * Mengupdate jenis cuti yang sudah ada
         */
        $jenisCuti->update($request->validated());
        return redirect()->route('dashboard.jenis-cuti.index')->with('success', 'Jenis cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisCuti $jenisCuti)
    {
        //
        /**
         * Menghapus jenis cuti dari database
         */
        $jenisCuti->delete();
        return redirect()->route('dashboard.jenis-cuti.index')->with('success', 'Jenis cuti berhasil dihapus.');
    }
}
