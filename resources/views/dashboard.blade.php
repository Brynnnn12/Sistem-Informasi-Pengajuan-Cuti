<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Pengajuan -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Jumlah Pengajuan</h2>
                    <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">
                        {{ $total ?? 0 }}
                    </p>
                </div>

                <!-- Pengajuan Disetujui -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Disetujui</h2>
                    <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">
                        {{ $approved ?? 0 }}
                    </p>
                </div>

                <!-- Pengajuan Ditolak -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Ditolak</h2>
                    <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">
                        {{ $rejected ?? 0 }}
                    </p>
                </div>
            </div>

            <!-- Konten lainnya -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
                    <p>Welcome to the dashboard! Here you can manage your leave requests and view your profile.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
