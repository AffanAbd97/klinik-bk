<aside
class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 "
aria-label="Sidenav" id="drawer-navigation">
<div class="overflow-y-auto py-5 px-3 h-full bg-white ">

    <ul class="space-y-2">
        <li>
            <a href="#"
                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="ml-3">Overview</span>
            </a>
        </li>
        <li>
            <a href='#'
                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100  group">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="ml-3">Akreditasi</span>
            </a>
        </li>
{{--      
        <li>
            <button type="button"
                class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  "
                aria-controls="dropdown_AMI" data-collapse-toggle="dropdown_AMI">
                <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">AMI</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown_AMI" class="hidden py-2 space-y-2 transition-transform duration-100">
                <li>
                    <a href={{route('dasboard.prodi')}}
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Settings</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Kanban</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Calendar</a>
                </li>
            </ul>
        </li> --}}
        {{-- <li>
            <button type="button"
                class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  {{set_active_admin(['dashboard.instrument.mhs','dashboard.instrument.dsn','dashboard.instrument.tendik'])}}"
                aria-controls="dropdown-instrument" data-collapse-toggle="dropdown-instrument">
                <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Instrument</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-instrument" class="hidden py-2 space-y-2 transition-transform duration-100">
                <li>
                    <a href={{route('dashboard.instrument.mhs')}} 
                        class="{{set_active_sub_admin(['dashboard.instrument.mhs'])}} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Mahasiswa</a>
                </li>
                <li>
                    <a href={{route('dashboard.instrument.dsn')}}
                        class=" {{set_active_sub_admin(['dashboard.instrument.dsn'])}} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Dosen</a>
                </li>
                <li>
                    <a href={{route('dashboard.instrument.tendik')}} 
                        class=" {{set_active_sub_admin(['dashboard.instrument.tendik'])}} flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">Tenaga Pendidik</a>
                </li>
            </ul>
        </li> --}}
     
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
