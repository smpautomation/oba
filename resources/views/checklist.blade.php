<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OUT OF THE BOX AUDIT</title>

        @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <livewire:navbar>
        @if (isset($id))
            <livewire:checklistForm :model_id="$id">
        @else
            <livewire:sectionForm lazy>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </body>
</html>
