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
    <div id="searchResults"></div>

    {{-- jQuery読み込み --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- スクレイピング用のJavaScript --}}
    <script>
        $(document).ready(function() {
            // フォームが送信されたときにAjaxリクエストを送信
            $("#searchForm").submit(function(event) {
                event.preventDefault(); // フォームのデフォルトの送信を無効化

                // フォームデータを取得
                var formData = $("#searchForm").serialize();

                // Ajaxリクエストを送信
                $.ajax({
                    type: "GET", // リクエストの種類を選択 (GETまたはPOST)
                    url: "get", // スクレイピング対象のURL
                    data: formData, // フォームデータを送信
                    success: function(data) {
                        // スクレイピング結果を表示
                        var $resultElement = $(data).find('.rf-refurb-category-gridpage-results');
                        $("#searchResults").html($resultElement);

                        // 要素の読み込みを待つ
                        waitForElementToLoad();
                    },
                    error: function() {
                        // エラーハンドリング
                        console.log("エラーが発生しました");
                    }
                });
            });

            // 要素の読み込みを待つ関数
            function waitForElementToLoad() {
                var targetElement = $("#searchResults .rf-refurb-category-gridpage-results");
                if (targetElement.length > 0) {
                    // 要素が読み込まれたら、ここで要素を処理するコードを実行

                    // 例: 要素のテキストを取得
                    var elementText = targetElement.text();
                    console.log('要素のテキスト:', elementText);
                } else {
                    // 要素がまだ読み込まれていない場合、一定の間隔で再試行
                    setTimeout(waitForElementToLoad, 1000); // 1秒ごとに再試行
                }
            }
        });
    </script>
</body>

</html>
