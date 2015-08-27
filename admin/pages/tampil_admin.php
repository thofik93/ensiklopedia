<?php
	// query untuk menampilkan data admin 
	$query  = "SELECT
				 admin.id_admin, 
				 admin.nama_depan,
				 admin.nama_tengah,
				 admin.nama_belakang,
				 admin.phone,
				 admin.email,
				 user_login.username
			   FROM 
			     admin, user_login
			   WHERE 
			     admin.id_admin = user_login.users
			   GROUP BY
			     (user_login.username)
			   ORDER BY 
			     nama_depan ASC";
	$result = mysqli_query($conn, $query);

	$no = 1; // nomor data
	while ($row = mysqli_fetch_assoc($result))
	{
		extract($row);

		echo '<tr><td>' . $no++ . '</td>';
		echo '<td>' . $nama_depan . '&nbsp;' . $nama_tengah . '&nbsp;' . $nama_belakang . '</td>';
		echo '<td>' . $phone . '</td>';
		echo '<td>' . $email . '</td>';
		echo '<td>' . $username . '</td>';
		echo '<td>';
		echo '<a href="?page=admin&hapus=1&id=' . sha1($id_admin) . '"';
		echo 'class="btn btn-danger btn-sm"';
		echo 'onclick="return confirm(\'Anda Yakin ingin menghapus admin ' . $nama_depan . ' ?\');">';
		echo 'Hapus';
		echo '</a>';
		echo '</td></tr>';
	}
?>
