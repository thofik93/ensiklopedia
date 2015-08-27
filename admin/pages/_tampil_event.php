<?php
	// menghapus informasi event
	if (isset($_GET['hapus']) && $_GET['hapus'] == 1)
	{
		$id 	= $_GET['id']; // kode event dengan enkripsi sha1

		if (array_key_exists('hapus', $_GET))
		{
			// query untuk mendapatkan nama dari path photo
			$query  = "SELECT 
						photo 
					   FROM 
					   	event 
					   WHERE 
					   	sha1(kd_event) = '$id'";
			$result = mysqli_query($conn, $query);
			$row 	= mysqli_fetch_assoc($result);
			
			// tampung path file photo
			$filename = "../images/event/$row[photo]";

			// hapus jika file photo ada dalam path
			if (file_exists($filename))
			{
				unlink($filename); // delete file photo dari path
			}
			else
			{
				echo "Tidak dapat menghapus " . $filename . ", file tidak ada";
			}
		}

		$query  = "DELETE FROM 
					event
				   WHERE 
				   	sha1(kd_event) = '$id'";
		$result = mysqli_query($conn, $query);

		if ($result === TRUE)
		{
			// redirect
			echo '<script>window.location="?page=tampil_event"</script>';
		}
	}
	else 
	{
		// untuk menampilkan informasi event
		// pagination variabel
		$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
		$per_hal 	= 10;
		$adjacents  = 5;
		$offset 	= ($hal - 1) * $per_hal;
		$reload 	= '?page=tampil_event';

		// cari berapa bantak jumlah data
		$jml_data 		= "SELECT 
							 COUNT(*) 
						   AS 
						     numrows 
						   FROM 
						     event";
		$count_query 	= mysqli_query($conn, $jml_data);

		$row 	 	= mysqli_fetch_assoc($count_query);
		$numrows 	= $row['numrows']; // dapatkan jumlah data
		$total_hal  = ceil($numrows / $per_hal);

		// jalankan query untuk menampilkan data per blok $offset dan $per_hal
		$query 	= "SELECT 
					 * 
				   FROM 
				     event 
				   ORDER BY 
				     kd_event DESC
				   LIMIT 
				     $offset, $per_hal";
		$result = mysqli_query($conn, $query);

		while ($row = mysqli_fetch_assoc($result))
		{
			extract($row);

			echo '<tr>';
			echo '<td>' . $nama_event . '</td>';
			echo '<td>';
			echo '<img src="../images/event/' . $photo . '" class="col-md-12 photo" />';
			echo '</td>';
			echo '<td>' . $alamat . '</td>';
			echo '<td>';
			echo '<p>Dari Tgl : ' . date('d-m-Y', strtotime($tanggal_mulai)) . '</p>'; 
			echo '<p>Sampai Tgl : ' . date('d-m-Y', strtotime($tanggal_berakhir)) . '</p>';
			echo '</td>';
			echo '<td>' . substr(strip_tags($isi, '<p>'), 0, 100) . '...</td>';
			echo '<td>';
			echo '<a href="?page=eventubah&ubah=1&id=' . sha1($kd_event) . '" class="btn btn-info">';
			echo 'Ubah';
			echo '</a> - ';
			echo '<a href="?page=tampil_event&hapus=1&id=' . sha1($kd_event) . '" class="btn btn-danger"';
			echo ' onclick="return confirm (\'Apakah anda yakin ingin menghapus ' . $nama_event . ' ? \');">';
			echo 'Hapus';
			echo '</a>';
		}

	}
?>
