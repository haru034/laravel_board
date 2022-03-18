<!-- ホーム画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap5読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- home.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
</head>
<body>
    <h1>Docker+Laravel(6)スレッド式掲示板</h1>
    <section>
        <div>
            <p><a class="btn btn-primary" href="{{ url('mypage') }}">マイページ</a></p>
            <p><a class="btn btn-secondary" href="{{ url('login_form') }}">ログアウト</a></p>
        </div>
        <div> <!-- チャット一覧画面 -->
            <form action="{{ route('entry') }}" method="post" autocomplete="off" style="height: auto; margin-bottom: 10px">
            @csrf <!-- CSRF保護 -->
                <div class="outer-message-form">
                    <p>＜スレッド作成フォーム＞</p>
                    <textarea name="thread_text" placeholder="スレッド本文を入力してください" autocomplete="off" rows="2" cols="200"></textarea><br> <!-- rows =「高さ」, cols =「幅」-->
                    <button type="submit" class="btn btn-success">投稿</button>
                </div>
            </form>
        </div>
        <div class="chat_table table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>表示名</th>
                        <th>スレッド一覧</th>
                        <th>投稿日時</th>
                    </tr>
                </thead>
                @foreach ($entries as $entry) <!-- chatテーブルのデータを全て表示させる処理 -->
                <tbody>
                    <tr>
                        <td style="width:10%">{{ $entry->user->nickname }}</td> <!-- $entryに、user関数を使い、その中のnicknameを参照 -->
                        <td style="width:40%"><a href="{{ route('thread_link') }}">{{ $entry->thread_text }}</a></td> <!-- 投稿されたスレッドにリンクを付ける。-->
                        <td style="width:20%">{{ $entry->created_at }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </section>
</body>
</html>