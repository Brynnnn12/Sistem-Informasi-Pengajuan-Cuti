<x-app-layout>
    <div class="bg-white p-6 rounded-xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Edit Data Karyawan
            </h3>

            <a href="{{ route('dashboard.karyawan.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <!-- Form Edit Karyawan -->
        <form action="{{ route('dashboard.karyawan.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-6xl">
                <div>
                    <x-input-label for="nama_lengkap" value="Nama" />
                    <x-text-input id="nama_lengkap" name="nama_lengkap"
                        value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" required />
                    <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="nip" value="Nip" />
                    <x-text-input id="nip" name="nip" value="{{ old('nip', $karyawan->nip) }}" required />
                    <x-input-error :messages="$errors->get('nip')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="no_hp" value="No HP" />
                    <x-text-input id="no_hp" name="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}" required />
                    <x-input-error :messages="$errors->get('no_hp')" class="mt-1" />
                </div>

                <!-- Ganti input jabatan menjadi select -->
                <div>
                    <x-input-label for="jabatan_id" value="Jabatan" />
                    <select id="jabatan_id" name="jabatan_id"
                        class="mt-1 block w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}"
                                {{ old('jabatan_id', $karyawan->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                {{ $jabatan->nama }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('jabatan_id')" class="mt-1" />
                </div>



                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
