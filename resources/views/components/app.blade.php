<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite()

    @livewireStyles
    @stack('styles')
</head>

<body x-data
    class="bg-gray-900 text-white overflow-hidden {{ config('app.env') === 'local' ? 'debug-screens' : '' }}">
    <x-toast />
    <div class="h-screen">
        {{ $slot }}
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>