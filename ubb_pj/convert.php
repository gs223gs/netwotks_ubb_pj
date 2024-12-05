<?php
// データベース接続情報
$host = 'localhost';
$username = 'root';
$password = 'NEW_PASSWORD';
$dbname = 'testdb';

// POSTデータの取得
$input_name = $_POST['input_name'];
$input_name_hira = $_POST['input_name_hira'];

// ひらがなの名前をランダムに2文字に短縮
$length = mb_strlen($input_name_hira);
if ($length <= 2) {
    $convert_name = $input_name_hira;
} else {
    $start = rand(0, $length - 2);
    $convert_name = mb_substr($input_name_hira, $start, 2);
}

// データベースへの接続
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("データベース接続失敗: " . $conn->connect_error);
}

// データの挿入
$stmt = $conn->prepare("INSERT INTO ubb_user (input_name, input_name_hira, convert_name) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $input_name, $input_name_hira, $convert_name);
$stmt->execute();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>湯婆婆の名簿 - 変換結果</title>
    <!-- Google Fontsの読み込み -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
    <!-- CSSファイルの読み込み -->
    <link rel="stylesheet" href="./css/convert.css">
</head>
<body>
    <h1>変換結果</h1>
    <p>
        <?php echo htmlspecialchars($input_name); ?>～～？？贅沢な名だね！おまえのなまえは「<?php echo htmlspecialchars($convert_name); ?>」だよ！
    </p>
    <form action="user.php" method="get">
        <button type="submit">名簿を見る</button>
    </form>
    <form action="./index.html" method="get">
        <button type="submit">入社する</button>
    </form>
    <footer>
        &copy; 2023 湯屋
    </footer>
</body>
</html>
