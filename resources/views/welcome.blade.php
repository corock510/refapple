<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Refapple</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

	@vite('resources/css/app.css')
</head>

<body>
    <div id="app">
        <my-component></my-component>
    </div>

    <p class="title text-2xl font-bold text-blue-500">Blade</p>

    <br>

    <button>Button1</button>
    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Button2</button>
    <button class="btn-custom">Button3</button>

    <script src="{{ mix('resources/js/app.js') }}" type="module"></script>
</body>

</html>
