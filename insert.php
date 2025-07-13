<?php
session_start();
//1. POSTデータ取得
// index.phpのフォームから送信されたデータを受け取る
$name    = $_POST["name"];    // 店名
$url     = $_POST["url"];     // お店のURL
$comment = $_POST["comment"]; // コメント
$user_id = $_SESSION["id"]; // login_act.phpでセッションに保存したユーザーID
//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
// テーブル名とカラム名を、飲食店の情報に合わせて変更します。
// ※注意: 事前にデータベースに 'gs_shop_table'のようなテーブルと 'url', 'comment' カラムを作成しておく必要があります。
$stmt = $pdo->prepare(
    "INSERT INTO gs_shop_table(user_id, name, url, comment, indate) 
     VALUES(:user_id, :name, :url, :comment, sysdate())"
);

// バインド変数をセット
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// SQL実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>