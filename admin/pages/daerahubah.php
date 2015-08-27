<?php
	require_once '_daerahubah.php';
?>
<fieldset class="col-md-6 col-md-offset-3 col-md">
	<form method="post" class="form-horizontal bg-success" role="form" action="?cat=admin&page=daerahubah">
		<legend class="text-center">Form Ubah Daerah</legend>

		<div class="form-group">
			<label for="kdDaerah" class="col-md-3 col-md-offset-1">Kode Daerah:</label>
			<div class="col-md-5">
				<input type="text" name ="kd_daerah" class="form-control" id="kdDaerah" value="<?=$row['kd_daerah'];?>">
			</div>
		</div><!-- form-group -->

		<div class="form-group">
			<label for="namaDaerah" class="col-md-3 col-md-offset-1">Nama Daerah:</label>
			<div class="col-md-5">
				<input type="text" name ="nama_daerah" class="form-control" id="namaDaerah" value="<?=$row['nama_daerah'];?>">
			</div>
		</div><!-- form-group -->

		<button name="_ubahdaerah" class="btn btn-primary col-md-offset-1" style="margin-bottom: 2%">Simpan</button>
	</form>
</fieldset>
