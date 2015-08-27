<?php
	if (isset($_POST['_simpanEvent']))
	{
		$tanggal 		  = date('Y-m-d'); // tanggal hari ini

		$kd_event		  = kode_event(); 			
		// mendapatkan variabel yang dikirim method POST 
		$nama_event 	  = ucwords(strtolower(clear_masukan($_POST['nama_event'])));
		// mendapatkan file photo
		$photo 			  = $_FILES['photo']['tmp_name'];
		$nama_photo 	  = $_FILES['photo']['name'];
		$photo_fix_name   = $tanggal.'_'.$nama_photo;
		$direktori 		  = "../images/event/$photo_fix_name";

		$alamat  		  = clear_masukan($_POST['alamat']);
		$tanggal_mulai    = date("Y-m-d", strtotime($_POST['tanggal_mulai']));
		$tanggal_berakhir = date("Y-m-d", strtotime($_POST['tanggal_berakhir']));
		$info_event       = $_POST['info_event'];

		// jika file photo tidak kosong maka jalankan perintah berikut
		if (!empty($photo))
		{
			move_uploaded_file($photo, $direktori);

			// query sql untuk memasukan informasi kedalam tabel event
			$query  = "INSERT INTO event (kd_event,
										  nama_event,
										  photo,
										  alamat,
										  tanggal_mulai,
										  tanggal_berakhir,
										  isi)
								VALUES   ('$kd_event',
										  '$nama_event',
										  '$photo_fix_name',
										  '$alamat',
										  '$tanggal_mulai',
										  '$tanggal_berakhir',
										  '$info_event')";
			$result = mysqli_query($conn, $query);
			// error dan redirect
			if ($result === TRUE)
			{
				echo "<script>window.location='?page=tampil_event'</script>";
			}	
		}
	}
?>
