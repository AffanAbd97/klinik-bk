<div class="bg-white  shadow-md sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">

            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                    <th scope="col" class="px-4 py-3">Nama Dokter</th>
                    <th scope="col" class="px-4 py-3">No Telepon</th>
                    <th scope="col" class="px-4 py-3">Alamat</th>
                    <th scope="col" class="px-4 py-3">Poli</th>
                    <th scope="col" class="px-4 py-3">Keterangan Poli</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokter as $item)
     
                    <tr class="border-b ">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->no_hp }}</td>
                        <td class="px-4 py-3">{{ $item->alamat }}</td>
                        <td class="px-4 py-3">{{ $item->poli->nama_poli }}</td>
                        <td class="px-4 py-3">{{ $item->poli->keterangan }}</td>

                        
                        <td class="px-4 py-3 flex items-center justify-end">
                            <button id="action-{{$loop->index}}" data-dropdown-toggle="action-menu-{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none " type="button"> 
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                              </button>
                              
                              <!-- Dropdown menu -->
                              <div id="action-menu-{{$loop->index}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                  <ul class="py-2 text-sm text-gray-700 " aria-labelledby="action-{{$loop->index}}">
                                    <li>
                                      <a href="{{route('dokter.edit',['dokter'=>$item])}}" class="block px-4 py-2 hover:bg-gray-100 "><span><i class="fa-solid fa-pen-to-square mr-2"></i></span>Edit</a>
                                    </li>
                                    <li>
                                        <form action={{route('dokter.delete',['dokter'=>$item])}} method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="block px-4 py-2 hover:bg-gray-100 w-full text-left ">
                                            <span><i class="fa-solid fa-trash mr-2"></i></span>    Delete
                                            </button>
                                          </form>
                                      
                                    </li>
                                 
                                  </ul>
                                
                              </div>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr class="border-b ">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap text-center" colspan="4">Data Tidak
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
