<nav
class="bg-white border-b border-gray-200 px-4 py-4  fixed left-0 right-0 top-0 z-50 h-16">
<div class="flex flex-wrap justify-between items-center">
    <div class="flex justify-start items-center">
        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100focus:ring-2 focus:ring-gray-100 ">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Toggle sidebar</span>
        </button>
        <a href="\" class="flex items-center justify-between mr-4">
            <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="Flowbite Logo" />
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap ">Poliklinik</span>
        </a>

    </div>
    <div class="flex items-center lg:order-2">
 

        <button type="button"
            class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 "
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full"
                src="https://t3.ftcdn.net/jpg/05/16/27/58/360_F_516275801_f3Fsp17x6HQK0xQgDQEELoTuERO4SsWV.jpg"
                alt="user photo" />
        </button>
        <!-- Dropdown menu -->
        <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow  rounded-xl"
            id="dropdown">
            <div class="py-3 px-4">
                <span class="block text-sm font-semibold text-gray-900 ">{{session()->get("authenticate")->nama}}</span>
                <span class="block text-sm text-gray-900 truncate ">{{session()->get("authenticate")->email}}</span>
            </div>
          
         
            <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                <li>
                    <a href="{{route('logout')}}"
                        class="block py-2 px-4 text-sm hover:bg-gray-100 e">Sign
                        out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>