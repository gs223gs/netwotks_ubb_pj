<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>湯婆婆の名簿 - 入社</title>
</head>
<body>
    <h1>湯婆婆の名簿へようこそ</h1>
    <form action="convert.php" method="post">
        <label>漢字の名前：</label>
        <input type="text" name="input_name" required><br><br>
        <label>ひらがなの名前：</label>
        <input type="text" name="input_name_hira" required><br><br>
        <input type="submit" value="送信">
    </form>
    <br>
    <form action="user.php" method="get">
        <button type="submit">名簿を見る</button>
    </form>
</body>
</html>
