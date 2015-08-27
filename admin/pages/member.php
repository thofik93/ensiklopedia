<link rel="stylesheet" type="text/css" href="css/paging.css" />

<table class="table table-bordered col-md-4">
	<legend>Informasi Data Member</legend>
	<thead>
		<tr>
			<th>No</th>
			<th>Id Member</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>Username</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			require_once 'tampil_member.php';
		?>
	</tbody>
</table>
<?php
	echo paginate($reload, $hal, $total_hal, $adjacents);
?>

<table class="table table-bordered col-md-4">
	<legend>Informasi Data Member yang Diblock</legend>
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Blok</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>Username</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			require_once 'tampil_member_block.php';
		?>
	</tbody>
</table>

<?php
	require_once '_member.php';
?>
