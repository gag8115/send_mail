@extends('layouts.frame')

@section('contents')

    {{-- タイトル --}}
    <div class="row">
        <h1 class="h1">メールアドレス一覧</h1>
    </div>

    {{-- メール送信フォーム --}}
    <form class="container records" action="{{ url('mail/complete') }}" method="post">
        @csrf
        
        {{-- メールリスト生成。 --}}
        @foreach ($mailList as $item)

            <div class="row record" data-first="0" data-last="0">
                <input class="col" type="checkbox" name="checks[]" value="{{ $item['email'] }}">
                <span class="col">{{ $item['user'] }}</span>
                <span class="col">{{ $item['email'] }}</span>
                <a class="col-1 btn btn-secondary" href="{{ route('edit', $item['id']) }}">編集する</a>
                <a class="col-1 btn btn-danger" href="{{ route('delete', $item['id']) }}">削除する</a>
            </div>

        @endforeach

        <input class="d-block btn btn-primary btn-lg" type="submit" value="メール送信">
    </form>

@endsection

@section('javascript')

    <script>
    $(function() {

        // ペジネーションの設定。
        $('.records').paginathing({
            perPage: 5,
            prevText:'前へ',
            nextText:'次へ',
            firstLast: false
        });
    });
    </script>

@endsection
