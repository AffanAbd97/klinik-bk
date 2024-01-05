<div class="bg-white dark:bg-gray-800 shadow-md dark:shadow-none  sm:rounded-lg overflow-hidden">
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                    placeholder="Search" required="">
            </div>

        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">#</th>
                    <th scope="col" class="px-4 py-3">Nama Pasien</th>
                    <th scope="col" class="px-4 py-3">Keluhan</th>
                    <th scope="col" class="px-4 py-3">Jadwal</th>
                    <th scope="col" class="px-4 py-3">No Antrian</th>

                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pasien as $item)
                    <tr class="border-b dark:bg-gray-700 dark:text-gray-400">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->pasien->nama }}</td>
                        <td class="px-4 py-3">{{ $item->keluhan }}</td>

                        <td class="px-4 py-3"> {{ $item->jadwal->hari }}, {{ substr($item->jadwal->jam_mulai, 0, 5) }} -
                            {{ substr($item->jadwal->jam_selesai, 0, 5) }}</td>
                        <td class="px-4 py-3">{{ $item->no_antrian }}</td>
                        <td class="px-4 py-3 flex items-center">
                            @if ($item->periksa)
                                <a href="{{ route('dokter.periksa.edit', ['periksa' => $item->periksa]) }}"
                                    class=" inline-flex items-center p-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none ">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i><span> Edit</span>

                                </a>
                            @else
                                <a href="{{ route('dokter.periksa.create', ['detail' => $item]) }}"
                                    class=" inline-flex items-center p-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none ">
                                    <i class="fa-solid fa-stethoscope mr-2"></i><span> Periksa</span>

                                </a>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr class="border-b ">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap text-center"
                            colspan="5">Data
                            Tidak
                            Ditemukan</th>



                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="px-4 py-6">
        {{ $pasien->links() }}
    </div>

</div>