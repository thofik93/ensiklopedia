<?php
	if (isset($_POST['_daerah']))
	{
		// untuk measukan data daerah ke dalam tabel daerah
		$kd_daerah   = clear_masukan($_POST['kd_daerah']);
		$nama_daerah = ucfirst(clear_masukan($_POST['daerah']));

		$query  = "INSERT INTO 
					  daerah (kd_daerah, nama_daerah)
				  VALUES 
				  	  ('$kd_daerah', '$nama_daerah')";
		$result = mysqli_query($conn, $query);
		
		// refresh halaman
		echo "<script>window.location='?page=daerah'</script>";
	}
	elseif (isset($_GET['hapus'])) 
	{
		$kd_daerah = $_GET['id'];
		$query     = "DELETE FROM 
						daerah 
					  WHERE 
					  	sha1(kd_daerah) = '$kd_daerah'";
		$result    = mysqli_query($conn, $query);

		// refresh halaman
		echo "<script>window.location='?page=daerah'</script>";

	}
?>
