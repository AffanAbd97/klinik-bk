@extends('layout')

@section('content')
    <section class="md:grid-cols-4 grid grid-cols-1 justify-between items-center mb-8 gap-4">

        <div class=" bg-white w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Informasi Periksa
                </h2>
                <p class="text-sm text-gray-500">
                    Detail Informasi Pemeriksaan Anda
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Nama
                    </p>
                    <p>
                        {{ $poli->pasien->nama }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Nomor Rekam Medis
                    </p>
                    <p>
                        {{ $poli->pasien->no_rm }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Keluhan
                    </p>
                    <p>
                        {{ $poli->keluhan }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Poli
                    </p>
                    <p>
                        {{ $poli->jadwal->dokter->poli->nama_poli }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Dokter
                    </p>
                    <p>
                        {{ $poli->jadwal->dokter->nama }}
                    </p>
                </div>
              
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Jadwal
                    </p>
                    <p>
                        {{ $poli->jadwal->hari }}, {{ substr($poli->jadwal->jam_mulai, 0, 5) }} -
                        {{ substr($poli->jadwal->jam_selesai, 0, 5) }}
                    </p>
                </div>
               
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Status
                    </p>
                    <div>
                        @if ($detail != null)
                        <p class="text-center bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Selesai Periksa</p>
                        @else
                        <p class="text-center bg-red-100 text-red-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Belum Periksa</p>
                        @endif
                
                       
                    </div>
                </div>
            </div>
        </div>




        <div class="col-span-3 bg-white w-full rounded-lg shadow-xl self-start">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Catatan Dokter
                </h2>
                <p class="text-sm text-gray-500">
                    Infomasi Yang diberikan oleh Dokter
                </p>
            </div>
            @if ($detail != null)
                <div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Full name
                        </p>
                        <p>
                            Jane Doe
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Application for
                        </p>
                        <p>
                            Product Manager
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Email Address
                        </p>
                        <p>
                            Janedoe@gmail.com
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Salary
                        </p>
                        <p>
                            $ 12000
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            About
                        </p>
                        <p>
                            Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat.
                            Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia
                            proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <p class="text-gray-600">
                            Attachments
                        </p>
                        <div class="space-y-2">
                            <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                <div class="space-x-2 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                    </svg>
                                    <span>
                                        resume_for_manager.pdf
                                    </span>
                                </div>
                                <a href="#" class="text-purple-700 hover:underline">
                                    Download
                                </a>
                            </div>

                            <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                <div class="space-x-2 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                    </svg>
                                    <span>
                                        resume_for_manager.pdf
                                    </span>
                                </div>
                                <a href="#" class="text-purple-700 hover:underline">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex justify-center items-center text-center p-16">
                    <h1 class="font-semibold text-2xl"> Belum Melakukan Pemeriksaan</h1>
                </div>
            @endif
        </div>





    </section>
@endsection


@section('title')
    Detail Periksa| Poliklinik
@endsection
