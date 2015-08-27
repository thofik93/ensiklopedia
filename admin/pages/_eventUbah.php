<?php
	if (isset($_POST['_ubahEvent']))
	{	// untuk mengubah informasi event
		$tanggal 		  = date('Y-m-d');
		$id 	 		  = $_POST['kd_event'];
		$nama_event 	  = ucwords(strtolower(clear_masukan($_POST['nama_event'])));
		// mendapatkan file photo
		$photo 			  = $_FILES['photo']['tmp_name'];
		$nama_photo 	  = $_FILES['photo']['name'];
		$photo_fix_name   = $tanggal.'_'.$nama_photo;
		$direktori 		  = "../images/event/$photo_fix_name";

		$alamat 		  = ucwords(strtolower($_POST['alamat']));
		$tanggal_mulai 	  = date('Y-m-d', strtotime($_POST['tanggal_mulai']));
		$tanggal_berakhir = date('Y-m-d', strtotime($_POST['tanggal_berakhir']));
		$info_event   	  = $_POST['info_event'];

		if (!empty($photo))
		{
			// untuk mengubah data event
			// jika file photo tidak kosong

			move_uploaded_file($photo, $direktori);

			$query  = "UPDATE 
						 event
					   SET 
					   	 nama_event 		= '$nama_event',
					   	 photo 				= '$photo_fix_name',
					   	 alamat 	  		= '$alamat',
					   	 tanggal_mulai		= '$tanggal_mulai',
					   	 tanggal_berakhir 	= '$tanggal_berakhir',
					   	 isi 				= '$info_event'
					   WHERE 
					     kd_event 			= '$id'";
			$result = mysqli_query($conn, $query);
			
			if ($result === TRUE) 
			{
				// untuk menghapus file photo gambar yang lama
				if (array_key_exists('delete_file', $_POST))
				{
					$filename = $_POST['delete_file']; // tampung path photo

					if (file_exists($filename))
					{
						unlink($filename); // delete file dari path
						// redirect ke halaman tampil event
						echo '<script>window.location="?page=tampil_event"</script>';
					}
					else
					{
						echo 'Tidak dapat menghapus ' . $filename . ', file tidak ada';
					}
				}
			}
		}
		else
		{
			// untuk mengubah data event
			// jika file photo kosong

			$query  = "UPDATE 
						 event
					   SET 
					     nama_event 		= '$nama_event',
					   	 alamat 	  		= '$alamat',
					   	 tanggal_mulai		= '$tanggal_mulai',
					   	 tanggal_berakhir 	= '$tanggal_berakhir',
					   	 isi 				= '$info_event'
					   WHERE 
					     kd_event 			= '$id'";
			$result = mysqli_query($conn, $query);
			
			if ($result === TRUE) 
			{
				echo '<script>window.location="?page=tampil_event"</script>';
			}
		}

	}
	else
	{
		// untuk menampilkan data event yang ingin di hapus

		$id     = $_GET['id']; // mendapatkan kd_event
		$query  = "SELECT 
					 * 
				   FROM 
				     event 
				   WHERE 
				     sha1(kd_event) = '$id'";
		$result = mysqli_query($conn, $query);
		$row    = mysqli_fetch_assoc($result);
	}
?>
