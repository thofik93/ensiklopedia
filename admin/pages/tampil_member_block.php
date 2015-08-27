<?php
	/* 
	catatan : jika paging member_blok diperlukan hapus comment ini!!!
	pagination variabel
	$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
	$per_hal 	= 10;
	$adjacents  = 5;
	$offset 	= ($hal - 1) * $per_hal;
	$reload 	= '?page=member';

	// cari berapa bantak jumlah data
	$jml_data 		= "SELECT COUNT(*) AS numrows FROM member";
	$count_query 	= mysqli_query($conn, $jml_data);

	$row 	 	= mysqli_fetch_assoc($count_query);
	$numrows 	= $row['numrows']; // dapatkan jumlah data
	$total_hal  = ceil($numrows / $per_hal);
	*/

	$no 	= 1;
	$query  = 'SELECT 
				 member.id_member,
				 member.nama_depan,
				 member.nama_tengah,
				 member.nama_belakang, 
				 member.email,
				 member_block.username,
				 member_block.tanggal_blok 
			   FROM 
			     member, member_block 
			   WHERE 
			     member.id_member = member_block.users
			   GROUP BY
			     (member_block.username)
			   ORDER BY 
			     nama_depan ASC';
	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result))
	{
		extract($row);

		echo '<tr>';
		echo '<td>' . $no++ . '</td>';
		echo '<td>' . date('d-m-Y', strtotime($tanggal_blok)) . '</td>';
		echo '<td>';
		echo $nama_depan . '&nbsp;';
		echo $nama_tengah . '&nbsp;';
		echo $nama_belakang;
		echo '</td>';
		echo '<td>' . $email . '</td>';
		echo '<td>' . $username . '</td>';
		// tampil unblock
		echo '<td>';
		echo '<a href="?page=member&unblock=1&id=' . sha1($id_member) . '"';
		echo ' class="btn btn-warning btn-sm"';
		echo ' onclick="return confirm(\'Anda Yakin ingin unblock member ' . $nama_depan . ' ?\');">';
		echo 'Unblock';
		echo '</a>';
		echo '</td>';
		echo '</tr>';
	}
?>
