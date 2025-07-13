<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>飲食店登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbarがコンテンツに重ならないように調整 */
        body { padding-top: 70px; }
        .jumbotron{
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        legend {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="select.php">飲食店一覧</a></div>
        </div>
    </nav>
</header>
<form method="POST" action="insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>🍽️ 飲食店登録</legend>
            <div class="form-group">
                <label for="name">店名：</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="url">お店のURL：</label>
                <input type="url" class="form-control" id="url" name="url">
            </div>
            <div class="form-group">
                <label for="comment">コメント：</label>
                <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
            </div>
            <input type="submit" value="登録する" class="btn btn-primary">
        </fieldset>
    </div>
</form>
</body>
</html>