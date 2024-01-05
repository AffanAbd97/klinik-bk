@extends('layout')

@section('content')
    <section class="md:grid-cols-3 grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div class="w-full  ">
            <div class="flex flex-row gap-6 items-center px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-user-doctor text-2xl dark:text-white"></i>
                    </div>
                </div>
               <div class="flex flex-col">
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 dark:text-gray-300">{{count($pasien)}}</h1>
                <div class="flex flex-row justify-between dark:text-gray-500">
                    <p>Total Dokter</p>
                    
                </div>
               </div>
            </div>
        </div>
        {{-- <div class="w-full p-2 ">
            <div class="flex flex-row gap-6 items-center px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-hospital-user text-2xl dark:text-white"></i>
                    </div>
                </div>
               <div class="flex flex-col">
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 dark:text-gray-300">{{count($pasien)}}</h1>
                <div class="flex flex-row justify-between dark:text-gray-500">
                    <p>Total Pasien</p>
                    
                </div>
               </div>
            </div>
        </div>
        <div class="w-full p-2 ">
            <div class="flex flex-row gap-6 items-center px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-pills text-2xl dark:text-white"></i>
                    </div>
                </div>
               <div class="flex flex-col">
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 dark:text-gray-300">{{count($obat)}}</h1>
                <div class="flex flex-row justify-between dark:text-gray-500">
                    <p>Total Obat</p>
                    
                </div>
               </div>
            </div>
        </div> --}}
      

    </section>
    <section class="md:grid-cols-2 grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div class="bg-white  shadow overflow-hidden sm:rounded-lg self-start  dark:bg-gray-800 dark:border-gray-700">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-300">
                    Informasi Poli
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                    Details and informations about user.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Nama Poli
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                            {{ $poli->nama_poli }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800 dark:border-gray-700">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 ">
                            Keterangan
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                            {{ $poli->keterangan }}
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
        <div class="bg-white  shadow overflow-hidden sm:rounded-lg self-start  dark:bg-gray-800 dark:border-gray-700">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-300">
                        Jadwal Periksa
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                        Jadwal Periksa Dokter {{ session('authenticate')->nama }}
                    </p>
                </div>
             
            </div>
            <div class="border-t border-gray-200">

               
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hari
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jam Mulai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jam Selesai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($jadwals as $item)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->hari }}
                        </td>
                        <td class="px-6 py-4">
                           {{substr($item->jam_mulai, 0, 5)}}
                        </td>
                        <td class="px-6 py-4">
                            {{ substr($item->jam_selesai, 0, 5) }}
                        </td>
                    </tr>
                      @empty
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center" colspan="4">
                          Data Kosong
                        </th>
                       
                    </tr>
                      @endforelse
                       
                    </tbody>
                </table>
                  
            </div>
        </div>

    </section>
@endsection




@section('title')
    Data Dokter | Poliklinik
@endsection
