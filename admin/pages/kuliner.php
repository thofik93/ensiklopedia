<fieldset class="col-md-12">
	<form method="post" action="?cat=admin&page=simpan_kuliner" class="form-horizontal bg-success" role="form" enctype="multipart/form-data">
		<legend class="text-center">Form Entry Infomarsi Kuliner</legend>

		<div class="form-group">
			<label for="kuliner" class="col-md-2 col-md-offset-1">Nama Kuliner:</label>
			<div class="col-md-4">
				<input type="text" name ="nama_kuliner" class="form-control" id="kuliner" placeholder="Enter Nama Kuliner" required>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="kategori" class="col-md-2 col-md-offset-1">Kategori Kuliner:</label>
			<div class="col-md-4">
				<select name="kategori" class="form-control">
					<option>-- Pilih Kategori Kuliner --</option>
					<?php
						$query  = "SELECT * FROM kategori ORDER BY nama_kategori";
						$result = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option value='$row[kd_kategori]'>$row[nama_kategori]</option>";
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
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option value='$row[kd_daerah]'>$row[nama_daerah]</option>";
						}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-2 col-md-offset-1">Photo Kuliner:</label>
			<div class="col-md-4">
				<input type="file" name ="photo" class="form-control" id="photo" required>
			</div>
		</div>

		<div class="form-group">
			<label for="infoKuliner" class="col-md-2 col-md-offset-1">Informasi Kuliner:</label>
			<div class="col-md-8">
				<textarea name="info_kuliner" id="infoKuliner" class="ckeditor form-control" required="required"></textarea>
			</div>
		</div>
		
		<!-- Bagian Lokasi Kuliner -->
		<legend class="text-center">Lokasi Kuliner</legend>

		<div class="form-group">
				<label for="alamat" class="col-md-2 col-md-offset-1">Alamat:</label>
				<div class="col-md-4">
					<textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Enter Alamat"></textarea>
				</div>
		</div><!--form-group-->
		
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
			<label for="lat" class="col-md-2 col-md-offset-1">Latitude:</label>
			<div class="col-md-4">
				<input type="text" name="latitude" class="form-control" id="lat" placeholder="Koordinat Latitude">
			</div>
		</div>

		<div class="form-group">
			<label for="long" class="col-md-2 col-md-offset-1">Longitude:</label>
			<div class="col-md-4">
				<input type="text" name ="longitude" class="form-control" id="long" placeholder="Koordinat Longitude">
				<span id="helBlock" class="help-block">* Sebagai alternatif untuk mendapatkan koordinat (latitude dan longtitude) bisa mengunjungi website <a href="http://www.latlong.net" target="_blank">www.latlong.net</a></span>					
			</div>
		</div>

		<button type="submit" name="_simpanKuliner" class="btn btn-primary col-md-offset-1" id="simpan" style="margin-bottom: 2%">Simpan</button>
		<button type="reset" name="reset" class="btn btn-danger" style="margin-bottom: 2%">Reset</button>
	</form>
</fieldset>
<!-- JavaScript Code untuk Google Maps -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../js/koordinat.js"></script>
