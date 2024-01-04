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
                    <th scope="col" class="px-4 py-3">Nama Pasien</th>
                    <th scope="col" class="px-4 py-3">No Telepon</th>
                    <th scope="col" class="px-4 py-3">Alamat</th>
                    <th scope="col" class="px-4 py-3">No KTP</th>
                    <th scope="col" class="px-4 py-3">No Rekam Medis</th>
                  
                </tr>
            </thead>
            <tbody>
                @forelse ($pasien as $item)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->no_hp }}</td>
                        <td class="px-4 py-3">{{ $item->alamat }}</td>
                        <td class="px-4 py-3">{{ $item->no_ktp }}</td>
                        <td class="px-4 py-3">{{ $item->no_rm }}</td>

                       


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
    {{ $pasien->links() }}
</div>

</div>
