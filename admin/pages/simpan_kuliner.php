<?php
	require_once '_connect.php';
	require_once '../fungsi/functions.php';

	if (isset($_POST['_simpanKuliner']))
	{
		// $_POST Array Kuliner dari page kuliner
		$username 		= $_SESSION['username'];
		$kd_kuliner 	= kode_kuliner(); // kode kuliner otomatis
		$nama_kuliner 	= ucwords(strtolower(clear_masukan($_POST['nama_kuliner'])));
		$kategori   	= clear_masukan($_POST['kategori']);
		$daerah 		= clear_masukan($_POST['daerah']);
		$pembuat 		= 'admin';
		$tanggal 		= gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);
		// photo
		$photo			= $_FILES['photo']['tmp_name'];
		$nama_photo 	= $_FILES['photo']['name'];
		$photo_fix_name = $kd_kuliner . '_' . $nama_photo;
		$direktori 		= "../images/kuliner/$photo_fix_name";

		$info_kuliner   = $_POST['info_kuliner'];
		$alamat 		= clear_masukan($_POST['alamat']);
		$latitude 		= clear_masukan($_POST['latitude']);
		$longtitude 	= clear_masukan($_POST['longitude']);

		// jika variabel photo tidak kosong, maka ke langkah selanjutnya
		if (!empty($photo))
		{
			// kirim photo kuliner ke direktori 'images/kuliner/nama_photo'
			move_uploaded_file($photo, $direktori);

			// query sql untuk memasukan informasi kuliner kedalam tabel kuliner
			$query  = "INSERT INTO kuliner (kd_kuliner,
											nama_kuliner,
										    kategori_masakan,
										    daerah,
										    pembuat,
										    tanggal,
										    photo,
										    isi,
										    alamat,
										    latitude,
										    longtitude,
										    user_pembuat)
								  VALUES  ('$kd_kuliner',
								  		   '$nama_kuliner',
								  		   '$kategori',
								  		   '$daerah',
								  		   '$pembuat',
								  		   '$tanggal',
								  		   '$photo_fix_name',
								  		   '$info_kuliner',
								  		   '$alamat',
								  		   '$latitude',
								  		   '$longtitude',
								  		   '$username')";
			$result = mysqli_query($conn, $query);

			// jika $result bernilai false , maka berikan pesan kesalahan
			// jika sebaliknya redirect menuju halaman tampil_kuliner.php
			if (!$result) 
			{ 
				die ('Database Access Failed ' . mysqli_error($conn));
			}
			else 
			{
				echo "<script>window.location='?page=tampil_kuliner'</script>";
			}

		}
	}
?>
