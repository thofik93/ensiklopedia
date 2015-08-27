<?php
	if (isset($_POST['answer_attemp'])) {
		// jawaban dari user
		$jwb1 = strtolower(clear_masukan($_POST['jawaban']));
		// jawaban yang di dapat dari database
		$jwb2 = strtolower($_SESSION['jawaban']);

		// jika jawaban yang didari user dan jawaban dari database sama
		// sebaliknya berikan pesan error bernilai true
		if ($jwb1 == $jwb2) 
		{
			// mendapatkan data password baru dan password baru yg diulang
			// simpan didalam variabel yang berbeda
			$pswd1 = clear_masukan($_POST['password_baru']);
			$pswd2 = clear_masukan($_POST['password_ulang']);

			// jika masukan password baru dan passowrd baru yang diulang sama
			// maka update password lama dengan pasword baru yang dimasukan user
			// sebaliknya berikan pesan error bernilai true
			if ($pswd1 == $pswd2)
			{
				$password  = md5($pswd1);
				$id_member = $_COOKIE['id_member'];

				$query  = "UPDATE user_login 
						   SET password = '$password'
						   WHERE users = '$id_member'";
				$result = mysqli_query($conn, $query); // jalankan query

				// pesan berhasil karena data password berhasil diubah
				echo '<div class="col-md-6 col-md-offset-3 alert alert-info alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo 'Password lama telah berhasil diubah, klik <a href="login.php" class="text-success">Login Page</a> untuk ke Account Anda';
				echo '</div';
			} 
			else 
			{
				$error_pswd = TRUE;
			}
		} 
		else 
		{
			$error_jwb = TRUE;
		}
					
	}
?>
