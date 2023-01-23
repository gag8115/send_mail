<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="メール一括送信アプリです。">
        <title>メール一括送信アプリ</title>

        {{-- 今回はビューコンポーザ不使用。 --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}?{{ config('original_conf.timeForCache') }}">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}?{{ config('original_conf.timeForCache') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>

        @yield('contents')

        {{-- 今回はビューコンポーザ不使用。 --}}
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}?{{ config('original_conf.timeForCache') }}"></script>
        <script src="{{ asset('js/paginathing.min.js') }}?{{ config('original_conf.timeForCache') }}"></script>
        
        @yield('javascript')
    </body>
</html>
