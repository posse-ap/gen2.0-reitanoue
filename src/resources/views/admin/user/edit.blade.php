<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー編集</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    {{ $user->name }}
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ $user->name }}">
        {{-- <input type="text" name="name" value="{{ $user->email }}"> --}}
        <input type="submit" value="更新">
    </form>
</body>

</html>