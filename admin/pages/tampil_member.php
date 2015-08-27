<?php
	// pagination variabel
	$hal 		= (isset($_GET['hal']) && !empty($_GET['hal'])) ? $_GET['hal']:1;
	$per_hal 	= 10;
	$adjacents  = 5;
	$offset 	= ($hal - 1) * $per_hal;
	$reload 	= '?page=member';

	// cari berapa bantak jumlah data
	$jml_data 		= 'SELECT COUNT(*) AS numrows FROM member';
	$count_query 	= mysqli_query($conn, $jml_data);

	$row 	 	= mysqli_fetch_assoc($count_query);
	$numrows 	= $row['numrows']; // dapatkan jumlah data
	$total_hal  = ceil($numrows / $per_hal);

	$query  = "SELECT 
				 member.id_member,
				 member.nama_depan,
				 member.nama_tengah,
				 member.nama_belakang, 
				 member.email,
				 user_login.username 
			   FROM 
			     member, user_login 
			   WHERE 
			     member.id_member = user_login.users
			   GROUP BY
			     (user_login.username)
			   ORDER BY 
			     nama_depan ASC
			   LIMIT 
			     $offset, $per_hal";

	$result = mysqli_query($conn, $query);

	$no 	= 1;
	while($row = mysqli_fetch_assoc($result))
	{
		extract($row);

		echo '<tr>';
		echo '<td>' . $no++ . '</td>';
		echo '<td>' . $id_member . '</td>';
		echo '<td>';
		echo $nama_depan . '&nbsp;';
		echo $nama_tengah . '&nbsp;';
		echo $nama_belakang;
		echo '</td>';
		echo '<td>' . $email . '</td>';
		echo '<td>' . $username . '</td>';
		// tampil tombol block dan hapus
		echo '<td>';
		// tombol block
		echo '<a href="?page=member&block=1&id=' . sha1($id_member) . '"';
		echo 'class="btn btn-warning btn-sm"';
		echo 'onclick="return confirm(\'Anda Yakin ingin memblock member ' . $nama_depan . ' ?\');">';
		echo 'Block';
		echo '</a> - ';
		// tombol hapus
		echo '<a href="?page=member&hapus=1&id=' . sha1($id_member) . '"';
		echo ' class="btn btn-danger btn-sm"';
		echo ' onclick="return confirm(\'Anda Yakin ingin menghapus member ' . $nama_depan . '?\');">';
		echo 'Hapus';
		echo '</a>';
		echo '</td>';
		echo '</tr>';

	}
?>
