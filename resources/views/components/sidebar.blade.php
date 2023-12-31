<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 "
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white ">

        <ul class="space-y-2">
            @php
                if (session('authenticate') && session('authenticate')->peran == 'Admin') {
                    $route = '/';
                } elseif (session('authenticate') && session('authenticate')->peran == 'Dokter') {
                    $route = route('dokter.home');
                } else {
                    $route = '/';
                }

            @endphp
            <li>
                <a href={{ $route }}
                    class=" {{ menuActive(['home']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Overview</span>
                </a>
            </li>
            @if (session('authenticate') && session('authenticate')->peran == 'Admin')
                <li>
                    <button type="button"
                        class="{{ menuActive(['obat.index', 'obat.edit', 'obat.tambah']) }} flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  "
                        aria-controls="dropdown-obat" data-collapse-toggle="dropdown-obat">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Obat</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-obat" class="hidden py-2 space-y-2 transition-transform duration-100">
                        <li>
                            <a href={{ route('obat.index') }}
                                class="{{ subMenuActive(['obat.index']) }} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Tabel
                                Obat</a>
                        </li>
                        <li>
                            <a href={{ route('obat.create') }}
                                class=" {{ subMenuActive(['obat.create']) }} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Tambah
                                Obat</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  {{ menuActive(['poli.index', 'poli.edit', 'poli.tambah']) }}"
                        aria-controls="dropdown-poli" data-collapse-toggle="dropdown-poli">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Data poli</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-poli" class="hidden py-2 space-y-2 transition-transform duration-100">
                        <li>
                            <a href={{ route('poli.index') }}
                                class="{{ subMenuActive(['poli.index']) }} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Tabel
                                Poli</a>
                        </li>
                        <li>
                            <a href={{ route('poli.create') }}
                                class=" {{ subMenuActive(['poli.create']) }} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Tambah
                                Poli</a>
                        </li>

                    </ul>
                </li>
            @elseif (session('authenticate') && session('authenticate')->peran == 'Dokter')
                <li>
                    <a href="{{ route('riwayat') }}"
                        class=" {{ menuActive(['riwayat']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Riwayat</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pasien') }}"
                        class=" {{ menuActive(['pasien']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Periksa</span>
                    </a>
                </li>
            @endif






            {{-- <li>
            <a href={{route('dashboard.tahunAjar')}}
                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group {{set_active_admin(['dashboard.tahunAjar'])}}">
            
          <div class="flex justify-center items-center w-6 h-6">
            <i class="fa-regular fa-calendar-days w-auto  text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>
          </div>
                <span class="ml-3">Tahun Ajar</span>
            </a>
        </li> --}}
        </ul>

    </div>

    </div>
</aside>
