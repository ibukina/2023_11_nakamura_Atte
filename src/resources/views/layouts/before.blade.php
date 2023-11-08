<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/before.css') }}">
    @yield('css')
    <title>Atte</title>
</head>
<body>
    <header class="before-header">
        <div class="header_icon">
            Atte
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>