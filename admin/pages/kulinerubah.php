<?php 
	require_once '_kulinerubah.php';
?>
<fieldset class="col-md-12">
	<form method="post" action="?cat=admin&page=kulinerubah" class="form-horizontal bg-success" role="form" enctype="multipart/form-data">
		<legend class="text-center">Form Ubah Infomarsi Kuliner</legend>
	
		<div class="form-group">
			<label for="kuliner" class="col-md-2 col-md-offset-1">Nama Kuliner:</label>
			<div class="col-md-4">
				<input type="text" name ="nama_kuliner" class="form-control" id="kuliner" value="<?=$row['nama_kuliner'];?>" required>
			</div>
		</div>

		<div class="form-group">
			<label for="kategori" class="col-md-2 col-md-offset-1">Kategori Kuliner:</label>
			<div class="col-md-4">
				<select name="kategori" class="form-control">
					<option>-- Pilih Kategori Kuliner --</option>
					<?php
						$query  = "SELECT * FROM kategori ORDER BY nama_kategori";
						$result = mysqli_query($conn, $query);
						while ($kategori = mysqli_fetch_assoc($result))
						{
							if ($kategori['kd_kategori'] == $row['kategori_masakan'])
							{
								echo "<option value='$kategori[kd_kategori]' SELECTED>$kategori[nama_kategori]</option>";
							}
							else echo "<option value='$kategori[kd_kategori]'>$kategori[nama_kategori]</option>";
						}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="daerah" class="col-md-2 col-md-offset-1">Nama Daerah:</label>
			<div class="col-md-4">
				<select name="daerah" class="form-control">
				<option>-- Pilih Daerah --</option>
					<?php
						$query  = "SELECT * FROM daerah ORDER BY nama_daerah";
						$result = mysqli_query($conn, $query);
						while ($daerah = mysqli_fetch_assoc($result))
						{
							if ($daerah['kd_daerah'] == $row['daerah'])
							{
								echo "<option value='$daerah[kd_daerah]' SELECTED>$daerah[nama_daerah]</option>";
							}
							else echo "<option value='$daerah[kd_daerah]'>$daerah[nama_daerah]</option>";
						}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-2 col-md-offset-1">Photo Kuliner:</label>
			<div class="col-md-4">
				<img src="../images/kuliner/<?=$row['photo'];?>" class="form-control" style="height:200px" required>
				<input type="hidden" name="delete_file" value="../images/kuliner/<?=$row['photo'];?>" />
				<input type="file" name="photo" class="form-control" id="photo" />
			</div>
		</div>

		<div class="form-group">
			<label for="infoKuliner" class="col-md-2 col-md-offset-1">Informasi Kuliner:</label>
			<div class="col-md-8">
				<textarea name="info_kuliner" id="infoKuliner" class="ckeditor form-control" required><?=$row['isi'];?></textarea>
			</div>
		</div>
		<fieldset>
			<legend class="text-center">Lokasi Kuliner</legend>

			<div class="form-group">
				<label for="alamat" class="col-md-2 col-md-offset-1">Alamat:</label>
				<div class="col-md-4">
					<textarea name="alamat" id="alamat" class="form-control" rows="4" /><?=$row['alamat'];?></textarea>
				</div>
			</div><!--form-group-->

			<!--Cari Koordinat Lokasi-->
			<div class="form-group">
				<label for="address" class="col-md-2 col-md-offset-1">Nama Tempat:</label>
				<div class="col-md-8">
					<div class="form-inline col-md-12">
					  <div class="form-group">
					     <input type="text" name="nama_tempat" id="address" class="form-control" style="width: 600px;" placeholder="Enter Nama Tempat" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  </div>
					  <div class="form-group">
					    <input type="button" id="go" class="form-control btn btn-primary" value="Find">
					  </div>
					</div>
					<span id="helBlock" class="help-block">* Tambahkan kode negara untuk hasil yang lebih baik. Contoh: Tangerang, ID</span>
				</div>
			</div><!--form-group-->	

			<div class="form-group">
				<label for="latitude" class="col-md-2 col-md-offset-1">Latitude:</label>
				<div class="col-md-4">
					<input type="text" name ="latitude" class="form-control" id="lat" value="<?=$row['latitude'];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="longtitude" class="col-md-2 col-md-offset-1">Longitude:</label>
				<div class="col-md-4">
					<input type="text" name ="longtitude" class="form-control" id="long" value="<?=$row['longtitude'];?>">
					<span id="helBlock" class="help-block">* Sebagai alternatif untuk mendapatkan koordinat (latitude dan longtitude) bisa mengunjungi website <a href="http://www.latlong.net" target="_blank">www.latlong.net</a></span>
				</div>
			</div>

		</fieldset>
		<input type="hidden" name="id" value="<?=$row['kd_kuliner'];?>" />
		<button name="_ubahKuliner" class="btn btn-primary col-md-offset-1" style="margin-bottom: 2%">Simpan</button>
	</form>
</fieldset>
<!-- JavaScript Code untuk Google Maps -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../js/koordinat.js"></script>
