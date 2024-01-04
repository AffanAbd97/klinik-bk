@extends('layout')

@section('content')
   
<section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
    <div>
        <h1 class="font-semibold text-2xl dark:text-white">Buat Obat</h1>
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
                        <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Buat Obat</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

 
</section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto ">
            <form action="{{route('obat.store')}}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_obat" class="block mb-2 text-sm font-medium  {{$errors->has('nama_obat') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" value="{{old('nama_obat')}}"
                        class="bg-gray-50 border {{$errors->has('nama_obat') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Obat" >
                    @error('nama_obat')
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{$message}}</p> 
                    @enderror
                    
                    </div>
                    <div class="w-full">
                        <label for="kemasan" class="block mb-2 text-sm font-medium  {{$errors->has('kemasan') ? 'text-red-600' : 'text-gray-900' }}  dark:text-white">Kemasan Obat</label>
                        <input type="text" name="kemasan" id="kemasan" value="{{old('kemasan')}}" class="bg-gray-50 border {{$errors->has('kemasan') ? 'border-red-600' : 'border-gray-300' }}   text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kemasan Obat" >
                        @error('kemasan')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{$message}}</p> 
                        @enderror
                        
                    </div>
                    <div class="w-full">
                        <label for="harga" class="block mb-2 text-sm font-medium  {{$errors->has('harga') ? 'text-red-600' : 'text-gray-900' }} dark:text-white">Harga Obat</label>
                        <input type="number" value="{{old('harga')}}" name="harga" id="harga" class="bg-gray-50 border {{$errors->has('harga') ? 'border-red-600' : 'border-gray-300' }}  text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Harga Obat" >
                        @error('harga')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600">{{$message}}</p> 
                        @enderror
                        
                    </div>
                   
                  
                </div>
                <button type="submit" class="inline-flex items-center w-1/2 justify-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white !bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                 Tambah Obat
                </button>
            </form>
        </div>
      </section>    
   
@endsection


@section('title')
    Tambah Obat | Poliklinik
@endsection