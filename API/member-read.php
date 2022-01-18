<?php
session_start();

if (isset($_SESSION['username'])) {
	$Username = $_SESSION['username'];

	//require_once("../dbtools.inc.php");//舊的mysqli寫法
	require_once("../db_config.php");
	$link = create_connect();

//----------10.01-2版 session判斷後才執行sql語法---------		
// 		if($Username == "superuser"){
// 			$sql = "SELECT * FROM members ";//若為root權限 則都可以顯示全部
// 			$result = execute_sql($link, "demo_db", $sql);
// 			if(mysqli_num_rows($result) > 0){
// 				$row = mysqli_fetch_assoc($result);
// 				do{
// 					$memberArray[] = $row;
// 				}while($row = mysqli_fetch_assoc($result));
// 					echo json_encode($memberArray);
// 			}	
// 	}else {
// 			$sql = "SELECT * FROM members WHERE Username = '$Username' ";
// 			$result = execute_sql($link, "demo_db", $sql);
// 			$row = mysqli_fetch_assoc($result);
// 			$_SESSION['username'] = $row['Username'];
// 			$data[] = $row ;
// 			echo json_encode($data);
// 		  }	
// $link->close();	
//--------------------------改用PDO方式--------------------------
		if($Username == "superuser"){
			$sql = "SELECT * FROM members ";//若為root權限 則都可以顯示全部
			$data = $link->prepare($sql);
			$data->execute();
			$total_records = $data->rowCount();
			//echo "資料筆數: $total_records 筆<br/>";exit;

			if($total_records > 0){
				$row = $data->fetch(PDO::FETCH_ASSOC);
				do{
					$MemberArray[] = $row;
				}while($row = $data->fetch(PDO::FETCH_ASSOC));
					echo json_encode($MemberArray);
			}

	}else {
			$sql = "SELECT * FROM members WHERE Username = ? ";
			$data = $link->prepare($sql);
			$data->execute([$Username]);
			$row = $data->fetch(PDO::FETCH_ASSOC);//因只要需要筆用fetch,若要全部則要用fetchAll
			$_SESSION['username'] = $row['Username'];
			$MemberData[] = $row ;
			echo json_encode($MemberData);
		  }

	$link = null; 
}	
?>