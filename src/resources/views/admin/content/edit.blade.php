<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>コンテンツ編集</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h1>コンテンツ編集</h1>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="content" value="{{ $content->content }}">
        <input type="submit" value="更新">
    </form>
</body>

</html>