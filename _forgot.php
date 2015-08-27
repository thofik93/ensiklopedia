<?php		
	session_start();
	require_once '_connect.php';
	require_once 'fungsi/functions.php';

	if (isset($_POST['forgot_pswd']))
	{
		$email  = clear_masukan($_POST['email']); // email masukan user

		// query untuk melihat apakah email masukan user
		// ada di dalam database
		$query  = "SELECT 
					 id_member, pertanyaan, jawaban 
				   FROM 
				     member 
				   WHERE 
				     email = '$email'";
		$result = mysqli_query($conn, $query);
		$row    = mysqli_fetch_assoc($result);
		$num_row = mysqli_num_rows($result);

		/* Periksa apakah variabel num_row bernilai 1, 
		   jika iya set data yang berada di dalam database, 
		  jika tidak berikan pesan kesalahan 
		*/
		if ($num_row == 1)
		{
			// set cookie untuk pertanyaan dan id member
			setcookie('pertanyaan', $row['pertanyaan'], time() + 600);
			setcookie('id_member', $row['id_member'], time() + 600);
			// set session untuk jawaban
			$_SESSION['jawaban'] = $row['jawaban'];

			// redirect halaman menuju pemulihan.php
			echo "<script>window.location='pemulihan.php'</script>";
		}
		else
		{
			echo '<div class="col-md-6 col-md-offset-3 alert alert-danger alert-dismissable">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo 'Email yang anda berikan tidak valid';
			echo '</div>';
		}

	}
				
?>
