@extends('layout')

@section('content')
<section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
    <div>
        <h1 class="font-semibold text-2xl dark:text-white">Tambah Data Pasien</h1>
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
                        <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Tambah Dokter</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

   
</section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto ">
            <form action="{{ route('pasien.update',['pasien'=>$pasien]) }}" method="POST">
                @csrf
                @method('put')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="no_rm"
                            class="block mb-2 text-sm font-medium  text-gray-900 dark:text-white">No
                            Rekam Medis</label>
                        <input type="text" name="no_rm" id="no_rm" value="{{$pasien->no_rm }}" disabled readonly
                            class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nomor Telepon">
                        

                    </div>
                    <div class="sm:col-span-2">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium  {{ $errors->has('nama') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">Nama
                            Dokter</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') ??$pasien->nama}}"
                            class="bg-gray-50 border {{ $errors->has('nama') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Dokter">
                        @error('nama')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="sm:col-span-2">
                        <label for="no_hp"
                            class="block mb-2 text-sm font-medium  {{ $errors->has('no_hp') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">No
                            Telepon</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') ??$pasien->no_hp }}"
                            class="bg-gray-50 border {{ $errors->has('no_hp') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nomor Telepon">
                        @error('no_hp')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="sm:col-span-2">
                        <label for="no_ktp"
                            class="block mb-2 text-sm font-medium  {{ $errors->has('no_ktp') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">No
                            KTP</label>
                        <input type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp') ??$pasien->no_ktp }}"
                            class="bg-gray-50 border {{ $errors->has('no_ktp') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nomor Telepon">
                        @error('no_ktp')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                        <div class="sm:col-span-2">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium  {{ $errors->has('alamat') ? 'text-red-600' : 'text-gray-900' }}  dark:text-white">Alamat Rumah</label>
                            <textarea id="alamat" rows="4" name="alamat"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border {{ $errors->has('alamat') ? 'border-red-600' : 'border-gray-300' }} focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Informasi Detail Poli">{{ old('alamat') ??$pasien->alamat  }}</textarea>
                            @error('alamat')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>
                    <button type="submit"
                        class="inline-flex items-center w-1/2 justify-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white !bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                        Simpan Data
                    </button>
                </form>
            </div>
        </section>
    @endsection


@section('title')
    Ubah Dokter | Poliklinik
@endsection
