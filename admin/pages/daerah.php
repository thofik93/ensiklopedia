<fieldset class="col-md-6 col-md-offset-3" style="margin-bottom: 5%">
	<form method="post" class="form-horizontal bg-success" role="form">
		<legend class="text-center">Form Kelola Daerah</legend>
		<div class="form-group">
			<label for="kdDaerah" class="col-md-3 col-md-offset-1">Kode Daerah:</label>
			<div class="col-md-6">
				<input type="text" name ="kd_daerah" class="form-control" id="kdDaerah" placeholder="Enter Kode Daerah" maxlength="5" required>
			</div>
		</div>

		<div class="form-group">
			<label for="daerah" class="col-md-3 col-md-offset-1">Daerah:</label>
			<div class="col-md-6">
				<input type="text" name ="daerah" class="form-control" id="daerah" placeholder="Enter Daerah" required>
			</div>
		</div>
		<button type="submit" name="_daerah" class="btn btn-primary col-md-offset-1" style="margin-bottom: 2%">Simpan</button>
		<button type="reset" name="reset" class="btn btn-danger" style="margin-bottom: 2%">Reset</button>
	</form>
</fieldset>

<!-- Lihat Data Daerah -->
<div class="col-md-8 col-md-offset-2">
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>Kode Daerah</th>
			<th>Nama Daerah</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php
				require_once 'tampil_daerah.php';
			?>
		</tbody>
	</table>
</div>
<?php
	require_once '_daerah.php';
?>


