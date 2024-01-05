<div class="bg-white dark:bg-gray-900 shadow-md dark:shadow-none sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">

            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live.debounce.200ms="search" type="search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required="">
            </div>

        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">#</th>
                    <th scope="col" class="px-4 py-3">Nama Dokter</th>
                    <th scope="col" class="px-4 py-3">No Telepon</th>
                    <th scope="col" class="px-4 py-3">Alamat</th>
                    <th scope="col" class="px-4 py-3">Poli</th>
                    <th scope="col" class="px-4 py-3">Keterangan Poli</th>
                    <th scope="col" class="px-4 py-3">Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokter as $item)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->no_hp }}</td>
                        <td class="px-4 py-3">{{ $item->alamat }}</td>
                        <td class="px-4 py-3">{{ $item->poli->nama_poli }}</td>
                        <td class="px-4 py-3">{{ $item->poli->keterangan }}</td>

                        <td class="px-4 py-3 flex items-center">
                            
                            <button id="action-{{ $loop->index }}"
                                data-dropdown-toggle="action-menu-{{ $loop->index }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="action-menu-{{ $loop->index }}"
                                class="dark:bg-gray-700 dark:divide-gray-600 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="action-{{ $loop->index }}">
                                   
                                    <li>
                                        <a href="{{route('dokter.edit',['dokter'=>$item])}}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left ">
                                            <span><i class="fa-solid fa-pen mr-2"></i></span> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button data-modal-target="delete-modal-{{ $loop->index }}"
                                            data-modal-toggle="delete-modal-{{ $loop->index }}" type="button"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left ">
                                            <span><i class="fa-solid fa-trash mr-2"></i></span> Delete
                                        </button>
                                    </li>

                                </ul>

                            </div>
                        </div>
                        <div id="delete-modal-{{ $loop->index }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                        data-modal-hide="delete-modal-{{ $loop->index }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-20" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa Anda Yakin Ingin Menghapus
                                            Data ini?</h3>
                                        <form action={{ route('dokter.delete', ['dokter' => $item]) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            <button data-modal-hide="delete-modal-{{ $loop->index }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 dark:focus:ring-red-800  focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Ya, Saya Yakin
                                            </button>
                                            <button data-modal-hide="delete-modal-{{ $loop->index }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                                Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>


    </tr>
@empty
    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" colspan="7"
            class="px-4 py-3 font-medium text-xl text-gray-900 dark:text-white whitespace-nowrap text-center">Data
            Tidak
            Ditemukan</th>



    </tr>
    @endforelse

    </tbody>
    </table>
</div>
<div class="px-4 py-6">
    {{ $dokter->links() }}
</div>

</div>
