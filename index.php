<!DOCTYPE html>
<html>

<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
	<div class="container">
		<div class="login-content">
			<form action="" method="POST">
				<i style="color: #0d3f9b;" class="fas fa-user fa-3x"></i>
				<div class="title">
					<span class="welcome">Login page</span>
					<span class="eror" id="eror" style="display:none; color:red;text-align:center">Invalid Login Access</span>
					<span class="empty" id="empty" style="display:none; color:red;text-align:center">All fields required</span>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="text" name="user_email" id="user_email" class="input" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" name="user_pass" id="user_pass" class="input" required>
					</div>
				</div>
				<input type="submit" class="btn" value="Login" id="loginsubmit">
			</form>
		</div>
	</div>
	<!-- js files -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/login_page.js"></script>
	<script src="js/ajax.js"></script>

</body>

</html>