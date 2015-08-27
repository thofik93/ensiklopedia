
<?php
	require_once '_kategoriubah.php';
?>
<fieldset class="col-md-6 col-md-offset-3">
	<form method="post" class="form-horizontal bg-success" role="form" action="?cat=admin&page=kategoriubah">
		<legend class="text-center">Form Ubah Kategori</legend>
		<div class="form-group">
			<label for="kategori" class="col-md-2 col-md-offset-1">Kategori:</label>
			<div class="col-md-5">
				<input type="text" name ="nama_kategori" class="form-control" id="kategori" value="<?=$row['nama_kategori'];?>">
				<input type="hidden" name ="kd_kategori" value="<?=sha1($row['kd_kategori']);?>">
			</div>
		</div>
		<button name="_ubahkategori" class="btn btn-primary col-md-offset-1" style="margin-bottom: 2%">Simpan</button>
	</form>
</fieldset>
