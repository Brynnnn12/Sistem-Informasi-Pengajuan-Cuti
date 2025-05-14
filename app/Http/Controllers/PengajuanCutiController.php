<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Http\Requests\StorePengajuanCutiRequest;
use App\Http\Requests\UpdatePengajuanCutiRequest;
use App\Models\JenisCuti;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class PengajuanCutiController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $pengajuanCuti = $user->hasRole('Admin')
            ? PengajuanCuti::with('karyawan.user')->paginate(10)
            : PengajuanCuti::where('karyawan_id', $user->karyawan->id)->get();

        // Jika Anda ingin mengambil item pertama dari koleksi, Anda bisa menggunakan first()
        $firstPengajuanCuti = $pengajuanCuti->first(); // Jika $pengajuanCuti adalah koleksi biasa (bukan hasil paginasi)

        // Jika $pengajuanCuti adalah hasil paginasi, Anda bisa menggunakan firstItem() atau get data halaman pertama
        // $firstPengajuanCuti = $pengajuanCuti->firstItem(); // Untuk mengambil item pertama di halaman yang sedang aktif

        return view('dashboard.pengajuan.index', compact('pengajuanCuti', 'firstPengajuanCuti'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Auth::user()->karyawan;

        if (!$karyawan) {
            return redirect()->route('dashboard.karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        $jenisCuti = JenisCuti::all();

        return view('dashboard.pengajuan.create', compact('karyawan', 'jenisCuti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanCutiRequest $request)
    {
        /** @var \Illuminate\Http\Request $request */
        // dd($request->all());
        $validated = $request->validated();
        $user = Auth::user();

        if ($request->hasFile('lampiran_keterangan')) {
            $lampiranPath = $request->file('lampiran_keterangan')->store('lampiran', 'public');
        } else {
            $lampiranPath = null;
        }



        PengajuanCuti::create([
            'karyawan_id' => $user->karyawan->id,
            'jenis_cuti_id' => $validated['jenis_cuti_id'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'alasan' => $validated['alasan'],
            'lampiran_keterangan' => $lampiranPath,
            'status' => 'diajukan',
        ]);

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Pengajuan cuti berhasil dibuat.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanCuti $pengajuan)
    {
        $this->authorize('update', $pengajuan);
        $karyawan = Auth::user()->karyawan;
        if (!$karyawan) {
            return redirect()->route('dashboard.karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }
        $jenisCuti = JenisCuti::all();

        return view('dashboard.pengajuan.edit', compact('pengajuan', 'karyawan', 'jenisCuti'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanCutiRequest $request, PengajuanCuti $pengajuan)
    {
        /** @var \Illuminate\Http\Request $request */
        $this->authorize('update', $pengajuan);

        $validated = $request->validated();

        // Proses upload file lampiran jika ada file baru
        if ($request->hasFile('lampiran_keterangan')) {
            // Hapus file lama jika ada
            if ($pengajuan->lampiran_keterangan && Storage::disk('public')->exists($pengajuan->lampiran_keterangan)) {
                Storage::disk('public')->delete($pengajuan->lampiran_keterangan);
            }

            // Simpan file baru ke direktori 'lampiran' di disk 'public'
            $validated['lampiran_keterangan'] = $request->file('lampiran_keterangan')->store('lampiran', 'public');
        }

        // Update data
        $pengajuan->update($validated);

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Pengajuan cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanCuti $pengajuan)
    {
        $this->authorize('delete', $pengajuan);

        if ($pengajuan->lampiran_keterangan && Storage::disk('public')->exists($pengajuan->lampiran_keterangan)) {
            Storage::disk('public')->delete($pengajuan->lampiran_keterangan);
        }

        $pengajuan->delete();

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Pengajuan cuti berhasil dihapus.');
    }
}
