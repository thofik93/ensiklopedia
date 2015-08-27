<?php
	if(isset($_POST['button']))
	{
		if ($_POST['new_password'] == $_POST['password_ulang'])
		{
			$scl = sprintf("SELECT * FROM user_login WHERE username='%s' AND password='%s'",$_SESSION['username'],md5($_POST['old_password']));

			$ql = mysqli_query($conn, $scl);
			$rcl = mysqli_num_rows($ql);
			if($rcl == 1)
			{
				$sc2 = sprintf("UPDATE user_login SET password='%s' WHERE username='%s'",md5($_POST['new_password']),$_SESSION['username']);
				$q2 = mysqli_query($conn, $sc2);
				if($q2)
				{
					echo "<script>alert('Password berhasil diubah, silahkan login kembali nanti');window.location='index.php'</script>";
				}
			} else {
				// memberikan alert karna password lama yang dimasukan
				// tidak sesuai data yang di database
				echo "<div class='col-md-8 col-md-offset-2 alert alert-danger alert-dismissable'>
				      <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  Verifikasi Password Lama Salah, ulangi kembali!
					 </div>";
			}
		}
		else 
		{
			$error = TRUE;
		}
	}
?>
