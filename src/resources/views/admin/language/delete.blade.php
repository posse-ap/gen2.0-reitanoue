<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>言語削除</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h1>言語【{{ $language->language }}】削除</h1>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="submit" value="削除">
    </form>
</body>

</html>