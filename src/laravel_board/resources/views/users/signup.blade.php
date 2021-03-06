<!-- 新規登録画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap5読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}"> <!-- signup.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
</head>
<body>
    <div class="signup">
        <div>
            <h1>新規登録画面</h1>
        </div>
            <div class="outer-signup-form">
                <section>
                    <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf <!-- CSRF保護 -->
                        <p><input type="text" name="name" placeholder="本名を入力してください" autocomplete="off" style="width:250px; height:30px;"></P>
                        <p><input type="text" name="nickname" placeholder="ニックネームを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="email" name="email" placeholder="メールアドレスを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><input type="password" name="password" placeholder="パスワードを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><input type="submit" value="登録する" autocomplete="off" style="width:200px; height:30px; margin-top:20px;"></p>
                    </form>
                    <a href="{{ route('login_form') }}">ログイン画面に戻る</a> <!-- リダイレクト -->
                </section>
            </div>
        </form>
        <div class="error-indication">
            @foreach ($errors->all() as $error) <!--入力ミスまたは重複している部分があれば、警告文で知らせてくれる処理-->
                <li>{{$error}}</li>
            @endforeach
        </div>
    </div>
</body>
</html>