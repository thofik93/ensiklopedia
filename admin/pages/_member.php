<?php
	if (isset($_GET['block']))
	{
		$id = $_GET['id'];

		// menampilkan data login member yang ingin diblock
		$query  = "SELECT * FROM user_login WHERE sha1(users) = '$id'";
		$result = mysqli_query($conn, $query);
		$member = mysqli_fetch_assoc($result);

		// memasukan data login member yang ingin diblok
		// ke dalam tabel member blok
		$tanggal_blok = date('Y-m-d'); // tanggal ketika member diblok

		$query  = "INSERT INTO member_block (username,
											password,
											hak_akses,
											users,
											tanggal_blok)
									VALUES ('$member[username]',
											'$member[password]',
											'$member[hak_akses]',
											'$member[users]',
											'$tanggal_blok')";
		$block = mysqli_query($conn, $query);

		// jika proses pemindahan data login member berhasil
		// hapus data member dari tabel user_login
		if ($block === TRUE)
		{
			$query  = "DELETE FROM user_login WHERE sha1(users) = '$id'";
			$result = mysqli_query($conn, $query);
			// refresh halaman
			echo '<script>window.location="?page=member"</script>';
		}
	}
	elseif (isset($_GET['unblock'])) 
	{
		$id = $_GET['id'];

		// menampilkan data login member yang ingin diunblok
		// dari tabel member_block
		$query  = "SELECT * FROM member_block WHERE sha1(users) = '$id'";
		$result = mysqli_query($conn, $query);
		$member = mysqli_fetch_assoc($result);

		// memasukan data login member yang ingin unblock
		// ke dalam tabel user_login

		$query  = "INSERT INTO user_login ( username,
											password,
											hak_akses,
											users)
									VALUES ('$member[username]',
											'$member[password]',
											'$member[hak_akses]',
											'$member[users]')";
		$unblock = mysqli_query($conn, $query);

		// jika proses pemindahan data login member berhasil
		// hapus data member dari tabel member_block
		if ($unblock === TRUE)
		{
			$query  = "DELETE FROM member_block WHERE sha1(users) = '$id'";
			$result = mysqli_query($conn, $query);
			// refresh halaman
			echo '<script>window.location="?page=member"</script>';
		}
	}
	elseif (isset($_GET['hapus']))
	{
		$id = $_GET['id'];

		$query  = "DELETE FROM user_login WHERE sha1(users) = '$id'";
		$result = mysqli_query($conn, $query);

		if ($result === TRUE)
		{
			// refresh halaman
			echo '<script>window.location="?page=member"</script>';
		}
	}
?>
