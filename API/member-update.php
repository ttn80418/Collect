<?php
if(isset($_POST["ID"])){
$ID = $_POST["ID"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$Bday = $_POST["bday"];
$Sex = $_POST["sex"];	
}

// require_once("../dbtools.inc.php");
// $link = create_connect();

// $sql = "UPDATE members SET Username='$Username', Password='$Password', Bday='$Bday', Sex='$Sex' WHERE ID='$ID'";

// if($result = execute_sql($link, "collect", $sql)){
// 	echo "update success";
// }else{
// 	echo "update fail";
// }
//--------------------------改用PDO方式--------------------------
require_once("../db_config.php");

$link = create_connect();

$sql = "UPDATE members SET Username =?, Password =?, Bday=?, Sex=? WHERE ID=? ";

if ($link->prepare($sql)->execute([$Username, $Password, $Bday, $Sex, $ID])) {
	echo "update success";
} else {
	echo "update fail";
}


$link = null; //關閉PDO連線


?>