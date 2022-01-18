<?php
	function create_connect(){
		$link = mysqli_connect("localhost", "root", "asus@rog14") or die("建立連線失敗".mysqli_connect_error());

		//mysqli_query($link, "SET NAMES UTF8");

		return $link;
	}

	function execute_sql($link, $dbname, $sql){
		mysqli_select_db($link, $dbname) or die("連接資料庫失敗".mysqli_connect_error());

		$result = mysqli_query($link, $sql);
		return $result;
	}
//array(1) { [0]=> array(6) { ["ID"]=> string(2) "21" ["Username"]=> string(6) "test01" ["Password"]=> string(6) "111111" ["Bday"]=> string(19) "2021-12-11 00:00:00" ["Sex"]=> string(3) "男" ["Date"]=> string(19) "2021-12-22 15:21:21" } }
//array(1) { [0]=> array(1) { [0]=> array(6) { ["ID"]=> string(2) "21" ["Username"]=> string(6) "test01" ["Password"]=> string(6) "111111" ["Bday"]=> string(19) "2021-12-11 00:00:00" ["Sex"]=> string(3) "男" ["Date"]=> string(19) "2021-12-22 15:21:21" } } }
//array(1) { [0]=> array(6) { ["ID"]=> string(2) "21" ["Username"]=> string(6) "test01" ["Password"]=> string(6) "111111" ["Bday"]=> string(19) "2021-12-11 00:00:00" ["Sex"]=> string(3) "男" ["Date"]=> string(19) "2021-12-22 15:21:21" } }
?>
