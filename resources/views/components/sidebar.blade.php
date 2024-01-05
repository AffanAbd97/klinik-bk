<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800 dark:border-gray-700">

        <ul class="space-y-2">
            @php
                if (session('authenticate') && session('authenticate')->peran == 'Admin') {
                    $route = route('admin.home');
                } elseif (session('authenticate') && session('authenticate')->peran == 'Dokter') {
                    $route = route('dokter.home');
                } else {
                    $route = route('pasien.home');
                }
                
            @endphp
            <li>
                <a href={{ $route }}
                    class=" {{ menuActive(['home','admin.home','pasien.home','dokter.home','pasien.periksa']) }} flex items-center p-2  text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Overview</span>
                </a>
            </li>
            @if (session('authenticate') && session('authenticate')->peran == 'Admin')
                <li>
                    <a href="{{ route('dokter.index') }}"
                        class=" {{ menuActive(['dokter.index', 'dokter.tambah', 'dokter.edit']) }} flex items-center justify-between p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">

                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid fa-user-nurse text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>
                            <span class="ml-3">Dokter</span>
                        </div>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium   px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.pasien')}}"
                        class=" {{ menuActive(['admin.pasien']) }} flex items-center justify-between  p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-hospital-user text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>
                            <span class="ml-3">Pasien</span>
                        </div>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium   px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('poli.index') }}"
                        class=" {{ menuActive(['poli.index', 'poli.tambah', 'poli.edit']) }} flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-hospital text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Poli</span>
                        </div>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium   px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Admin</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('obat.index') }}"
                        class=" {{ menuActive(['obat.index', 'obat.tambah', 'obat.edit']) }} flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid fa-pills text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Obat</span>
                        </div>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium   px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Admin</span>

                    </a>
                </li>
            @elseif (session('authenticate') && session('authenticate')->peran == 'Dokter')
                <li>
                    <a href="{{ route('dokter.periksa') }}"
                        class=" {{ menuActive(['dokter.periksa']) }} flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-stethoscope text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Periksa Pasien</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Dokter</span>

                    </a>
                    
                </li>
                <li>
                    <a href="{{ route('dokter.riwayat') }}"
                        class=" {{ menuActive(['dokter.riwayat']) }} flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-book-medical text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Riwayat Pasien</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Dokter</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('jadwal.index') }}"
                        class=" {{ menuActive(['jadwal.index','jadwal.create']) }} flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-calendars-days text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Data Jadwal</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Dokter</span>

                    </a>
                </li>
                <li>
                    <a href="{{route('profile.index')  }}"
                        class=" {{ menuActive(['profile.index']) }}  flex items-center p-2 justify-between text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="flex items-center justify-start">
                            <i
                                class="fa-solid  fa-user text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>

                            <span class="ml-3">Profile</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Dokter</span>

                    </a>
                </li>
            @endif

        </ul>

    </div>

    </div>
</aside>
