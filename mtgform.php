<?php
// //エラー表示設定
// ini_set('display_errors', 'On');
// //エラー出力レベル
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータを受け取る
    $name = $_POST['your-name'];
    $mtgname = $_POST['mtg-name'];
    $venuename = $_POST['venue-name'];
    $reservation = $_POST['your-reservation'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];
    $lesson = $_POST['your-lesson'];

    // データベース接続情報
    $dbHost = "127.0.0.1";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "itcontest";

    // データベースに接続
    $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    // 接続エラーのチェック
    if (mysqli_connect_errno()) {
        die("データベースへの接続に失敗しました: " . mysqli_connect_error());
    }

    // データベースにフォームデータを挿入
    $query = "INSERT INTO meetings (name, mtgname, venuename, reservation, start_time, end_time, lesson) VALUES ('$name', '$mtgname', '$venuename', '$reservation', '$start_time', '$end_time', '$lesson')";

    if (mysqli_query($connection, $query)) {
        // 生成される一意の会議IDを取得
        $mtgid = mysqli_insert_id($connection);
        // データベース接続を閉じる
        mysqli_close($connection);
        // 会議IDをURLに持たせリダイレクトを行う
        header("Location: mtgpage.php?mtgid=" . $mtgid);
        exit; // ここでスクリプトを終了
    } else {
        echo "データの保存中にエラーが発生しました: " . mysqli_error($connection);
    }
    // データベース接続を閉じる
    mysqli_close($connection);
}
?>
