<?php
	if (isset($_POST['_ubahKuliner']))
	{
		// mendpatkan variabel dari array $_POST
		$id 			= $_POST['id'];
		$nama_kuliner 	= ucwords(strtolower(clear_masukan($_POST['nama_kuliner'])));
		$kategori 		= clear_masukan($_POST['kategori']);
		$daerah 		= clear_masukan($_POST['daerah']);
		$pembuat  		= $_SESSION['username'];

		// mendapatkan file photo
		$photo 			= $_FILES['photo']['tmp_name'];
		$nama_photo 	= $_FILES['photo']['name'];
		$photo_fix_name = $id . '_' . $nama_photo;
		$direktori 		= "../images/kuliner/$photo_fix_name";

		$info_kuliner 	= $_POST['info_kuliner'];
		$alamat 		= clear_masukan($_POST['alamat']);
		$latitude 		= clear_masukan($_POST['latitude']);
		$longtitude 	= clear_masukan($_POST['longtitude']);
		$date 			= gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);

		// untuk mengubah informasi kuliner
		// jika file photo tidak kosong
		if (!empty($photo))
		{
			// memindahkan file photo ke path
			move_uploaded_file($photo, $direktori);

			// query untuk mengupdate informasi kuliner
			$query  = "UPDATE 
						 kuliner 
				   	   SET 
				   	     nama_kuliner 		= '$nama_kuliner',
				       	 kategori_masakan	= '$kategori',
				         daerah 			= '$daerah',
				         photo 				= '$photo_fix_name',
				         isi 				= '$info_kuliner',
				         alamat 			= '$alamat',
				         latitude 			= '$latitude',
				         longtitude   		= '$longtitude',
				         user_pengubah		= '$pembuat',
				         tanggal_diubah   	= '$date'
				       WHERE 
				       	 kd_kuliner 		= '$id'";
			$result = mysqli_query($conn, $query);

			if ($result === TRUE)
			{
				// untuk menghapus file photo kuliner yang lama
				if (array_key_exists('delete_file', $_POST))
				{
					$filename = $_POST['delete_file']; // tampung path photo

					// jika file photo ada dalam path
					// maka hapus file tersebut
					if (file_exists($filename))
					{
						unlink($filename); // delete file photo dari path
					}
					else
					{
						echo "Tidak dapat menghapus " . $filename . ", file tidak ada";
					}
					// redirect ke halaman tampil kuliner
					echo "<script>window.location='?page=tampil_kuliner'</script>";
				}
			}

		}
		else
		{
			// untuk mengubah informasi kuliner
			// jika file photo kosong
			$query  = "UPDATE 
						 kuliner 
				   	   SET 
				   	     nama_kuliner 		= '$nama_kuliner',
				       	 kategori_masakan 	= '$kategori',
				         daerah 			= '$daerah',
				         isi 				= '$info_kuliner',
				         alamat 			= '$alamat',
				         latitude 			= '$latitude',
				         longtitude   		= '$longtitude',
				         user_pengubah		= '$pembuat',
				         tanggal_diubah   	= '$date'
				       WHERE 
				         kd_kuliner 		= '$id'";
			$result = mysqli_query($conn, $query);
			// redirect ke halaman tampil kuliner
			echo "<script>window.location='?page=tampil_kuliner'</script>";
		}

	}
	else 
	{	
		// untuk menampilkan infomrasi kuliner
		// yang ingin diubah

		$id = $_GET['id']; // kd_kuliner

		$query 	= "SELECT 
					 kd_kuliner,
					 nama_kuliner, 
					 kategori_masakan,
					 daerah,
					 photo,
					 isi,
					 alamat,
					 latitude,
					 longtitude 
				   FROM 
				     kuliner
				   WHERE 
				     sha1(kd_kuliner)='$id'";
		$result = mysqli_query($conn, $query);
		$row 	= mysqli_fetch_assoc($result);

	}
?>
