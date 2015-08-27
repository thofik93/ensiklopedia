<?php
	if (isset($_POST['_simpan']))
	{
		// mendapatkan id (kd_admin)
		// dari fungsi kode_admin()
		$id = kode_admin();

		// mendapatkan variabel yang dikirim lewat method post
		$nama_depan  	= ucfirst(strtolower(clear_masukan($_POST['nama_depan'])));
		$nama_tengah 	= ucfirst(strtolower(clear_masukan($_POST['nama_tengah'])));
		$nama_belakang	= ucfirst(strtolower(clear_masukan($_POST['nama_belakang'])));
		$gender 		= $_POST['gender'];
		$alamat 		= clear_masukan($_POST['alamat']);
		$phone 			= clear_masukan($_POST['phone']);
		$email 			= clear_masukan($_POST['email']);
		// photo
		$photo   	    = $_FILES['photo']['tmp_name'];
		$photo_name     = $_FILES['photo']['name'];
		$photo_fix_name = $id.$photo_name;
		$direktori 		= "../images/admin/$photo_fix_name";
		//user_login
		$username       = clear_masukan($_POST['username']);
		$password 	    = md5(clear_masukan($_POST['password']));
		$hak_akses      = $_POST['admin'];

		// jika foto tersedia maka lakukan perintah dibawah
		if (!empty($photo))
		{
			move_uploaded_file($photo, $direktori);

			$query_1 = "INSERT INTO admin  (id_admin,
											 nama_depan,
											 nama_tengah,
											 nama_belakang,
											 jenkel,
											 alamat,
											 phone,
											 email,
											 photo)
									VALUES  ('$id',
											 '$nama_depan',
											 '$nama_tengah',
											 '$nama_belakang',
											 '$gender',
											 '$alamat',
											 '$phone',
											 '$email',
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
			
			// redirect ke page admin
			//echo '<script>window.location="?page=admin"</script>';
		}
	} 
	elseif (isset($_GET['hapus']))
	{
		// menghapus data admin
		$id     = $_GET['id']; // mendapatkan id_admin
		
		// query untuk menghapus data dalam tabel admin
		$query  = "DELETE FROM 
					 admin 
				   WHERE 
				     sha1(id_admin) = '$id'";
		$rs     = mysqli_query($conn, $query);

		// query untuk menghapus data dalam tabel user_login
		$query  = "DELETE FROM 
					user_login 
				   WHERE 
				     sha1(users) = '$id'";
		$rs     = mysqli_query($conn, $query);

		if ($rs) 
		{
			echo "<script>window.location='?page=admin'</script>";
		}

	}
?>
