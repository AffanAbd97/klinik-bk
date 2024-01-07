@extends('layout')

@section('content')
<section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
    <div>
        <h1 class="font-semibold text-2xl dark:text-white">Periksa Pasien</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{route('dashboard')}}"
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
                        <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Periksa Pasien</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    
</section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto">

            <form action="{{ route('dokter.periksa.save', ['detail' => $detail]) }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <input type="text" name="idPeriksa" class="hidden" value="{{ $detail->id }}">
                    <div class="w-full">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Pasien</label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $detail->pasien->nama }}" disabled>
                    </div>
                    <div class="w-full">
                        <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan
                            Pasien</label>
                        <textarea name="keluhan" id="" cols="20" rows="5" disabled
                            class="resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $detail->keluhan }}</textarea>

                    </div>
                    <div class="w-full">
                        <label for="tglPeriksa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Periksa</label>
                        <input type="datetime-local" name="tglPeriksa" id="tglPeriksa" value="{{ old('tglPeriksa') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999">
                        @error('tglPeriksa')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="catatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                        <textarea name="catatan" id="" cols="20" rows="5" placeholder="catatan dokter"
                            class="resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('catatan')}}</textarea>
                        @error('catatan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror

                    </div>
                    <div>
                        <label for="obat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Obat</label>
                        <select id="obat" multiple name="obat[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            @foreach ($obat as $item)
                                <option value="{{ $item->id }}" @selected(in_array($item->id, old('obat', [])))>{{ $item->nama_obat }} |
                                    {{ $item->kemasan }} |
                                    {{ format_rupiah($item->harga) }}</option>
                            @endforeach

                        </select>
                        @error('obat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="biaya" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                            Periksa</label>
                        <input type="number" name="biaya" id="biaya" value="100000" readonly disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="10000">
                        @error('biaya')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add product
                </button>
            </form>
        </div>
    </section>
@endsection


@section('title')
    Periksa Pasien | Poliklinik
@endsection
