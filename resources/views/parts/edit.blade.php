@extends('layouts.frame')

@section('contents')

    <h1 class="h1">編集</h1>

    <form action="" method="post">
        @csrf

        <h2 class="h4">メールアドレスの、所有者名を編集できます。</h2>
        <input class="d-block" type="text" name="user" value="{{ $data['user'] }}" required>
        <h2 class="h4">メールアドレスを編集できます。</h2>
        <input class="d-block" type="email" name="email" value="{{ $data['email'] }}" required>

        <input class="d-block btn btn-primary" type="submit" value="送信">

    </form>

@endsection