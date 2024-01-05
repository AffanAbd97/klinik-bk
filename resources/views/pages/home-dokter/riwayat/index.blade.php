@extends('layout')

@section('content')
    <section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="font-semibold text-2xl dark:text-white">Daftar Riwayat Pasien</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Daftar Riwayat
                                Pasien</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>


    </section>

    <div class="bg-white  shadow-md sm:rounded-lg overflow-hidden dark:bg-gray-800  dark:shadow-none ">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500  dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">#</th>
                        <th scope="col" class="px-4 py-3">Nama Pasien</th>
                        <th scope="col" class="px-4 py-3">Alamat</th>
                        <th scope="col" class="px-4 py-3">No Ktp</th>
                        <th scope="col" class="px-4 py-3">No Telepon</th>
                        <th scope="col" class="px-4 py-3">No RM</th>

                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $item)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</th>
                            <td class="px-4 py-3">{{ $item->daftarPoli->pasien->nama }}</td>
                            <td class="px-4 py-3">{{ $item->daftarPoli->pasien->alamat }}</td>
                            <td class="px-4 py-3">{{ $item->daftarPoli->pasien->no_ktp }}</td>
                            <td class="px-4 py-3">{{ $item->daftarPoli->pasien->no_hp }}</td>
                            <td class="px-4 py-3">{{ $item->daftarPoli->pasien->no_rm }}</td>



                            <td class="px-4 py-3 flex items-center">


                                <!-- Modal toggle -->
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                                    class=" inline-flex items-center p-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none ">
                                    <i class="fa-solid fa-stethoscope mr-2"></i><span> Periksa</span>
                                </button>

                                <!-- Main modal -->
                                <div id="default-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[90] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-7xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Detail
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="default-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="relative overflow-x-auto">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                  #
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">Tanggal Periksa</th>
                                                                <th scope="col" class="px-6 py-3">Nama Pasien</th>
                                                                <th scope="col" class="px-6 py-3">Nama Dokter</th>
                                                                <th scope="col" class="px-6 py-3">Keluhan</th>
                                                                <th scope="col" class="px-6 py-3">Catatan</th>
                                                                <th scope="col" class="px-6 py-3">Obat</th>
                                                                <th scope="col" class="px-6 py-3">Biaya Periksa</th>
                                                              
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    1
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                   {{$item->daftarPoli->periksa->tgl_periksa}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                   {{$item->daftarPoli->pasien->nama}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                {{$item->daftarPoli->jadwal->dokter->nama}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                {{$item->daftarPoli->keluhan}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                {{$item->daftarPoli->periksa->catatan}}
                                                                </td>
                                                                
                                                                <td class="px-6 py-4">
                                                                    <ul>
                                                                        @foreach ($item->daftarPoli->periksa->detail as $data)
                                                                        <li>{{$data->obat->nama_obat}}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{$item->daftarPoli->periksa->biaya_periksa}}
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                           
                                        </div>
                                    </div>
                                </div>

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
@endsection


@section('title')
    Daftar Pasien | Poliklinik
@endsection
