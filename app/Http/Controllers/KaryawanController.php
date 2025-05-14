<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data karyawan milik pengguna yang sedang login
        $karyawan = Auth::user()->karyawan;

        return view('dashboard.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Ambil data karyawan milik user yang sedang login dan muat relasi jabatan
        $karyawan = Auth::user()->karyawan()->with('jabatan')->first();

        // Cek jika tidak ada data karyawan
        if (!$karyawan) {
            return redirect()->route('dashboard.karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Ambil semua jabatan untuk dropdown
        $jabatans = Jabatan::all();

        // // Debugging, untuk memastikan data karyawan sudah benar
        // dd($karyawan); // Hapus ini setelah pengecekan

        return view('dashboard.karyawan.edit', compact('karyawan', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request)
    {
        // Ambil data karyawan yang dimiliki oleh user yang sedang login
        $karyawan = Auth::user()->karyawan;

        // Cek jika tidak ada data karyawan
        if (!$karyawan) {
            return redirect()->route('dashboard.karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        // dd($request->validated()); // Debugging, untuk memastikan data yang divalidasi sudah benar
        // Update data yang sudah divalidasi
        $karyawan->update($request->validated());

        return redirect()->route('dashboard.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }
}
