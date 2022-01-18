<?php

require_once("db_config.php");

$link = create_connect();

//-----------------------提取資料測試-----------------------
//$sql = "SELECT * FROM members ";
// $link->prepare($sql)->execute();//SQL指令準備

// $result = $link->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);exit;


   $sql = "SELECT * FROM members WHERE Username = ? ";
   echo "SQL查詢字串: $sql <br/>";

$data = $link->prepare($sql);
$data->execute(array("adfasg21"));

   // 送出查詢的SQL指令
   if ( $result = $data->fetchAll(PDO::FETCH_ASSOC) ) { 
      echo "<b>帳戶資料(name = \"1234\"):</b><br/>";  // 顯示查詢結果
      // 取得記錄數
      $total_records = $data->rowCount();
      echo "資料筆數: $total_records 筆<br/>"; 
      foreach( $result as $row ){ 
         echo $row["Username"]."<br/>";
      } 
}

$link = null; //關閉PDO連線
?>