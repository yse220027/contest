<?php
// 前のページから持ち越したmtgidをURLから受け取る
if (isset($_GET['mtgid'])) {
    $mtgid = $_GET['mtgid'];

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

    // データを取得するSQLクエリを作成
    $query = "SELECT * FROM meetings WHERE mtgid = " . $mtgid;

    // SQLクエリを実行してデータを取得
    $result = mysqli_query($connection, $query);

    // データを配列に格納
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // データベース接続を閉じる
    mysqli_close($connection);

    // QRコード生成ライブラリを読み込む
    require_once('./phpqrcode/qrlib.php');// ライブラリのパスを正確に指定してください

    // QRコードを生成するデータを作成
    $pageUrl = "http://localhost/ITContest-basic/mtgpage.php?mtgid=" . $mtgid; // ここに会議情報ページURLを指定してください
    $fpageUrl = "http://localhost/ITContest-basic/form.html?mtgid=" . $mtgid; // ここにフォームURLを指定してください
    
    // QRコードを生成
    $qrCode = new QRCode($pageUrl);//これが会議情報ページ
    $qrCodef = new QRCode($fpageUrl);//これが参加者用のID入り質問フォームへのQR

    //
    // QRコードを生成
    QRcode::png($pageUrl, './img/admin'. $mtgid .'.png'); // 画像を保存
    QRcode::png($fpageUrl, './img/part'. $mtgid .'.png'); // 画像を保存
    

} else {
    // mtgidが受け取られなかった場合のエラーハンドリングなどを行うことができます
    echo "mtgidが指定されていません。";
}
?>