<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <title>{{ $title ?? config('nexus.title') }}</title>
    <meta name="description" content="{{ $description ?? config('nexus.description') }}">

    @if(isset($canonical))
        <link rel="canonical" href="{{ $canonical }}">
    @endif

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-nexus-bg text-nexus-white antialiased font-sans">
    <x-navigation />

    <main>
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
