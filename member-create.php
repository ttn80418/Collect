<!DOCTYPE html>
<html lang="zh-tw">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login_rwd.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script>
		$(function() {
			$("#username").bind("input propertychange", function() {
				if ($("#username").val().length < 5) {
					$("#error_username").html("帳號不得少於5個字數");
					//$("#error_username").css("background-color", "red");
					$("#error_username").css("color", "red");
				} else {
					$("#error_username").html("");
				}
			});
			// ----password-----
			$("#password").bind("input propertychange", function() {
				if ($("#password").val().length < 6) {
					$("#error_password").html("密碼不得少於6個字數");
					//$("#error_password").css("background-color", "red");
					$("#error_password").css("color", "red");
				} else {
					$("#error_password").html("");
				}
			});

			$("#reg_ok").bind("click", function() {
				$.ajax({
					type: "POST",
					url: "http://localhost/collect/API/20190218-member-create_api.php",
					data: {
						username: $("#username").val(),
						password: $("#password").val(),
						bday: $("#bday").val(),
						sex: $("#sex").val(),
					},
					success: reg,
					error: function() {
						alert("註冊api回傳失敗");
					}
				}); // end ajax
			});
		}); // end function()
		//url https://tcnr1624.000webhostapp.com/Personal_Collect/API/20190218-member-create_api.php

		function reg(data) {
			if (data) {
				location.href = "3_member-login.php";
			} else {
				alert(data);
			}
		}
	</script>
	<title>會員註冊</title>
</head>

<body>
	<img class="wave" src="images/wave2.png">
	<div class="container">
		<div class="img">
			<img src="images/img.svg">
		</div>
		<div class="login-container">
			<form class="form" action="">
				<img class="avatar" src="images/avatar.svg">
				<h2>Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h5>Username</h5><span id="error_username"></span>
						<input class="input" id="username" type="text">
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h5>Password</h5>
						<sapn id="error_password"></sapn>
						<input class="input" id="password" type="password">
					</div>
				</div>
				<a href="#">已有會員？請點擊登入</a>
				<!-- <input class="btn" type="submit" value="註冊"> -->
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="reg_ok" class="reg_ok">註冊</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>