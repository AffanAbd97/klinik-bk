<div class="bg-white  shadow-md sm:rounded-lg overflow-hidden">
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                    placeholder="Search" required="">
            </div>

        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                    <tr class="border-b ">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
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
{{-- 
@push('modal')
    
@foreach ($obat as $item)

<div id="delete-modal-{{$loop->index}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="delete-modal-{{$loop->index}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to delete this product?</h3>
              <form action={{route('obat.delete',['id'=>$item->id])}} method="POST">
                @csrf
                @method('delete')
                <button data-modal-hide="delete-modal-{{$loop->index}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                </button>
              </form>
                <button data-modal-hide="delete-modal-{{$loop->index}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endpush --}}
