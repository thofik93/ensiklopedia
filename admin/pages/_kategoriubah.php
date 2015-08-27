<?php
	if (isset($_GET['ubah']))
	{
		$id = $_GET['id'];

		$query  = "SELECT * FROM kategori WHERE sha1(kd_kategori) = '$id'";
		$result = mysqli_query($conn, $query);
		$row    = mysqli_fetch_assoc($result);

		if(!$result) die ('Database Access Failed ' . mysqli_error($conn));
	}
	elseif (isset($_POST['_ubahkategori']))
	{
		$id       = $_POST['kd_kategori']; 
		$kategori = ucfirst($_POST['nama_kategori']);

		$query  = "UPDATE kategori SET nama_kategori = '$kategori' WHERE sha1(kd_kategori)='$id'";
		$result = mysqli_query($conn, $query);

		if(!$result) die ('Database Access Failed ' . mysqli_error($conn));
		echo "<script>window.location='?page=kategori'</script>";
	}

?>
