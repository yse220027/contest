<?php
// エラーレポーティングを有効にし、すべてのエラーを表示する設定
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // フォームデータの取得
  $name = $_POST["your-name"];
  $mtgid = $_POST["mtg-id"];
  $email = $_POST["your-email"];
  $tel1 = $_POST["your-tel1"];
  $tel2 = $_POST["your-tel2"];
  $tel3 = $_POST["your-tel3"];
  $lesson = $_POST["your-lesson"];
  $questiontype = $_POST["questiontype"];
  $question = $_POST["question"];

  // // 会議IDがマイナスの場合
  // if (intval($mtgid) < 0) {
  //   // エラーメッセージを表示するか適切な処理を追加
  //   echo "会議IDにはマイナスの値を使用できません。";
  //   exit; // スクリプトを終了
  // }
  
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

  // 同じ質問が既に存在するかチェック
  $checkQuery = "SELECT * FROM questions WHERE question = '$question'";
  $checkResult = mysqli_query($connection, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    // 同じ質問が既に存在する場合の処理を追加（エラーメッセージを表示するなど）
    echo "同じ質問が既に存在します。";
    mysqli_close($connection);
    exit;
  }

  // データベースにフォームデータを挿入
  $query = "INSERT INTO questions (name, mtgid, email, tel1, tel2, tel3, lesson, questiontype, question) VALUES ('$name', '$mtgid', '$email', '$tel1', '$tel2', '$tel3', '$lesson','$questiontype', '$question')";

  if (mysqli_query($connection, $query)) {
    // データベース接続を閉じる
    mysqli_close($connection);
    // 該当する会議の質問一覧に飛ぶようURLにidを持たせリダイレクトを行う
    header("Location: ./questions.php?mtgid=" . $mtgid);
    exit; // ここでスクリプトを終了
  } else {
      echo "データの保存中にエラーが発生しました: " . mysqli_error($connection);
  }
  // データベース接続を閉じる
  mysqli_close($connection);
}
?>
