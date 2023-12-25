<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('title')
    @stack('style')
<title>@yield('title')</title>
</head>

<body>

    <div class="antialiased bg-gray-50">
        {{-- Navbar --}}
        <x-navbar />
        <!-- Sidebar -->

        <x-sidebar />

        <main class="pt-20 px-4 bg-slate-50 h-screen ml-0 md:ml-64 ">
            <x-notify::notify />
            @yield('content')
        </main>
    </div>


    @stack('modal')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @stack('script')


    @notifyJs
</body>

</html>
