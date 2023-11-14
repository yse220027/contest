<?php
// get-meeting.php

function getMeetingInfo($mtgId) {
    // データベース接続情報
    $dbHost = "127.0.0.1";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "itcontest";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $mtgId = $conn->real_escape_string($mtgId);

    $query = "SELECT * FROM meetings WHERE mtgid = '$mtgId'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    } else {
        return null;
    }

    $conn->close();
}

// 会議IDを取得
$mtgId = isset($_GET['mtgid']) ? $_GET['mtgid'] : null;

// $mtgIdが空でない場合、会議IDを使用してデータを検索
if (!empty($mtgId)) {
    // ここでデータベースなどから会議情報を取得するロジックを追加
    // 以下は仮の例として、getMeetingInfo関数を使用していると仮定しています
    $data = getMeetingInfo($mtgId);

    // データが見つからない場合の処理
    if (empty($data)) {
        die("指定された会議IDのデータが見つかりません。");
        // または、リダイレクトなどの適切なエラーハンドリングを行うことができます
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会議情報</title>
    <meta name="description" content="会議データ画面 テスト段階です">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/mtgpage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
</head>
<body>
    
    <header>
        <?php if (!empty($data)): ?>
            <h1 class="mtg-name"><?php echo $data[0]['mtgname']; ?></h1>
            <h2 class="name">主催者名 <?php echo $data[0]['name']; ?></h2>
        <?php else: ?>
            <h1 class="mtg-name">会議が見つかりません</h1>
        <?php endif; ?>
    </header>

    <section>
        <?php if (!empty($data)): ?>
            <h2>日時場所</h2>
            <ul>
                <p class="date">日付: <?php echo $data[0]['reservation']; ?></p>
                <p class="time">時間: <?php echo $data[0]['start_time']; ?>-<?php echo $data[0]['end_time']; ?></p>
                <p class="location">場所: <?php echo $data[0]['venuename']; ?></p> 
            </ul>
        <?php endif; ?>
    </section>

    <section>
    <h2>QRコード</h2>
        <div class="image-container">
            <?php if (!empty($data)): ?>
                <div class="image-item">
                    <img src="./img/qrcode.png" alt="QRコード">
                    <p class="image-title">主催者用QR</p>
                </div>

                <div class="image-item">
                    <img src="./img/qrcode2.png" alt="QRコード">
                    <p class="image-title">参加者用QR</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($data)): ?>
            <h2 class="mtgid">会議ID<p style="color: red;"><?php echo $data[0]['mtgid']; ?></h2>
        <?php endif; ?>
    </section>

    <section>
    <?php if (!empty($data)): ?>
        <h2><a href="questions.php?mtgid=<?php echo $data[0]['mtgid']; ?>">質問一覧ページへ</a></h2>
    <?php endif; ?>
    </section>

    <footer>
      <a href="./top.html">Top</a>
    </footer>

</body>
</html>
