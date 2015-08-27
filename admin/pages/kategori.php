<link rel="stylesheet" type="text/css" href="css/paging.css" />

<fieldset class="col-md-6 col-md-offset-3" style="margin-bottom: 5%">
	<form method="post" class="form-horizontal bg-success" role="form">
		<legend class="text-center">Form Tambah Kategori</legend>
		<div class="form-group">
			<label for="kategori" class="col-md-2 col-md-offset-1">Kategori:</label>
			<div class="col-md-6">
				<input type="text" name ="nama_kategori" class="form-control" id="kategori" placeholder="Enter Kategori" required>
			</div>
		</div>

		<button type="submit" name="_kategori" class="btn btn-primary  col-md-offset-1" style="margin-bottom: 2%">Simpan</button>
		<button type="reset" name="reset" class="btn btn-danger" style="margin-bottom: 2%">Reset</button>
	</form>
</fieldset>

<?php require_once '_kategori.php'; ?>

<!-- Lihat Data Kategori -->
<div class="col-md-8 col-md-offset-2">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php require_once 'tampil_kategori.php'; ?>
		</tbody>
	</table>
	<?php
		echo paginate($reload, $hal, $total_hal, $adjacents);
	?>
</div>
