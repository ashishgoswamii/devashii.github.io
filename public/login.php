<?php
include("admin/includes/config.php");
if (isset($_COOKIE['member_uname']) && isset($_COOKIE['member_password'])) {
	$select1 = "SELECT * FROM student WHERE uname = '" . $_COOKIE['member_uname'] . "' AND password = '" . $_COOKIE['member_password'] . "'";
	$result1 = mysqli_query($conn, $select1);
	$count = mysqli_num_rows($result1);
	if ($count > 0) {
		$row1 = mysqli_fetch_assoc($result1);
		$_SESSION['STUDENT_ID'] = $row1['id'];
		echo $_SESSION['STUDENT_ID'];
		header("location:index.php");
	}
}

?>



<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Page title-->
	<link rel="icon" href="favicon.ico">
	<title>WildCat FlashMath</title>
	<link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap' rel='stylesheet'>
	<link rel="stylesheet" href="css/ashish.css">

</head>

<body class="grid-layout">


	<div class="banner-container">
		<img class="banner-text" src="imageash/LogoMakr_1UdKqN.png" alt="">

	</div>

	<div class="info-container">
		<img class="info" src="imageash/LogoMakr_9XTAis.png" alt="">

	</div>

	<div class="logo1-container1">
		<img id="logo1" src="imageash/LogoMakr_2exIAU.png" alt="">
	</div>

	<div class="logo2-container">
		<img id="logo2" src="imageash/LogoMakr_93zjt1.png" alt="">
	</div>
	<div class="login-content">
		<form action="login_db.php" id="loginform" method="POST">
			<img class="avatar" src="imageash/avatar-login.svg">
			<h2 class="title">Student Login</h2>
			<div class="input-div one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="div">
					<h5>Username</h5>
					<input type="text" name="uname" id="uname" class="input">
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="div">
					<h5>Password</h5>
					<input type="password" name="pwd" id="pwd" class="input">
				</div>
			</div>
			<input type="submit" class="jello-horizontal" name=signup-submit value="Login">
		</form>
	</div>


	<div class="admin-container">
		<form action="admin/login.php" id="admin" method="POST">
			<input type="submit" class="admin-button" value="Admin Login">
		</form>
	</div>

	<script src="admin/dist/jquery.validate.js"></script>

</body>
<script>
	$().ready(function() {

		// validate signup form on keyup and submit
		$("#loginForm").validate({
			rules: {
				uname: "required",
				pwd: "required"
			},
			messages: {
				uname: "Please Enter User Name",
				pwd: "Please Enter Password"
			}
		});

	});
</script>

</html>