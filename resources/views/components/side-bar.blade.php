<div class="absolute top-0 left-0 w-full z-40 bg-white shadow-md font-poppins">
    <div class="flex items-center justify-between px-4">
        <div class="flex items-center gap-x-2 sm:ml-60">
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="inline-flex items-center p-2 my-2 text-sm text-gray-500 rounded-lg">
                <svg class="w-6 h-6 sm:hidden" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

            <a href="{{ route('index') }}" class="hidden sm:block font-medium">Aplikasi Pengelolaan Uang Kas</a>
        </div>


        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="inline-flex items-center p-2 my-2 ms-3 text-sm text-gray-500 rounded-lg" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#6B7280" class="w-6 h-6">
                <path
                    d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
            </svg>
        </button>
    </div>

    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
            <li class="flex items-center px-4 gap-x-1 hover:bg-slate-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-6 w-6"
                    fill="#6B7280">
                    <path
                        d="M480-440q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0-80q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0 440q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-400Zm0-315-240 90v189q0 54 15 105t41 96q42-21 88-33t96-12q50 0 96 12t88 33q26-45 41-96t15-105v-189l-240-90Zm0 515q-36 0-70 8t-65 22q29 30 63 52t72 34q38-12 72-34t63-52q-31-14-65-22t-70-8Z" />
                </svg>
                <a href="{{ route('profile') }}" class="block py-2">Profil</a>
            </li>
            <li class="flex items-center px-4 gap-x-1 hover:bg-slate-100">
                <form action="{{ route('logout') }}" method="POST" class="flex items-center w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-x-1 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"
                            class="h-6" fill="#6B7280">
                            <path
                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
                        <span class="block py-2">Keluar</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <hr class="border-1 border">
</div>


<aside id="default-sidebar"
    class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="border-b border-gray-700">
                <a href="{{ route('index') }}"
                    class="flex items-center justify-center p-2 pb-4 text-white rounded-lg group">
                    <img src="{{ asset('images/alanxcode.jpg') }}" alt="Alan X Code" class="h-10 w-10 rounded-full">
                    <span class="ms-3 text-2xl">LANKAS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="flex items-center p-2 text-white rounded-lg bg-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-5 h-5 text-white"
                        fill="#ffffff">
                        <path
                            d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                    </svg>
                    <span class="ms-3">
                        {{ Auth::user()->name ?? 'Guest' }}
                    </span>
                </a>
            </li>
            <li>
                <p class="flex items-center p-2 text-white rounded-lg bg-green-500 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-5 h-5 text-white"
                        fill="#FFFFFF">
                        <path
                            d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z" />
                    </svg>
                    <span class="ms-3">Sisa Uang: Rp{{ number_format($totalUangBersih, 0, ',', '.') }}</span>
                </p>
            </li>
            <li>
                <a href="{{ route('index') }}" class="flex items-center p-2 text-white rounded-lg bg-blue-500 group">
                    <svg class="w-5 h-5 text-white transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('siswa') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
                    </svg>
                    <span class="ms-3">Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('uangkas') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z" />
                    </svg>
                    <span class="ms-3">Uang Kas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pengeluaran') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M240-170Q136-197 68-282T0-480q0-113 68-198t172-112v84q-71 24-115.5 86T80-480q0 78 44.5 140T240-254v84Zm320 10q-133 0-226.5-93.5T240-480q0-133 93.5-226.5T560-800q66 0 124 25t102 69l-56 56q-33-33-76.5-51.5T560-720q-100 0-170 70t-70 170q0 100 70 170t170 70q50 0 93.5-18.5T730-310l56 56q-44 44-102 69t-124 25Zm240-160-56-56 64-64H520v-80h288l-64-64 56-56 160 160-160 160Z" />
                    </svg>
                    <span class="ms-3">Pengeluaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
                    </svg>
                    <span class="ms-3">Laporan</span>
                </a>
            </li>
            <li class="border-t border-gray-700 pt-2">
                <a href="{{ route('riwayatuangkas') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M360-840v-80h240v80H360Zm80 440h80v-240h-80v240Zm40 320q-74 0-139.5-28.5T226-186q-49-49-77.5-114.5T120-440q0-74 28.5-139.5T226-694q49-49 114.5-77.5T480-800q62 0 119 20t107 58l56-56 56 56-56 56q38 50 58 107t20 119q0 74-28.5 139.5T734-186q-49 49-114.5 77.5T480-80Zm0-80q116 0 198-82t82-198q0-116-82-198t-198-82q-116 0-198 82t-82 198q0 116 82 198t198 82Zm0-280Z" />
                    </svg>
                    <span class="ms-3">Riwayat Uang Kas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('riwayatpengeluaran') }}"
                    class="flex items-center p-2 text-white rounded-lg group hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                        <path
                            d="M360-840v-80h240v80H360Zm80 440h80v-240h-80v240Zm40 320q-74 0-139.5-28.5T226-186q-49-49-77.5-114.5T120-440q0-74 28.5-139.5T226-694q49-49 114.5-77.5T480-800q62 0 119 20t107 58l56-56 56 56-56 56q38 50 58 107t20 119q0 74-28.5 139.5T734-186q-49 49-114.5 77.5T480-80Zm0-80q116 0 198-82t82-198q0-116-82-198t-198-82q-116 0-198 82t-82 198q0 116 82 198t198 82Zm0-280Z" />
                    </svg>
                    <span class="ms-3">Riwayat Pengeluaran</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
