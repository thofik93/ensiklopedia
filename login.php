<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equip="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kuliner Banten - Login</title>
		<link rel="icon" type="image/png" href="favicon.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">

		<!--[if lt IE 9]>
			<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="bg-success">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Kuliner Banten</a>
				</div>
			</div>
		</nav>

		<div class="container">
			<fieldset class="col-md-3 col-md-offset-8 col-sm-5 col-sm-offset-7 col-xs-10 col-xs-offset-1 gap">
				<img src="images/logo_gray.png" style="margin: 5px 0 10px 10%" />
				<p>Masuk Ke Account Anda</p>
				<form method="post" action="login.php" role="form">
					<div class="form-group">
					    <label for="username">Username:</label>
					    <div class="input-group">
					      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					      <input type="text" name ="username" class="form-control" id="username" placeholder="Enter Username" maxlength="15" minlength="5" autofocus required>
						</div><!--input group-->
					</div>
					<div class="form-group">
					    <label for="pwd">Password:</label>
					    <div class="input-group">
					       <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" maxlength="15" minlength="5" required>
						</div>
					</div>

					<button type="submit" name="login_attemp" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-danger">Reset</button>
		  		</form>
		  			<p></p>
		  			<a href="forgot.php" class="text-danger forgot">Forgot Password ?</a>
	  		</fieldset>
	  		<?php
				require_once '_login.php';
			?>
		</div><!--container-->
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>
