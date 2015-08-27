<?php

	if(isset($_POST['_kategori']))
	{
		$kd_kategori   = kode_kategori();
		$nama_kategori = ucfirst(clear_masukan($_POST['nama_kategori']));

		$query  = "INSERT INTO kategori 
					(kd_kategori, nama_kategori)
				  VALUES 
				  	('$kd_kategori', '$nama_kategori')";
		$result = mysqli_query($conn, $query);

		echo '<script>window.location="?page=kategori"</script>';
		
	}
	elseif (isset($_GET['hapus']))
	{
		$id = $_GET['id'];

		$query  = "DELETE FROM kategori WHERE sha1(kd_kategori) = '$id'";
		$result = mysqli_query($conn, $query);

		echo '<script>window.location="?page=kategori"</script>';

	}
?>
