<?php
	if (isset($_GET['hapus']))
	{
		// untuk menghapus  informasi kuliner
		// yang diinginkan
		
		$id = $_GET['id']; // kode kuliner dengan enkripsi sha1
		
		if (array_key_exists('hapus', $_GET))
		{
			// query untuk mendapatkan nama dari path photo
			$query  = "SELECT 
						photo 
					   FROM 
					   	kuliner 
					   WHERE 
					   	sha1(kd_kuliner) = '$id'";
			$result = mysqli_query($conn, $query);
			$row 	= mysqli_fetch_assoc($result);
			
			// tampung path file photo
			$filename = "../images/kuliner/$row[photo]";

			// hapus jika file photo ada dalam path
			if (file_exists($filename))
			{
				unlink($filename); // delete file photo dari path
			}
			else
			{
				echo 'Tidak dapat menghapus ' . $filename . ', file tidak ada';
			}
		}
		
		// query untuk menghapus data kuliner
		$query  = "DELETE FROM 
					kuliner 
				  WHERE 
				  	sha1(kd_kuliner) = '$id'";
		$result = mysqli_query($conn, $query);
		
		if ($result === TRUE) 
		{
			// refresh halaman
			echo '<script>window.location="?page=tampil_kuliner"</script>';
		}
	}
	else 
	{
		// untuk menampilkan semua informasi kuliner dari tabel kuliner
		
		// pagination variabel
		$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
		$per_hal 	= 10;
		$adjacents  = 5;
		$offset 	= ($hal - 1) * $per_hal;
		$reload 	= '?page=tampil_kuliner';

		// cari berapa bantak jumlah data
		$jml_data 		= 'SELECT 
						   	 COUNT(*) 
						   AS 
						     numrows 
						   FROM 
						     kuliner';

		$count_query 	= mysqli_query($conn, $jml_data);


		$row 	 	= mysqli_fetch_assoc($count_query);
		$numrows 	= $row['numrows']; // dapatkan jumlah data
		$total_hal  = ceil($numrows / $per_hal);

		// jalankan query untuk menampilkan data per blok $offset dan $per_hal
		$query 	= "SELECT 
					 kuliner.kd_kuliner,
					 kuliner.nama_kuliner, 
					 kategori.nama_kategori, 
					 daerah.nama_daerah,
					 kuliner.photo,
					 kuliner.info_kuliner,
					 kuliner.alamat_kuliner,
					 kuliner.user_pembuat,
					 kuliner.latitude,
					 kuliner.longitude
				   FROM 
				     kuliner, kategori, daerah
				   WHERE 
				     kategori.kd_kategori = kuliner.kategori_masakan
				   AND  
				     daerah.kd_daerah = kuliner.daerah
				   GROUP BY 
				     (kuliner.kd_kuliner)
				   ORDER BY 
				     tanggal DESC
				   LIMIT 
				     $offset, $per_hal";
		$result = mysqli_query($conn, $query);

		$no = (($hal - 1) * $per_hal + 1);
		
		while ($row = mysqli_fetch_assoc($result))
		{
			extract($row);

			echo '<tr>';
			echo '<td>';
			echo $no++;
			echo '</td>';
			echo '<td>';
			echo '<p>' . $nama_kuliner .'</p>';
			echo '<p>Username : <strong>' . $user_pembuat . '</strong></p>'; 
			echo '</td>';
			echo '<td>' . $nama_kategori . '</td>';
			echo '<td>' . $nama_daerah .'</td>';
			echo '<td>';
			echo '<img src="../images/kuliner/' . $photo. '" class="col-md-12 photo" />';
			echo '</td>';
			echo '<td>' . substr($info_kuliner, 0, 100) . '...</td>';
			echo '<td>';
			echo '<p>';
			echo 'Lang :<span class="btn btn-warning btn-xs">' . $latitude . '</span><br />';
			echo 'Long :<span class="btn btn-success btn-xs">' . $longitude . '</span>';
			echo '</p>';
			echo '<p>';
			echo '<strong>Alamat :</strong>' . $alamat_kuliner . '</p>';
			echo '</td>';
			echo '<td>';
			echo '<a href="?page=kulinerubah&ubah=1&id=' . sha1($kd_kuliner) . '" class="btn btn-info">';
			echo 'Ubah';
			echo '</a> - ';
			echo '<a href="?page=tampil_kuliner&hapus=1&id=' . sha1($kd_kuliner) . '" class="btn btn-danger"';
			echo ' onclick="return confirm(\'Apakah anda yakin ingin menghapus ' . $nama_kuliner . ' ?\');">';
			echo 'Hapus';
			echo '</a>';
			echo '<p></p>';
			echo '<a href="../index.php?page=detail&id=' . $kd_kuliner .'" class="btn btn-default col-md-12" target="_blank">';
			echo 'Lihat';
			echo '</a>';
			echo '</td>';
			echo '</tr>';
		}

	}
?>
