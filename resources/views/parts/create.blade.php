@extends('layouts.frame')

@section('contents')

    <h1 class="h1">新規作成</h1>

    <form action="" method="post">
        @csrf

        <h2 class="h4">メールアドレスの、所有者名を入力してください。</h2>
        <input class="d-block" type="text" name="user" required>
        <h2 class="h4">メールアドレスを入力してください。</h2>
        <input class="d-block" type="email" name="email" required>
    
        <input class="d-block btn btn-primary" type="submit" value="送信">

    </form>

@endsection