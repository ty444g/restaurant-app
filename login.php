<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>ログイン</title>
<style>
    body { background-color: #f0f0f0; }
    .container {
        margin-top: 60px;
        max-width: 500px;
    }
    .jumbotron {
        padding: 2rem 2rem;
    }
    .navbar-brand {
        font-weight: bold;
    }
</style>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">飲食店ブックマーク</a>
        </div>
    </div>
  </nav>
</header>

<div class="container">
    <form name="form1" action="login_act.php" method="post">
        <div class="jumbotron">
            <fieldset>
                <legend>ログイン</legend>
                <div class="form-group">
                    <label for="lid">ID</label>
                    <input type="text" class="form-control" id="lid" name="lid" placeholder="IDを入力してください">
                </div>
                <div class="form-group">
                    <label for="lpw">Password</label>
                    <input type="password" class="form-control" id="lpw" name="lpw" placeholder="パスワードを入力してください">
                </div>
                <input type="submit" value="ログイン" class="btn btn-primary btn-block">
            </fieldset>
        </div>
    </form>
</div>

</body>
</html>