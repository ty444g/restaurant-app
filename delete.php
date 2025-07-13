<?php
session_start();
//1. GETデータ取得
// select.phpから渡されたidを受け取る
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ削除SQL作成
// ★ DELETEするテーブルを、飲食店情報テーブル（gs_shop_table）に変更
$stmt = $pdo->prepare("DELETE FROM gs_shop_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ削除処理後
if($status==false){
  sql_error($stmt);
}else{
  // 成功したらselect.phpへリダイレクト
  redirect("select.php");
}
?>
