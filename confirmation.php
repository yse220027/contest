<!DOCTYPE html>
<html lang="ja">
<!-- /* 変更した */ -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #confirmation-message {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>登録確認</h1>
    <div id="confirmation-message">
        <p>以下の情報で登録が完了しました：</p>
        <ul>
            <li><strong>名前：</strong> <?php echo $_POST['name']; ?></li>
            <li><strong>メールアドレス：</strong> <?php echo $_POST['email']; ?></li>
            <li><strong>電話番号：</strong> <?php echo $_POST['tel']; ?></li>
            <li><strong>パスワード：</strong> <?php echo str_repeat("●", strlen($_POST['password'])); ?></li>
        </ul>
        <a href="topafter.html">Topに戻る</a>
    </div>
</body>
</html>
