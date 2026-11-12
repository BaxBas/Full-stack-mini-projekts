<!DOCTYPE html>
<html lang="lv" style="color-scheme: light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
    <style type="text/tailwindcss">
        @custom-variant dark (&:where(.dark, .dark *));

        html { color-scheme: light; }
        html.dark { color-scheme: dark; }
    </style>
    <title>Educational progress</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    @include('components.header')
    <div class="mx-auto space-y-4 max-w-5xl p-4">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 dark:bg-green-800 dark:text-white ring-1 ring-green-500 rounded-lg text-green-500 font-bold">
                {{ session('success') }}
            </div>
        @endif
        {{ $slot }}
    </div>
</body>
</html>