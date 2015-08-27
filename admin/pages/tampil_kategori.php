<?php
	// pagination variabel
	$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
	$per_hal 	= 10;
	$adjacents  = 5;
	$offset 	= ($hal - 1) * $per_hal;
	$reload 	= '?page=kategori';

	// cari berapa bantak jumlah data
	$jml_data 		= 'SELECT 
					     COUNT(*) 
					   AS 
					     numrows 
					   FROM 
					     kategori';
	$count_query 	= mysqli_query($conn, $jml_data);

	$row 	 	= mysqli_fetch_assoc($count_query);
	$numrows 	= $row['numrows']; // dapatkan jumlah data
	$total_hal  = ceil($numrows / $per_hal);

	$query  = "SELECT 
				 * 
			   FROM 
			     kategori
			   ORDER BY 
			     nama_kategori 
			   LIMIT 
			     $offset, $per_hal";
	$result = mysqli_query($conn, $query);

	$no 	= (($hal - 1) * $per_hal + 1);
	while($row = mysqli_fetch_assoc($result))
	{
		extract($row);

		echo '<tr>';
		echo '<td>' . $no++ . '</td>';
		echo '<td>' . $nama_kategori . '</td>';
		echo '<td>';
		echo '<a href="?page=kategoriubah&ubah=1&id=' . sha1($kd_kategori) . '" class="btn btn-info btn-sm">';
		echo 'Ubah';
		echo '</a> - '; 
		echo '<a href="?page=kategori&hapus=1&id=' . sha1($kd_kategori) . '" class="btn btn-danger btn-sm"';
		echo ' onclick="return confirm(\'Anda yakin ingin menghapus kategori ' . $nama_kategori . '?\');">';
		echo 'Hapus';
		echo '</a>';
		echo '</td>';
		echo '</tr>';
	}
?>
