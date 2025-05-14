            <div class="bg-white shadow px-4 py-4 flex items-center justify-between">
                <button @click="open = !open" class="text-gray-500 focus:outline-none focus:ring lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <span class="text-lg font-bold">{{ config('app.name', 'Sistem Pengajuan Cuti') }}</span>
            </div>
