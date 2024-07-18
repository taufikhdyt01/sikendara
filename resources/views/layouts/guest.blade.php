<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.122.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <title>Sikendara</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 dark:bg-gray-800">
    <main>
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    @stack('scripts')
</body>

</html>
