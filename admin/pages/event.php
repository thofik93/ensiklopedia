<fieldset class="col-md-10 col-md-offset-1 bg-success">
	<form method="post" action="?page=event" class="form-horizontal" role="form" enctype="multipart/form-data">
		<legend class="text-center">Form Masukan Event</legend>
		
		<div class="form-group">
			<label for="namaEvent" class="col-md-3 col-md-offset-1">Nama Event :</label>
			<div class="col-md-5">
				<input type="text" name ="nama_event" class="form-control" id="namaEvent" placeholder="Enter Nama Event" minlength="5" maxlength="60" required>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-3 col-md-offset-1">Photo Event :</label>
			<div class="col-md-5">
				<input type="file" name="photo" class="form-control" id="photo" required />
			</div>
		</div>

		<div class="form-group">
			<label for="alamat" class="col-md-3 col-md-offset-1">Alamat :</label>
			<div class="col-md-5">
				<textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Enter Alamat" maxlenth="100"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tanggalMulai" class="col-md-3 col-md-offset-1">Tanggal Mulai :</label>
			<div class="col-md-5">
				<input type="date" name ="tanggal_mulai" class="form-control" id="tanggalMulai" required>
			</div>
		</div>

		<div class="form-group">
			<label for="tanggalBerakhir" class="col-md-3 col-md-offset-1">Tanggal Berakhir :</label>
			<div class="col-md-5">
				<input type="date" name ="tanggal_berakhir" class="form-control" id="tanggalBerakhir" required>
			</div>
		</div>

		<div class="form-group">
			<label for="infoEvent" class="col-md-3 col-md-offset-1">Informasi Event :</label>
		</div>

		<div class="form-group">
			<div class="col-md-11 col-md-offset-1">
				<textarea name="info_event" id="infoEvent" class="ckeditor form-control" required></textarea>
			</div>
		</div>

		<button type="submit" name="_simpanEvent" class="btn btn-primary col-md-offset-1">Simpan</button>
		<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	</form>
</fieldset>
<?php
	require_once '_event.php';
?>
