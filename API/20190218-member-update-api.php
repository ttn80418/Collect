<?php
if(isset($_POST["ID"])){
$ID = $_POST["ID"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$Bday = $_POST["bday"];
$Sex = $_POST["sex"];	
}

 	require_once("../dbtools.inc.php");
	$link = create_connect();

	$sql = "UPDATE members SET Username='$Username', Password='$Password', Bday='$Bday', Sex='$Sex' WHERE ID='$ID'";


	if($result = execute_sql($link, "collect", $sql)){
		echo "update success";
	}else{
		echo "update fail";
	}

?>