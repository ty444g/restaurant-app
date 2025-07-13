<?php
session_start();
//1. POSTデータ取得
// detail.phpのフォームから送信されたデータを受け取る
$name    = $_POST["name"];
$url     = $_POST["url"];
$comment = $_POST["comment"];
$id      = $_POST["id"]; // 更新対象のID

//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ更新SQL作成
// ★ UPDATEするテーブルとカラムを、飲食店情報に合わせて変更
$stmt = $pdo->prepare(
    "UPDATE gs_shop_table 
     SET name=:name, url=:url, comment=:comment 
     WHERE id=:id"
);

// ★ バインド変数も送信された値に合わせて変更
$stmt->bindValue(':name',    $name,    PDO::PARAM_STR);
$stmt->bindValue(':url',     $url,     PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id',      $id,      PDO::PARAM_INT);

// SQL実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  // 成功したらselect.phpへリダイレクト
  redirect("select.php");
}
?>