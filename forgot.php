<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equip="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kuliner Banten - Forgot Password</title>
		<link rel="icon" type="image/png" href="favicon.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/forgot.css">

		<!--[if lt IE 9]>
			<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Kuliner Banten</a>
				</div>
			</div>
		</nav>
			<?php
				require_once '_forgot.php';
			?>
		<div class="container">
			<fieldset class="col-md-6 col-md-offset-3">
				<h2 class="text-center">Reset Password</h2>
				<hr />

				<form method="post" action="forgot.php" role="form">
					<div class="form-group has-info has-feedback">
					    <label class="control-label col-md-offset-1" for="email">Email Anda:</label>
					    <div class="input-group col-md-10 col-md-offset-1">
					    	<span class="input-group-addon">@</span>
					    	<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" autofocus required>
					    </div>	
					</div>
					<div class="col-md-offset-1">
						<button type="submit" name="forgot_pswd" class="btn btn-primary">Send Email</button>
						<button type="reset" name="reset" class="btn btn-danger">Reset</button>
					</div>
					<br />
		  		</form>
	  		</fieldset>
		</div><!--container-->
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>
