<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Refapple</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <h1>Refapple</h1>
    <form id="searchForm" action="" method="">
        {{-- Mac、iPhone、iPadを選択するドロップダウン --}}
        <select name="device">
            <option value="mac">Mac</option>
            <option value="iphone">iPhone</option>
            <option value="ipad">iPad</option>
        </select>
        <br>

        {{-- MacBook Air、MacoBooc Pro、iMacを選択するチェックボック --}}
        <input type="checkbox" name="model" value="macbook-air">MacBook Air
        <input type="checkbox" name="model" value="macbook-pro">MacBook Pro
        <input type="checkbox" name="model" value="imac">iMac
        <br>

        {{-- サイズを選択するチェックボックス --}}
        <input type="checkbox" name="size" value="14インチ">14inch
        <input type="checkbox" name="size" value="16インチ">16inch
        <br>

        {{-- メモリを選択するチェックボックス --}}
        <input type="checkbox" name="memory" value="8gb">8GB
        <input type="checkbox" name="memory" value="16gb">16GB
        <input type="checkbox" name="memory" value="32gb">32GB
        <input type="checkbox" name="memory" value="64gb">64GB
        <input type="checkbox" name="memory" value="128gb">128GB
        <br>

        {{-- ストレージを選択するチェックボックス --}}

        {{-- カラーを選択するチェックボックス --}}
        {{-- 検索ボタン --}}
        <button type="submit" id="searchButton">検索</button>
    </form>


    <!-- 検索結果を表示するエリア -->
    <div id="searchResults">
        @foreach ($items as $item)
            <img src="{{ $item['imageUrl'] }}" alt="Image">
            <p>{{ $item['text'] }}</p>
        @endforeach
    </div>
</body>

</html>
