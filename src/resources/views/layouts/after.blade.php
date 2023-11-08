<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/after.css') }}">
    @yield('css')
    <title>Atte</title>
</head>
<body>
    <header class="after-header">
        <div class="header-icon">
            Atte
        </div>
        <div class="header-list_wrapper">
            <nav class="header-list">
                <ul class="header-list_item-wrapper">
                    <li class="header-list_item">
                        <a class="header-list_item-link" href="">ホーム</a>
                    </li>
                    <li class="header-list_item">
                        <a class="header-list_item-link" href="">日付一覧</a>
                    </li>
                    <li class="header-list_item">
                        <a class="header-list_item-link" href="">ログアウト</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>