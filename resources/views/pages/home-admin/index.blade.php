@extends('layout')

@section('content')
    <section class="md:grid-cols-3 grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div class="w-full p-2 ">
            <div class="flex flex-row gap-6 items-center px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-user-doctor text-2xl dark:text-white"></i>
                    </div>
                </div>
               <div class="flex flex-col">
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 dark:text-gray-300">{{count($dokter)}}</h1>
                <div class="flex flex-row justify-between dark:text-gray-500">
                    <p>Total Dokter</p>
                    
                </div>
               </div>
            </div>
        </div>
        <div class="w-full p-2 ">
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
        </div>
      
       


    </section>
@endsection

@section('title')
    Dahboard | Poliklinik
@endsection
