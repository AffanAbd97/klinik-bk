@extends('layout')

@section('content')
    <section class="md:grid-cols-4 grid grid-cols-1 justify-between items-center mb-8 gap-4">

        @livewire('pasien-form')
        <div class="bg-white  shadow-md sm:rounded-lg overflow-hidden col-span-3 self-start">

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">Poli</th>
                            <th scope="col" class="px-4 py-3">Dokter</th>
                            <th scope="col" class="px-4 py-3">Hari</th>
                            <th scope="col" class="px-4 py-3">Mulai</th>
                            <th scope="col" class="px-4 py-3">Selesai</th>
                            <th scope="col" class="px-4 py-3">Antrian</th>


                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftar as $item)
                            <tr class="border-b ">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $loop->iteration }}</th>
                                <td class="px-4 py-3">{{ $item->jadwal->dokter->poli->nama_poli }}</td>
                                <td class="px-4 py-3">{{ $item->jadwal->dokter->nama }}</td>
                                <td class="px-4 py-3">{{ $item->jadwal->hari }}</td>
                                <td class="px-4 py-3">{{ $item->jadwal->jam_mulai }}</td>
                                <td class="px-4 py-3">{{ $item->jadwal->jam_selesai }}</td>
                                <td class="px-4 py-3">{{ $item->no_antrian }}</td>

                                <td class="px-4 py-3 flex items-center">
                                  
                                    <a href="{{route('pasien.periksa',['daftarPoli'=>$item])}}"
                                        class="border border-gray-900 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none ">
                                        <i class="fa-solid fa-eye mr-2"></i><span> Detail</span>
                                    </a>
            </div>
            </td>

            </tr>
        @empty
            <tr class="border-b ">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap text-center" colspan="4">
                    Data Tidak
                    Ditemukan</th>



            </tr>
            @endforelse

            </tbody>
            </table>
        </div>
        <div class="px-4 py-6">
            {{ $daftar->links() }}
        </div>

        </div>
    </section>
@endsection


@section('title')
    Data Dokter | Poliklinik
@endsection
