<?php
//將帳密資料存放於session(server端)  cookie則是user端

if(isset($_POST["username"])){

$Username = $_POST["username"];
$Password = $_POST["password"];
$Bday = $_POST["bday"];
$Sex = $_POST["sex"];
//$Acc_type = $_POST["acc_type"];
}

require_once("../db_config.php");

$link = create_connect();

//$sql = "INSERT INTO members ( Username, Password, Bday, Sex) Values('$Username', '$Password', '$Bday', '$Sex')";
//$sql = "INSERT INTO members ( Username, Password, Bday, Sex) Values('$Username', '$Password', '$Bday', '$Sex', '$Acc_type')";
// if (execute_sql($link, "collect", $sql)) {
// 	echo "success";
// } else {
// 	echo "fail";
// }

//--------------------------改用PDO方式--------------------------
//$link->prepare($sql)->execute([$Username, $Password, $Bday, $Sex]);//SQL指令準備
$sql = "INSERT INTO members ( Username, Password, Bday, Sex) Values(?, ?, ?, ?)";//避免 SQL injection

if ($link->prepare($sql)->execute([$Username, $Password, $Bday, $Sex])) {
	echo "success";
} else {
	echo "fail";
}


$link = null; //關閉PDO連線
?>