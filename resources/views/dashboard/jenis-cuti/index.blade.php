<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'Jenis Cuti' => null,
        ]" />

        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Kategori</h3>
            <x-link href="{{ route('dashboard.jenis-cuti.create') }}">
                <i class="fas fa-plus mr-2"></i> Add jabatan
            </x-link>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 inventory-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jumlah Hari
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($jenisCutis as $index => $cuti)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($jenisCutis->currentPage() - 1) * $jenisCutis->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cuti->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cuti->jumlah_hari }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-action-buttons :item="$cuti" editRoute="dashboard.jenis-cuti.edit"
                                    deleteRoute="dashboard.jenis-cuti.destroy" />
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No jenisCutis found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->

        <x-paginate :paginator="$jenisCutis" />


    </div>
</x-app-layout>
