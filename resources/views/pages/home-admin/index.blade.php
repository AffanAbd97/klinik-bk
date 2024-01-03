@extends('layout')

@section('content')
    <section class="md:grid-cols-3 grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div class="w-full p-2 ">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-user-doctor text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 ">{{count($dokter)}}</h1>
                <div class="flex flex-row justify-between ">
                    <p>Total Dokter</p>
                    
                </div>
            </div>
        </div>
        <div class="w-full p-2 ">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-hospital-user text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 ">{{count($pasien)}}</h1>
                <div class="flex flex-row justify-between ">
                    <p>Total Pasien</p>
                    
                </div>
            </div>
        </div>
        <div class="w-full p-2 ">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white rounded-xl shadow-lg duration-300 group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <i class="fa-solid fa-pills text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 ">{{count($obat)}}</h1>
                <div class="flex flex-row justify-between ">
                    <p>Total Obat</p>
                    
                </div>
            </div>
        </div>
       


    </section>
@endsection

@section('title')
    Dahboard | Poliklinik
@endsection
