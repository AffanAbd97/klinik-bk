<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 "
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white ">

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
                    <a href="{{ route('dokter.index') }}"
                        class=" {{ menuActive(['dokter.index', 'dokter.tambah', 'dokter.edit']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">

                        <i
                            class="fa-solid fa-user-nurse text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>
                        <span class="ml-3">Dokter</span>
                    </a>
                </li>
                <li>
                    <a href="{{ '/' }}"
                        class=" {{ menuActive(['pasien']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid fa-hospital-user text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>

                        <span class="ml-3">Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('poli.index') }}"
                        class=" {{ menuActive(['poli.index', 'poli.tambah', 'poli.edit']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid  fa-hospital text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>

                        <span class="ml-3">Poli</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('obat.index') }}"
                        class=" {{ menuActive(['obat.index', 'obat.tambah', 'obat.edit']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid fa-pills text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>

                        <span class="ml-3">Obat</span>
                    </a>
                </li>
            @elseif (session('authenticate') && session('authenticate')->peran == 'Dokter')
              
                <li>
                    <a href="{{ route('pasien') }}"
                        class=" {{ menuActive(['pasien']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid  fa-hospital text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>
                        <span class="ml-3">Periksa Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dokter.riwayat') }}"
                        class=" {{ menuActive(['dokter.riwayat']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid  fa-hospital text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>
                        <span class="ml-3">Riwayat Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pasien') }}"
                        class=" {{ menuActive(['pasien']) }} flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <i
                            class="fa-solid  fa-hospital text-2xl text-gray-500 transition duration-75  group-hover:text-gray-900 "></i>
                        <span class="ml-3">Profil</span>
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
