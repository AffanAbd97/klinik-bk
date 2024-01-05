@extends('layout')

@section('content')
    <section class="md:grid-cols-4 grid grid-cols-1 justify-between items-center mb-8 gap-4">

        <div class=" bg-white w-full rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 border-b dark:border-gray-700">
                <h2 class="text-2xl dark:text-white">
                    Informasi Periksa
                </h2>
                <p class="text-sm text-gray-500">
                    Detail Informasi Pemeriksaan Anda
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Nama
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->pasien->nama }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Nomor Rekam Medis
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->pasien->no_rm }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Keluhan
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->keluhan }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Poli
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->jadwal->dokter->poli->nama_poli }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Dokter
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->jadwal->dokter->nama }}
                    </p>
                </div>

                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Jadwal
                    </p>
                    <p class="dark:text-white">
                        {{ $poli->jadwal->hari }}, {{ substr($poli->jadwal->jam_mulai, 0, 5) }} -
                        {{ substr($poli->jadwal->jam_selesai, 0, 5) }}
                    </p>
                </div>

                <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300">
                        Status
                    </p>
                    <div>
                        @if ($detail != null)
                            <p
                                class="text-center bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                Selesai Periksa</p>
                        @else
                            <p
                                class="text-center bg-red-100 text-red-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                Belum Periksa</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>




        <div class="col-span-3 bg-white w-full rounded-lg shadow-xl self-start dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 border-b  dark:border-gray-700">
                <h2 class="text-2xl dark:text-white">
                    Catatan Dokter
                </h2>
                <p class="text-sm text-gray-500">
                    Infomasi Yang diberikan oleh Dokter
                </p>
            </div>
            @if ($detail != null)
                <div>
                    <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b  dark:border-gray-700">
                        <p class="text-gray-600 dark:text-gray-400">
                            Tanggal Periksa
                        </p>
                        <p class="dark:text-white">
                            {{ $detail->tgl_periksa }}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b  dark:border-gray-700">
                        <p class="text-gray-600 dark:text-gray-400">
                            Catatan
                        </p>
                        <p class="dark:text-white">
                            {{ $detail->catatan }}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b  dark:border-gray-700">
                        <p class="text-gray-600 dark:text-gray-400">
                            Obat
                        </p>
                        <div>
        
                            <ul  class="dark:text-white">
                                @foreach ($detail->detail as $item)
                                    <li>
                                        {{ $item->obat->nama_obat }} | {{ $item->obat->kemasan }} |
                                        {{ format_rupiah($item->obat->harga) }}
                                    </li>
                                @endforeach
                            </ul>
                        

                        </div>
                    </div>

                    <div class="md:grid md:grid-cols-2 md:space-y-0 space-y-1 p-4 border-b  dark:border-gray-700">
                        <p class="text-gray-600 dark:text-gray-400">
                            Total Biaya
                        </p>
                        <p class="dark:text-white">
                            {{ format_rupiah($detail->biaya_periksa) }}
                        </p>
                    </div>

                </div>
            @else
                <div class="flex justify-center items-center text-center p-16 dark:text-white">
                    <h1 class="font-semibold text-2xl"> Belum Melakukan Pemeriksaan</h1>
                </div>
            @endif
        </div>





    </section>
@endsection


@section('title')
    Detail Periksa| Poliklinik
@endsection
