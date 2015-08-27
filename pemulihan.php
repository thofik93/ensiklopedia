<?php
	session_start();

	// jika variabel SESSION['jawaban'] belum tebentuk
	// maka redirect ke halaman forgot.php
	if (!isset($_SESSION['jawaban']))
	{
		echo "<script>window.location='forgot.php'</script>";
	}
	require_once '_connect.php';
	require_once 'fungsi/functions.php';

?>
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
		<div class="container">
		<?php 
			require_once '_pemulihan.php';
		 ?>
			<fieldset class="col-md-6 col-md-offset-3">
				<h2 class="text-center">Pemulihan Password</h2>
				<hr />
				<form method="post" action="pemulihan.php" role="form">

					<div class="form-group">
						<label for="pertanyaan">Pertanyaan:</label>
						<input type="text" name ="pertanyaan" class="form-control" id="pertanyaan" value="<?=$_COOKIE['pertanyaan'];?>" readonly>
					</div>

					<div class="form-group">
						<label for="jawaban">Jawaban:</label>
						<input type="text" name="jawaban" class="form-control" id="jawaban" required>
					</div>
					<?php if(isset($error_jwb)) echo "<p class='text-danger'>Jawaban anda salah!</p>"; ?>

					<div class="form-group">
						<label for="passwordbaru">Password Baru:</label>
						<input type="password" name="password_baru" class="form-control" id="passwordBaru" required>
					</div>


					<div class="form-group">
						<label for="ulangiPassword">Ulangi Password Baru:</label>
						<input type="password" name="password_ulang" class="form-control" id="ulangiPassword" required>
						<?php if(isset($error_pswd)) echo "<p class='text-danger'>Password tidak sama</p>"; ?>
					</div>
					<div class="form-group">
						<button type="submit" name="answer_attemp" class="btn btn-primary">Ubah</button>
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
