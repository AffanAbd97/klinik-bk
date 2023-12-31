@extends('layout')

@section('content')
    <section class="md:grid-cols-4 grid grid-cols-1 justify-between items-center mb-8 gap-4">
    
        @livewire('pasien-form')
    </section>

@endsection


@section('title')
    Data Dokter | Poliklinik
@endsection
