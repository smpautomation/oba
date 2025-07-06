<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OUT OF THE BOX AUDIT - Settings</title>

        @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom-settings.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <livewire:navbar>
        <livewire:settings>
    </body>
</html>
