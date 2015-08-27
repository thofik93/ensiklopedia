<?php
	require_once '_eventUbah.php';
?>

<fieldset class="col-md-10 col-md-offset-1 bg-success">
	<form method="post" action="?page=eventubah" class="form-horizontal" role="form" enctype="multipart/form-data">
		<legend class="text-center">Form Ubah Event</legend>
		<div class="form-group">
			<label for="namaEvent" class="col-md-3 col-md-offset-1">Nama Event :</label>
			<div class="col-md-5">
				<input type="text" name ="nama_event" class="form-control" id="namaEvent" value="<?=$row['nama_event'];?>" minlength="5" maxlength="60" required>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-3 col-md-offset-1">Photo Event :</label>
			<div class="col-md-5">
				<img src="../images/event/<?=$row['photo'];?>" alt="<?=$row['nama_event'];?>" class="form-control" style="height:200px" />
				<input type="hidden" name="delete_file" value="../images/event/<?=$row['photo'];?>" />
				<input type="file" name="photo" class="form-control" id="photo" />
			</div>
		</div>

		<div class="form-group">
			<label for="alamat" class="col-md-3 col-md-offset-1">Alamat :</label>
			<div class="col-md-5">
				<textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Enter Alamat" maxlenth="100"><?=$row['alamat'];?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tanggalMulai" class="col-md-3 col-md-offset-1">Tanggal Mulai :</label>
			<div class="col-md-5">
				<input type="date" name ="tanggal_mulai" class="form-control" id="tanggalMulai" value="<?=$row['tanggal_mulai'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="tanggalBerakhir" class="col-md-3 col-md-offset-1">Tanggal Berakhir :</label>
			<div class="col-md-5">
				<input type="date" name ="tanggal_berakhir" class="form-control" id="tanggalBerakhir" value="<?=$row['tanggal_berakhir'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="infoEvent" class="col-md-3 col-md-offset-1">Informasi Event :</label>
		</div>

		<div class="form-group">
			<div class="col-md-11 col-md-offset-1">
				<textarea name="info_event" id="infoEvent" class="ckeditor form-control" required><?=$row['isi'];?></textarea>
			</div>
		</div>

		<input type="hidden" name="kd_event" value="<?=$row['kd_event'];?>" />

		<button type="submit" name="_ubahEvent" class="btn btn-primary col-md-offset-1">Simpan</button>

	</form>
</fieldset>
