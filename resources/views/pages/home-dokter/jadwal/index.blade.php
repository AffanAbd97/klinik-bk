@extends('layout')

@section('content')
    <section class="md:flex grid grid-cols-1 justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="font-semibold text-2xl dark:text-white">Daftar Jadwal</h1>
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
                            <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Daftar
                                Jadwal</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('jadwal.create') }}"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 text-center">Tambah
            Data</a>
    </section>
    <div class="bg-white  shadow-md dark:shadow-none  dark:bg-gray-900  sm:rounded-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dokter
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
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataJadwal as $item)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</th>
                            <td class="px-6 py-4">
                                {{ $item->dokter->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->hari }}
                            </td>
                            <td class="px-6 py-4">
                                {{ substr($item->jam_mulai, 0, 5) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ substr($item->jam_selesai, 0, 5) }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->aktif == '0')
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak
                                        Aktif</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                @endif

                            </td>



                            <td class="px-4 py-3 flex items-center">
                                <button id="action-{{ $loop->index }}"
                                    data-dropdown-toggle="action-menu-{{ $loop->index }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="action-menu-{{ $loop->index }}"
                                    class="dark:bg-gray-700 dark:divide-gray-600 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="action-{{ $loop->index }}">
                                        <li>
                                            <a href="{{ route('jadwal.edit', ['jadwal' => $item]) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span><i
                                                        class="fa-solid fa-pen-to-square mr-2"></i></span>Edit</a>
                                        </li>
                                        <li>
                                            <button data-modal-target="delete-modal-{{ $loop->index }}"
                                                data-modal-toggle="delete-modal-{{ $loop->index }}" type="button"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left ">
                                                <span><i class="fa-solid fa-trash mr-2"></i></span> Delete
                                            </button>
                                        </li>

                                    </ul>

                                </div>
        </div>
        <div id="delete-modal-{{ $loop->index }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="delete-modal-{{ $loop->index }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-20" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa Anda Yakin Ingin
                            Menghapus
                            Data ini?</h3>
                        <form action={{ route('jadwal.delete', ['jadwal' => $item]) }} method="POST">
                            @csrf
                            @method('delete')
                            <button data-modal-hide="delete-modal-{{ $loop->index }}" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 dark:focus:ring-red-800  focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Ya, Saya Yakin
                            </button>
                            <button data-modal-hide="delete-modal-{{ $loop->index }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>
    @empty
        <tr class="border-b ">
            <th scope="row"
                class="px-4 py-3 font-medium text-xl text-gray-900 dark:text-white whitespace-nowrap text-center"
                colspan="5">
                Data
                Tidak
                Ditemukan</th>



        </tr>
        @endforelse

        </tbody>
        </table>
    </div>
    <div class="px-4 py-6">
        {{ $dataJadwal->links() }}
    </div>

    </div>
@endsection


@section('title')
    Daftar Jadwal | Poliklinik
@endsection
