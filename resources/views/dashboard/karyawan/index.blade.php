<!-- filepath: d:\Latihan\leave-management\resources\views\dashboard\karyawan\index.blade.php -->
<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'Karyawan' => null,
        ]" />

        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Data Karyawan Pribadi</h3>
            <x-link href="{{ route('dashboard.karyawan.edit') }}">
                <i class="fas fa-edit mr-2"></i> Edit Data
            </x-link>
        </div>

        <!-- Card Data Karyawan -->
        <div class="flex gap-8">
            <div class="rounded-xl bg-gray-100 px-6 py-4 shadow-md flex flex-col items-center">
                <img src="{{ asset('avatar/avatar.jpg') }}" alt="Karyawan" class="w-80 h-auto rounded-full shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mt-4">
                    {{ $karyawan ? $karyawan->nama_lengkap : 'Belum ada data' }}
                </h2>
                <p class="text-gray-600 mt-2">
                    {{ $karyawan ? $karyawan->jabatan->nama : 'Belum ada jabatan' }}
                </p>
            </div>
            @if ($karyawan)
                <div class="bg-gray-100 w-full p-4 rounded-lg shadow-md">
                    <div class="">
                        <x-input-label for="nama_lengkap" value="Nama Lengkap" />
                        <x-text-input id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" disabled />

                    </div>
                    <div class="mt-4">
                        <x-input-label for="nip" value="NIP" />
                        <x-text-input id="nip" name="nip" value="{{ old('nip', $karyawan->nip) }}" disabled />

                    </div>
                    <div class="mt-4">
                        <x-input-label for="no_hp" value="No HP" />
                        <x-text-input id="no_hp" name="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}"
                            disabled />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="jabatan_id" value="Jabatan" />
                        <x-text-input id="jabatan_id" name="jabatan_id"
                            value="{{ old('jabatan_id', $karyawan->jabatan->nama) }}" disabled />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="status" value="Status" />
                        <x-text-input id="status" name="status" value="{{ old('status', $karyawan->status) }}"
                            disabled />
                    </div>
                @else
                    <p class="text-gray-600">Belum ada data karyawan untuk akun ini.</p>
            @endif
        </div>
    </div>
</x-app-layout>
