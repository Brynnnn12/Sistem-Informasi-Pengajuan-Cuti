<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm">
        <x-breadcrumb :links="[
            'PengajuanCuti' => null,
        ]" />

        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Pengajuan Cuti</h3>
            <x-link href="{{ route('dashboard.pengajuan.create') }}">
                <i class="fas fa-plus mr-2"></i> Tambah Pengajuan
            </x-link>
        </div>

        <!-- Table Wrapper for Responsiveness -->
        <!-- Modal untuk menampilkan gambar -->
        <div x-data="{ showImage: null }">
            <div x-show="showImage" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
                <div class="relative">
                    <img :src="showImage" alt="Lampiran" class="w-90 h-80 object-cover rounded-lg shadow-lg" />
                    <button @click="showImage = null"
                        class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                </div>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jenis Cuti</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Mulai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Selesai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lampiran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($pengajuanCuti as $index => $cuti)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $cuti->karyawan->nama_lengkap }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $cuti->jenisCuti->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    @if ($cuti->lampiran_keterangan)
                                        <img src="{{ asset('storage/' . $cuti->lampiran_keterangan) }}" alt="Lampiran"
                                            class="h-16 w-16 object-cover cursor-pointer"
                                            @click="showImage = '{{ asset('storage/' . $cuti->lampiran_keterangan) }}'" />
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    @role('User')
                                        <!-- Tampilan untuk User -->
                                        @if ($cuti->status == 'diajukan')
                                            <span class="text-yellow-500">Diajukan</span>
                                        @elseif ($cuti->status == 'disetujui')
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span class="text-green-500">Disetujui</span>
                                        @elseif ($cuti->status == 'ditolak')
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            <span class="text-red-500">Ditolak</span>
                                        @endif
                                    @endrole

                                    @role('Admin')
                                        <!-- Tampilan untuk Admin -->
                                        @if ($cuti->status == 'diajukan')
                                            <form
                                                action="{{ route('dashboard.pengajuan.updateStatus', ['pengajuan' => $cuti->id, 'status' => 'disetujui']) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-xs">
                                                    Setujui
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('dashboard.pengajuan.updateStatus', ['pengajuan' => $cuti->id, 'status' => 'ditolak']) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs">
                                                    Tolak
                                                </button>
                                            </form>
                                        @elseif ($cuti->status == 'disetujui')
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span class="text-green-500">Disetujui</span>
                                        @elseif ($cuti->status == 'ditolak')
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            <span class="text-red-500">Ditolak</span>
                                        @endif
                                    @endrole
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <x-action-buttons :item="$cuti" editRoute="dashboard.pengajuan.edit"
                                        deleteRoute="dashboard.pengajuan.destroy" :edit="!in_array($cuti->status, ['disetujui', 'ditolak'])" />

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada pengajuan cuti.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <x-paginate :paginator="$pengajuanCuti" />
    </div>
</x-app-layout>
