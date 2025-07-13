<?php
session_start();
include("funcs.php");
sschk();

$user_id = $_SESSION["id"]; 

$pdo = db_conn();
$sql = "SELECT * FROM gs_shop_table WHERE user_id = :user_id ORDER BY indate DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();
$values = "";
if($status==false) {
  sql_error($stmt);
}
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>飲食店一覧</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    body { 
        padding-top: 70px; 
        background-color: #f4f6f9;
    }

    /* ▼▼▼ この部分を修正 ▼▼▼ */
    .navbar-brand-custom {
        font-weight: bold;
        color: #fff !important; /* 文字色を白に変更 */
    }
    /* ▲▲▲ ここまで ▲▲▲ */

    /* メインコンテンツ */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .page-header h2 {
        margin: 0;
    }
    
    /* カードデザイン */
    .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        padding: 20px;
        position: relative;
    }
    .card-date {
        font-size: 0.8em;
        color: #777;
        margin-bottom: 10px;
    }
    .card-title {
        font-size: 1.4em;
        font-weight: bold;
        margin-top: 0;
        margin-bottom: 15px;
    }
    .card-url {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .card-url-link {
        color: #E67E22;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 90%; 
        display: inline-block;
    }
    .card-comment {
        color: #333;
        line-height: 1.6;
    }
    
    .card-actions {
        position: absolute;
        top: 20px;
        right: 20px;
    }
    .dropdown-menu > li > a:hover {
        background-color: #E67E22;
        color: #fff;
    }
</style>
</head>
<body id="main">

<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <span class="navbar-brand navbar-brand-custom">飲食店ブックマーク</span>
      </div>
      <div class="collapse navbar-collapse">
        <p class="navbar-text navbar-right" style="margin-right: 15px;">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <?= htmlspecialchars($_SESSION["name"])?>さん
            <a href="logout.php" class="btn btn-default btn-xs">ログアウト</a>
        </p>
      </div>
    </div>
  </nav>
</header>

<div class="container">
    <div class="page-header">
        <h2>🍽️ 飲食店一覧</h2>
        <a href="register.php" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 新規登録
        </a>
    </div>

    <div class="row">
        <?php foreach($values as $v){ ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-actions dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-option-vertical"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="detail.php?id=<?= $v["id"] ?>">編集</a></li>
                            <li><a href="delete.php?id=<?= $v["id"] ?>" onclick="return confirm('本当に削除しますか？')">削除</a></li>
                        </ul>
                    </div>

                    <div class="card-date"><?= htmlspecialchars($v["indate"]) ?></div>
                    <h3 class="card-title"><?= htmlspecialchars($v["name"]) ?></h3>
                    <?php if(!empty($v["url"])): ?>
                        <div class="card-url">
                            <span class="glyphicon glyphicon-link" aria-hidden="true" style="margin-right: 5px;"></span>
                            <a href="<?= htmlspecialchars($v["url"]) ?>" target="_blank" class="card-url-link" title="<?= htmlspecialchars($v["url"]) ?>">
                                <?= htmlspecialchars($v["url"]) ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <p class="card-comment"><?= nl2br(htmlspecialchars($v["comment"])) ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>