<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @yield('js')
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
                    @if(Auth::check())
                    <li class="header-list_item">
                        <a class="header-list_item-link" href="/">ホーム</a>
                    </li>
                    <li class="header-list_item">
                        <a class="header-list_item-link" href="/attendance">日付一覧</a>
                    </li>
                    <li class="header-list_item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="header-list_item-button">ログアウト</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="small-wrapper">
            <small class="atte-small">Atte,inc.</small>
        </div>
    </footer>
</body>
</html>