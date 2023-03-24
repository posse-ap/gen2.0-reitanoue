<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学習コンテンツ追加</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h1>学習コンテンツ追加</h1>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">
            コンテンツ名
        </label>
        <input type="text" name="content" id="name">
        <br>
        <label for="color">
            カラーコード
        </label>
        <input type="text" name="color" id="color">
        <br>
        <input type="submit" value="コンテンツを追加する">
    </form>
</body>

</html>
