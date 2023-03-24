<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー一覧</title>
</head>
<body>
    <h1 class="user_admin_title">ユーザーリスト管理</h1>
    <a href="/admin/index">管理者画面に戻る</a>
    <div class="user_admin">
        <table>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/admin/user/edit/{{ $user->id }}"><button>編集</button></a></td>
                <td><a href="/admin/user/delete/{{ $user->id }}"><button>削除</button></a></td>
            </tr>

            @endforeach
        </table>
    </div>
</body>
</html>