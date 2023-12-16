@extends('layout')

@section('content')
    <section class="flex justify-between items-center mb-8">
        <div >
          <h1 class="font-semibold text-2xl">Data Obat</h1>
          <nav class="flex" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-2">
                  <li class="inline-flex items-center">
                      <a href="#"
                          class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                          <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                              viewBox="0 0 20 20">
                              <path
                                  d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                          </svg>
                          Home
                      </a>
                  </li>
                  <li>
                      <div class="flex items-center">
                          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4" />
                          </svg>
                          <a href="#"
                              class="ms-1 text-lg font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                      </div>
                  </li>
                  <li aria-current="page">
                      <div class="flex items-center">
                          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4" />
                          </svg>
                          <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                      </div>
                  </li>
              </ol>
          </nav>
        </div>
  
        <a href="#" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-10 py-5 focus:outline-none">Tambah Data</a>
    </section>

    <!-- General Report -->
    <div class="grid grid-cols-1">


        <!-- card -->


        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="card-header text-vlue">Recent Sales</div>

            <table class="table-auto w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-r"></th>
                        <th class="px-4 py-2 border-r">product</th>
                        <th class="px-4 py-2 border-r">price</th>
                        <th class="px-4 py-2">date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">

                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-green-500"><i class="fad fa-circle"></i>
                        </td>
                        <td class="border border-l-0 px-4 py-2">Lightning to USB-C Adapter Lightning.</td>
                        <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-yellow-500"><i class="fad fa-circle"></i>
                        </td>
                        <td class="border border-l-0 px-4 py-2">Apple iPhone 8.</td>
                        <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-green-500"><i class="fad fa-circle"></i>
                        </td>
                        <td class="border border-l-0 px-4 py-2">Apple MacBook Pro.</td>
                        <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-red-500"><i class="fad fa-circle"></i></td>
                        <td class="border border-l-0 px-4 py-2">Samsung Galaxy S9.</td>
                        <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-yellow-500"><i class="fad fa-circle"></i>
                        </td>
                        <td class="border border-l-0 px-4 py-2">Samsung Galaxy S8 256GB.</td>
                        <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="border border-l-0 border-b-0 px-4 py-2 text-center text-green-500"><i
                                class="fad fa-circle"></i></td>
                        <td class="border border-l-0 border-b-0 px-4 py-2">apple watch.</td>
                        <td class="border border-l-0 border-b-0 px-4 py-2">$<span class="num-2"></span></td>
                        <td class="border border-l-0 border-b-0 border-r-0 px-4 py-2"><span class="num-2"></span> minutes
                            ago</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- End Recent Sales -->


    </div>
    <!-- end quick Info -->
@endsection
