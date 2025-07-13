<?php
session_start();
$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");
sschk();
$pdo = db_conn();

// ★ SQLを飲食店テーブル（gs_shop_table）から取得するように変更
$stmt = $pdo->prepare("SELECT * FROM gs_shop_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>飲食店情報編集</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* 他のページとスタイルを統一 */
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
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>🍽️ 飲食店情報編集</legend>
    <div class="form-group">
       <label for="name">店名：</label>
       <input type="text" class="form-control" id="name" name="name" value="<?=htmlspecialchars($row["name"])?>" required>
     </div>
     <div class="form-group">
        <label for="url">お店のURL：</label>
        <input type="url" class="form-control" id="url" name="url" value="<?=htmlspecialchars($row["url"])?>">
     </div>
     <div class="form-group">
        <label for="comment">コメント：</label>
        <textarea class="form-control" id="comment" name="comment" rows="4"><?=htmlspecialchars($row["comment"])?></textarea>
     </div>
     
     <input type="submit" value="更新する" class="btn btn-primary">
     <input type="hidden" name="id" value="<?=htmlspecialchars($row["id"])?>">
    </fieldset>
  </div>
</form>
</body>
</html>