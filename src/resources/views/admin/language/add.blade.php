<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学習言語追加</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h1>学習言語追加</h1>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">
            言語名
        </label>
        <input type="text" name="language" id="name">
        <br>
        <label for="color">
            カラーコード
        </label>
        <input type="text" name="color" id="color">
        <br>
        <input type="submit" value="言語を追加する">
    </form>
</body>

</html>
