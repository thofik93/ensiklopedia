<?php
	// Tag HTML Table
	echo $headtable = <<<ENDHTML
	<link rel="stylesheet" type="text/css" href="css/paging.css" />
	<!-- view kritik dan saran -->
	<table class="table table-bordered col-md-8">
		<thead>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Pesan</th>
		</thead>
		<tbody>
ENDHTML;
	// pagination variabel
	$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
	$per_hal 	= 10;
	$adjacents  = 5;
	$offset 	= ($hal - 1) * $per_hal;
	$reload 	= '?page=kritik_saran';

	// cari berapa bantak jumlah data
	$jml_data 		= 'SELECT 
						 COUNT(*) 
					   AS 
					     numrows 
					   FROM 
					     kritik_saran';
	$count_query 	= mysqli_query($conn, $jml_data);

	$row 	 	= mysqli_fetch_assoc($count_query);
	$numrows 	= $row['numrows']; // dapatkan jumlah data
	$total_hal  = ceil($numrows / $per_hal);

	// jalankan query untuk menampilkan data per blok $offset dan $per_hal
	$query  = "SELECT 
				 * 
			   FROM 
			     kritik_saran 
			   LIMIT 
			     $offset, $per_hal";
	$result = mysqli_query($conn, $query);

	$no = (($hal - 1) * $per_hal + 1);
	while ($row = mysqli_fetch_assoc($result))
	{
		extract($row);

		echo '<tr>';
		echo '<td>' . $no++ . '</td>';
		echo '<td>' . $nama . '</td>';
		echo '<td>' . $alamat . '</td>';
		echo '<td>' . $email . '</td>';
		echo '<td>' . $pesan . '</td>';
		echo '</tr>';
	}

	echo '</tbody></table>';
	echo paginate($reload, $hal, $total_hal, $adjacents);

?>
