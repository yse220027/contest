<?php
// 外部ファイルを読み込む
include("get-questions.php");

// 以降のコードで$data変数を使用してデータを表示
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>質問一覧</title>
    <meta name="description" content="質問一覧画面 テスト段階です">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/questions.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
</head>
<body>
    
    <header>
        <h1 class="title-name">質問一覧</h1>
    </header>

    <?php
    $currentQuestionType = "";
    foreach ($data as $row):
        if ($currentQuestionType !== $row['questiontype']):
            // 新しい質問の種類が始まったらセクションを開始
            if ($currentQuestionType !== ""):
                echo '</section>';
            endif;
            $currentQuestionType = $row['questiontype'];
            echo "<section>";
            echo "<h2>$currentQuestionType</h2>";
        endif;
    ?>
    <p><?php echo $row['question']; ?></p>
    <?php endforeach; ?>
    </section>
    <footer>
        <a href="./top.html">Top</a>
    </footer>
</body>
</html>

