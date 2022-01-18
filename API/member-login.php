<?php
session_start();
if(isset($_POST["username"])){
	$Username = $_POST["username"];
	$Password = $_POST["password"];  	
}

require_once("../db_config.php");

$link = create_connect();

//測試帳號密碼是否正確
//$sql = "SELECT * FROM members WHERE Username = 'Allen' AND Password = '123456' ";
// $sql = "SELECT * FROM members WHERE Username = '$Username' AND Password = '$Password' ";


// 	$result=execute_sql($link, "collect", $sql);
// 	if(mysqli_num_rows($result) ==1){
// 		$_SESSION["username"] = $_POST["username"];
// 		echo"login_success";
// 	}else{
// 		echo "login_fail";
// 	}
//--------------------------改用PDO方式--------------------------
$sql = "SELECT * FROM members WHERE Username = ? AND Password = ? ";

if ($link->prepare($sql)->execute([$Username, $Password])) {
	$_SESSION["username"] = $_POST["username"];
	echo "login_success";
} else {
	echo "login_fail";
}


$link = null; 


?>