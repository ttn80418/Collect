<?php
$ID = $_POST["ID"];
require_once("../db_config.php");

$link = create_connect();

$sql = "DELETE FROM members WHERE ID= $ID ";


if($link->prepare($sql)->execute()){
	echo "1";//刪除成功 
		//刪除成功自動換頁
}else{
		echo "0";//刪除失敗
}

?>
