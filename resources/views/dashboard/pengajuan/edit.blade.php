<x-app-layout>
    <div class="bg-white p-6 rounded-xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Edit Pengajuan Cuti
            </h3>

            <a href="{{ route('dashboard.pengajuan.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        {{-- Tambahkan div pembungkus untuk scroll --}}
        <div class="max-h-[80vh] overflow-y-auto pr-2">
            <form action="{{ route('dashboard.pengajuan.update', $pengajuan) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6 max-w-6xl">
                    <div>
                        <x-input-label for="jenis_cuti_id" value="Jenis Cuti" />
                        <select name="jenis_cuti_id" id="jenis_cuti_id"
                            class="mt-1 block w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach ($jenisCuti as $cuti)
                                <option value="{{ $cuti->id }}"
                                    {{ $pengajuan->jenis_cuti_id == $cuti->id ? 'selected' : '' }}>
                                    {{ $cuti->nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('jenis_cuti_id')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="tanggal_mulai" value="Tanggal Mulai" />
                        <x-text-input id="tanggal_mulai" name="tanggal_mulai" type="date"
                            value="{{ old('tanggal_mulai', $pengajuan->tanggal_mulai) }}" required />
                        <x-input-error :messages="$errors->get('tanggal_mulai')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="tanggal_selesai" value="Tanggal Selesai" />
                        <x-text-input id="tanggal_selesai" name="tanggal_selesai" type="date"
                            value="{{ old('tanggal_selesai', $pengajuan->tanggal_selesai) }}" required />
                        <x-input-error :messages="$errors->get('tanggal_selesai')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="alasan" value="Alasan" />
                        <textarea id="alasan" name="alasan" rows="4"
                            class="mt-1 block w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('alasan', $pengajuan->alasan) }}</textarea>
                        <x-input-error :messages="$errors->get('alasan')" class="mt-1" />
                    </div>

                    <div x-data="{ previewImage: '{{ $pengajuan->lampiran_keterangan ? asset('storage/' . $pengajuan->lampiran_keterangan) : '' }}' }">
                        <x-input-label for="lampiran_keterangan" value="Lampiran Keterangan (opsional)" />
                        <x-file-input id="lampiran_keterangan" name="lampiran_keterangan" type="file"
                            @change="previewImage = URL.createObjectURL($event.target.files[0])" />
                        <div class="mt-4">
                            <template x-if="previewImage">
                                <img :src="previewImage" alt="Lampiran"
                                    class="h-32 w-32 object-cover rounded-lg shadow-md">
                            </template>
                        </div>
                        <x-input-error :messages="$errors->get('lampiran_keterangan')" class="mt-1" />
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
    </div>
</x-app-layout>
