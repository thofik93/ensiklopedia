<?php
	session_start();
	require_once '_connect.php';
	require_once 'fungsi/functions.php';

	if(isset($_POST['login_attemp']))
	{
		// membersikan data masukan username dan password
		$username = clear_masukan($_POST['username']);
		$password = clear_masukan($_POST['password']);

		// query untuk menlihat data username dan password apakah ada
		$query  = sprintf("SELECT * FROM user_login WHERE username = '%s' AND password = '%s'", $username, md5($password));
		$result = mysqli_query($conn, $query);

		$row 	= mysqli_fetch_assoc($result);
		$jml 	= mysqli_num_rows($result); // cek berapa banyak baris data

		// jika baris data bernilai === 1
		if ($jml === 1) 
		{
			// simpan data hak_akses, dan username
			// yang didapat dari database kedalam variabel SESSION
			$_SESSION['hak_akses'] = $row['hak_akses'];
			$_SESSION['username']  = $row['username'];

			// jika hak_akses bernilai admin, redirect ke halaman admin
			// sebaliknya jika hak_akses bernilai member, redirect ke halaman member
			if ($row['hak_akses'] == 'admin')
			{
				echo "<script>window.location='admin/index.php'</script>";
			}
			else
			{
				echo "<script>window.location='member/index.php'</script>";
			}
		}
		else // jika baris data bernilai != 1, maka berikan pesan kesalhan
		{
			echo '<div class="col-md-3 col-md-offset-8 alert alert-danger alert-dismissable">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo 'Password atau Username Anda Salah';
			echo '</div>';
		}
		
		mysqli_close($conn);
	}
?>
