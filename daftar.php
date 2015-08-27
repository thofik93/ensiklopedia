<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equip="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kuliner Banten - Daftar</title>
		<link rel="icon" type="image/png" href="favicon.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/daftar.css">
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
			<fieldset class="col-md-6 col-md-offset-3 gap">
				<h2 class="text-success text-center">Form Pendaftaran</h2>
				<hr />
				<form method="post" action="daftar.php" class="form-horizontal" role="form" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
					    <label for="namaDepan" class="col-md-5">Nama Depan:</label>
					    <div class="col-md-6">
					      <input type="text" name ="nama_depan" class="form-control" id="namaDepan" placeholder="Enter Nama Depan" maxlength="15" required>
					    </div>
					</div>
 
					<div class="form-group">
					    <label for="namaTengah" class="col-md-5">Nama Tengah:</label>
					    <div class="col-md-6">
					      <input type="text" name ="nama_tengah" class="form-control" id="namaTengah" placeholder="Enter Nama Tengah" maxlength="15">
					    </div>
					</div>

					<div class="form-group">
					    <label for="namaBelakang" class="col-md-5">Nama Belakang:</label>
					    <div class="col-md-6">
					      <input type="text" name ="nama_belakang" class="form-control" id="namaBelakang" placeholder="Enter Nama Belakang" maxlength="15">
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="jenkel" class="col-md-5">Gender:</label>
					    <div class="col-md-6">
					      <div class="row">
					      	<div class="col-md-4">
					      		<input type="radio" name ="gender" class="radio" value="L" checked="checked">Laki-laki
					      	</div>
					      	<div class="col-md-2">
					      		<input type="radio" name ="gender" class="radio" value="P">Perempuan
					      	</div>
					       </div>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="alamat" class="col-md-5">Alamat:</label>
					    <div class="col-md-6">
					    	<textarea name="alamat" id="alamat" class="form-control" placeholder="Enter Alamat"></textarea>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="phone" class="col-md-5">Phone:</label>
					    <div class="col-md-6">
					      <input type="text" name ="phone" class="form-control" id="phone" placeholder="Enter Phone" maxlength="12" minlength="12" required>
					      <span id="helBlock" class="help-block">Contoh : 0812987299XXX</span>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="email" class="col-md-5">Email:</label>
					    <div class="col-md-6">
					      <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Email" required>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="sandi" class="col-md-5">Pertanyaan Pemulihan Kata:</label>
					    <div class="col-md-6">
					      <input type="text" name ="pertanyaan_pulih" class="form-control" id="sandi" placeholder="Enter Sandi" maxlength="100" required>
					      <span id="helBlock" class="help-block">Contoh : Siapa nama ibu anda, hobby, makanan favorit, dll.</span>
					    </div>
					</div>

					<div class="form-group">
					    <label for="jawaban" class="col-md-5">Jawaban:</label>
					    <div class="col-md-6">
					      <input type="text" name ="jawaban" class="form-control" id="jawaban" placeholder="Enter Jawaban" maxlength="20" required>
					      <span id="helBlock" class="help-block">* jawaban dari pertanyaan diatas</span>
					    </div>
					</div>

					<div class="form-group">
					    <label for="photo" class="col-md-5">Photo:</label>
					    <div class="col-md-6">
					      <input type="file" name ="photo" id="photo" required>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="username" class="col-md-5">Username:</label>
					    <div class="col-md-6">
					      <input type="text" name ="username" class="form-control" id="username" placeholder="Enter Username" maxlength="15" minlength="5" required>
					      <span id="helBlock" class="help-block">* tidak boleh kurang dari 5 karakter dan maksimal 15 karakter</span>
					    </div>
					</div><!--form-group-->

					<div class="form-group">
					    <label for="password" class="col-md-5">Password:</label>
					    <div class="col-md-6">
					      <input type="password" name ="password" class="form-control" id="password" placeholder="Enter Password" maxlength="15" minlength="5" required>
					    </div>
					</div><!--form-group-->
					<!--input member-->
					<input type="hidden" name="member" value="member">

					<button type="submit" name="_daftar" class="btn btn-primary">Buat Account</button>
					<button type="reset" class="btn btn-danger">Reset</button>
		  		</form>
		  	</fieldset>
		</div>
		

		<?php
			require_once '_daftar.php';
		?> 

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>
