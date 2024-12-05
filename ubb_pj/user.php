<?php
// データベース接続情報
$host = 'localhost';
$username = 'root';
$password = 'NEW_PASSWORD';
$dbname = 'testdb';

// データベースへの接続
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("データベース接続失敗: " . $conn->connect_error);
}

// データの取得
$sql = "SELECT * FROM ubb_user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>湯婆婆の名簿 - 名簿一覧</title>
</head>
<body>
    <h1>名簿一覧</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>漢字の名前</th>
            <th>ひらがなの名前</th>
            <th>変換後の名前</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['input_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['input_name_hira']); ?></td>
                    <td><?php echo htmlspecialchars($row['convert_name']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">データがありません</td>
            </tr>
        <?php endif; ?>
    </table>
    <?php
    $conn->close();
    ?>
    <br>
    <form action="index.php" method="get">
        <button type="submit">入社する</button>
    </form>
</body>
</html>
