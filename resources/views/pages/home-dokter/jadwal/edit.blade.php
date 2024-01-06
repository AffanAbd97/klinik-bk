@extends('layout')

@section('content')
    <section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="font-semibold text-2xl dark:text-white">Edit Jadwal</h1>
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
                            <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Buat Jadwal</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>


    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto ">
            <form action="{{ route('jadwal.update',['jadwal'=>$jadwal]) }}" method="POST">
                @method('put')
                @csrf
                @php
                    $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                @endphp
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">

                        <label for="hari"
                            class="block mb-2 text-sm font-medium {{ $errors->has('hari') ? 'text-red-600' : 'text-gray-900' }} dark:text-white ">Hari</label>
                        <select id="hari" name="hari"
                            class="bg-gray-50 border {{ $errors->has('hari') ? 'border-red-600' : 'border-gray-300 dark:border-gray-600' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option @readonly(true) value="">Pilih Hari</option>
                            @foreach ($haris as $item)
                                <option @selected($item == old('hari')||$item == $jadwal->hari) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </select>
                        @error('hari')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="w-full">
                        <label for="jam_mulai"
                            class="block mb-2 text-sm font-medium  {{ $errors->has('jam_mulai') ? 'text-red-600' : 'text-gray-900' }}  dark:text-white">jam_mulai
                            Obat</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai')??$jadwal->jam_mulai }}"
                            class="bg-gray-50 border {{ $errors->has('jam_mulai') ? 'border-red-600' : 'border-gray-300' }}   text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jam_mulai Obat">
                        @error('jam_mulai')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="w-full mb-4">
                        <label for="jam_selesai"
                            class="block mb-2 text-sm font-medium  {{ $errors->has('jam_selesai') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">jam_selesai
                            Obat</label>
                        <input type="time" value="{{ old('jam_selesai')??$jadwal->jam_selesai}}" name="jam_selesai" id="jam_selesai"
                            class="bg-gray-50 border {{ $errors->has('jam_selesai') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jam_selesai Obat">
                        @error('jam_selesai')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                </div>
                <div class="w-full">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value='1' class="sr-only peer" @checked(old('status')=='1'||$jadwal->aktif=='1') name="status">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status Jadwal Periksa</span>
                    </label>
                </div>
                <button type="submit"
                    class="inline-flex items-center w-1/2 justify-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white !bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                    Update Jadwal
                </button>
            </form>
        </div>
    </section>
@endsection


@section('title')
    Tambah Obat | Poliklinik
@endsection
