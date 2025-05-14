<!-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\sidebar.blade.php -->
<div class="fixed inset-y-0 left-0 bg-blue-800 text-white w-64 transform transition-transform duration-300 lg:translate-x-0"
    :class="{ '-translate-x-full': !open }">
    <div class="p-4 text-lg font-bold border-b border-blue-700 flex justify-between items-center">
        {{ config('app.name', 'Laravel') }}
        <!-- Close Button -->
        <button @click="open = false" class="text-white focus:outline-none lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <nav class="mt-4">
        <a href="{{ route('dashboard') }}" class="flex items-center active-nav-link text-white py-3 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3 text-blue-300"></i>
            Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A1 1 0 016 17h12a1 1 0 01.707 1.707l-6 6a1 1 0 01-1.414 0l-6-6A1 1 0 015.121 17.804z" />
            </svg>
            Profile
        </a>
        <a href="{{ route('dashboard.jabatan.index') }}"
            class="flex items-center active-nav-link text-white py-3 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3 text-blue-300"></i>
            Jabatan
        </a>

        <a href="{{ route('dashboard.users.index') }}" class="block px-4 py-2 hover:bg-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
            </svg>
            Users
        </a>
        <a href="{{ route('dashboard.pengajuan-cuti.index') }}"
            class="block px-4 py-2 hover:bg-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
            </svg>
            Pengajuan Cuti
        </a>
        <a href="{{ route('dashboard.jenis-cuti.index') }}" class="block px-4 py-2 hover:bg-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
            </svg>
            Jenis Cuti
        </a>
        <a href="{{ route('dashboard.karyawan.index') }}" class="block px-4 py-2 hover:bg-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
            </svg>
            Karyawan
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block px-4 py-2 hover:bg-blue-700 flex items-center">
                <i class="fas fa-user -bar mr-3 text-blue-300"></i> Logout
            </button>
        </form>
    </nav>
</div>
