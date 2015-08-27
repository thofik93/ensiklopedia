<?php
	require_once '_connect.php';
	require_once 'fungsi/functions.php';

	if (isset($_POST['_daftar']))
	{

		$id 			= kode_member();

		$nama_depan    	= clear_masukan($_POST['nama_depan']);
		$nama_tengah    = clear_masukan($_POST['nama_tengah']);
		$nama_belakang 	= clear_masukan($_POST['nama_belakang']);
		$gender 	    = clear_masukan($_POST['gender']);
		$alamat         = clear_masukan($_POST['alamat']);
		$phone		    = clear_masukan($_POST['phone']);
		$email 		    = clear_masukan($_POST['email']);
		$pertanyaan     = clear_masukan($_POST['pertanyaan_pulih']);
		$jawaban        = clear_masukan($_POST['jawaban']);
		// user_login
		$username       = clear_masukan($_POST['username']);
		$password 	    = md5(clear_masukan($_POST['password']));
		$hak_akses      = $_POST['member'];
		//photo
		$photo   	    = $_FILES['photo']['tmp_name'];
		$photo_name     = $_FILES['photo']['name'];
		$photo_fix_name = $nama_depan.$photo_name;
		$direktori 		= "images/photo/$photo_fix_name";

		// validasi email dan username
		$validasi_e = validasi_email($email);
		$validasi_u = validasi_username($username);

		if (!empty($photo) && $validasi_e == NULL && $validasi_u == NULL) 
		{
			move_uploaded_file($photo, $direktori);

			$query_1 = "INSERT INTO member  (id_member,
											 nama_depan,
											 nama_tengah,
											 nama_belakang,
											 jenkel,
											 alamat,
											 phone,
											 email,
											 pertanyaan,
											 jawaban,
											 photo)
									VALUES  ('$id',
											 '$nama_depan',
											 '$nama_tengah',
											 '$nama_belakang',
											 '$gender',
											 '$alamat',
											 '$phone',
											 '$email',
											 '$pertanyaan',
											 '$jawaban',
											 '$photo_fix_name')";
			$result_1 = mysqli_query($conn, $query_1);
			if(!$result_1)
			{
				die('Database Acces Failed ' . mysqli_error($conn));
			}
		
			$query_2 = "INSERT INTO user_login  (username,
												 password,
											 	 hak_akses,
											 	 users)
										VALUES  ('$username',
											 	 '$password',
											 	 '$hak_akses',
											 	 '$id')";
			$result_2 = mysqli_query($conn, $query_2);
			if(!$result_2)
			{
				die('Database Acces Failed ' . mysqli_connect($conn));
			}
			echo '<div class="col-md-7 col-md-offset-3 alert alert-success alert-dismissable">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo 'Selamat Account Anda Telah Berhasil dibuat, klik <a href="login.php">Login Page</a> untuk ke Account Anda';
			echo '</div>';
		
		} 
		else 
		{

			if ($validasi_e != NULL && $validasi_u != NULL) 
			{
				echo '<div class="col-md-7 col-md-offset-3 alert alert-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo 'Email '.$email.' dan Username '.$username.' anda sudah digunakan Account lain';
				echo '</div>';
			}
			elseif($validasi_e != NULL) 
			{
				echo '<div class="col-md-7 col-md-offset-3 alert alert-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo 'Email '.$email.' Sudah digunakan Account lain';
				echo '</div>';
			}
			elseif ($validasi_u != NULL) 
			{
				echo '<div class="col-md-7 col-md-offset-3 alert alert-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo 'Username '.$username.' Anda Sudah digunakan Account lain';
				echo "</div>";
			}
	
			echo '<div class="col-md-7 col-md-offset-3 alert alert-danger alert-dismissable">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo 'Maaf Anda Gagal Membuat Account, Ulangi langkah kembali';
			echo '</div>';

				
		}

	}
?>
