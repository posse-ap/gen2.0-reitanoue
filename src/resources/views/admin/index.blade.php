<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>管理画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/reset.css">
    <link rel="stylesheet" href="../../../public/css/index.css">
    <script src="https://kit.fontawesome.com/77dc7f4ff2.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- ヘッダー -->
    <header class='header'>
        <div class='header__inner'>
            <p>welcome!管理者<{{ $user->name }}>様</p>
        </div>
    </header>
    <!-- 大枠 -->
    
    <main class="main flex">
        <h1 class="user_admin_title">学習言語・コンテンツ管理</h1>
        <a class='header__inner__button' href="/admin/user/index">ユーザー管理へ</a>
        <div class="section__box">
            <p> 学習言語管理</p>
            <table>
                <tr>
                    <th>言語名</th>
                    <th>編集・削除ページへ</th>
                </tr>
                @foreach ($languages as $language)
                    <tr>
                        <td>{{ $language->language }}</td>
                        <td><a href="/admin/language/index/{{ $language->id }}"><button>コンテナ名変更 or 削除</button></a></td>
                    </tr>
                @endforeach
            </table>
            <a href="/admin/language/add/index">学習言語追加</a>
        </div>
        <div class="section__box">
            <p> 学習コンテンツ管理</p>
            <table>
                <tr>
                    <th>コンテンツ名</th>
                    <th>編集・削除ページへ</th>
                </tr>
                @foreach ($contents as $content)
                    <tr>
                        <td>{{ $content->content }}</td>
                        <td><a href="/admin/content/index/{{ $content->id }}"><button>コンテナ名変更 or 削除</button></a></td>
                    </tr>
                @endforeach
            </table>
            <a href="/admin/content/add/index">学習コンテンツ追加</a>
        </div>
    </main>

    <footer>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <i class="fa-solid fa-right-from-bracket logout__button">
                <input type="submit" value="ログアウト" type="hidden">
            </i>
        </form>
    </footer>

</body>


</html>
