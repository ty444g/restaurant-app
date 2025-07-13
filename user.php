<?php
session_start();
include "funcs.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 70px; }
    .container { max-width: 600px; }
    .jumbotron { background-color: #f9f9f9; padding: 2rem 2rem; }
    legend { font-size: 1.5em; margin-bottom: 20px; }
  </style>
</head>
<body>

<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">トップへ戻る</a>
      </div>
    </div>
  </nav>
</header>
<div class="container">
  <form method="post" action="user_insert.php">
    <div class="jumbotron">
      <fieldset>
        <legend>👤 新規ユーザー登録</legend>
        
        <div class="form-group">
          <label for="name">名前：</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
          <label for="lid">Login ID：</label>
          <input type="text" class="form-control" id="lid" name="lid" required>
        </div>
        
        <div class="form-group">
          <label for="lpw">Login Password：</label>
          <input type="password" class="form-control" id="lpw" name="lpw" required>
        </div>

        <!-- <div class="form-group">
          <label>権限：</label>
          <div class="radio">
            <label><input type="radio" name="kanri_flg" value="0" checked> 一般ユーザー</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="kanri_flg" value="1"> 管理者</label>
          </div>
        </div> -->

        <input type="submit" value="登録する" class="btn btn-primary">
      </fieldset>
    </div>
  </form>
</div>
</body>
</html>