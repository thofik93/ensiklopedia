<?php
	if (isset($_GET['ubah']))
	{
		// untuk menampilkan data derah yang ingin diubah
		$id = $_GET['id'];

		$query  = "SELECT 
					 * 
				   FROM 
				     daerah 
				   WHERE 
				     sha1(kd_daerah) = '$id'";
		$result = mysqli_query($conn, $query);
		$row    = mysqli_fetch_assoc($result);
	}
	elseif (isset($_POST['_ubahdaerah']))
	{
		// untuk mengubah data daerah
		$id     = sha1($_POST['kd_daerah']); 
		$daerah = ucfirst($_POST['nama_daerah']);

		$query  = "UPDATE 
					 daerah 
				   SET 
				     nama_daerah = '$daerah' 
				   WHERE 
				     sha1(kd_daerah) = '$id'";
		$result = mysqli_query($conn, $query);

		echo "<script>window.location='?page=daerah'</script>";
	}

?>
