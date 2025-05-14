<x-app-layout>
    <div class="bg-white p-6 rounded-xl ">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Edit Jenis Cuti
            </h3>

            <a href="{{ route('dashboard.jabatan.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.jenis-cuti.update', $jenisCuti) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-6xl">
                <div>
                    <x-input-label for="nama" value="Nama" />

                    <x-text-input id="nama" name="nama" value="{{ old('nama', $jenisCuti->nama) }}" required />

                    <x-input-error :messages="$errors->get('nama')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="jumlah_hari" value="Jumlah Hari" />

                    <x-text-input id="jumlah_hari" name="jumlah_hari"
                        value="{{ old('jumlah_hari', $jenisCuti->jumlah_hari) }}" required />

                    <x-input-error :messages="$errors->get('jumlah_hari')" class="mt-1" />
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
