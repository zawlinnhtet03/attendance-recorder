<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Attendance Recorder</title>
        <link rel="shortcut icon"  href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <a href="/">
                    <img src="{{ asset('images/logo3.svg') }}" class="h-16 w-auto">
                </a>
                <div class="text-container"  style="text-align: center;">
                    <h1  style="font-size: 13px; font-weight: bold; color: white;"><i>2024澳門核醫及分子影像學會</i></h1>
                    <h1  style="font-size: 13px; font-weight: bold; color: white;"><em>年度會員大會暨學術講座</em></h1>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
