<html lang="ja">
<head>
    <title>アイテム作成</title>
</head>
<body>
<h1>■アイテム作成</h1>
<form method="post" action="{{url('items/store')}}">
    @csrf
    <table border="1">
        <tr>
            <td>アイテム名</td>
            <td><input type="text" name="name" size="30"></td>
        </tr>
        <tr>
            <td>タイプ</td>
            <td><input type="text" name="type" size="30"></td>
        </tr>
        <tr>
            <td>説明</td>
            <td><input type="text" name="explanation" size="30"></td>
        </tr>
    </table>
    <input type="submit" value="作成">
</form>
</body>
</html>
