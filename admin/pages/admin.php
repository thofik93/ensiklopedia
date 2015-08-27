<fieldset class="col-md-8 col-md-offset-2">
	<form method="post" action="?cat=admin&page=admin" class="form-horizontal bg-success" role="form" enctype="multipart/form-data">
		<legend class="text-center">Form Tambah Admin</legend>

		<div class="form-group">
			<label for="namaDepan" class="col-md-4 col-md-offset-1">Nama Depan:</label>
			<div class="col-md-6">
				<input type="text" name ="nama_depan" class="form-control" id="namaDepan" placeholder="Enter Nama Depan" required>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="namaTengah" class="col-md-4 col-md-offset-1">Nama Tengah:</label>
			<div class="col-md-6">
				<input type="text" name ="nama_tengah" class="form-control" id="namaTengah" placeholder="Enter Nama Tengah">
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="namaBelakang" class="col-md-4 col-md-offset-1">Nama Belakang:</label>
			<div class="col-md-6">
				<input type="text" name ="nama_belakang" class="form-control" id="namaBelakang" placeholder="Enter Nama Belakang">
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="jenkel" class="col-md-4 col-md-offset-1">Gender:</label>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
					    <input type="radio" name ="gender" class="radio" value="L" checked="checked">Laki-laki
					</div>
					<div class="col-md-2">
					    <input type="radio" name ="gender" class="radio" value="P">Perempuan
					</div>
				</div>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="alamat" class="col-md-4 col-md-offset-1">Alamat:</label>
			<div class="col-md-6">
				<textarea name="alamat" id="alamat" class="form-control" placeholder="Enter Alamat"></textarea>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="phone" class="col-md-4 col-md-offset-1">Phone:</label>
			<div class="col-md-6">
				<input type="text" name ="phone" class="form-control" id="phone" placeholder="Enter Phone" minlength="12" maxlength="12" required>
				<span id="helBlock" class="help-block">Contoh : 0812987299XXX</span>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="email" class="col-md-4 col-md-offset-1">Email:</label>
			<div class="col-md-6">
				<input type="email" name ="email" class="form-control" id="email" placeholder="Enter Email" required>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="photo" class="col-md-4 col-md-offset-1">Photo:</label>
			<div class="col-md-6">
				<input type="file" name ="photo" id="photo" required>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="username" class="col-md-4 col-md-offset-1">Username:</label>
			<div class="col-md-6">
				<input type="text" name ="username" class="form-control" id="username" placeholder="Enter Username" maxlength="15" minlength="5" required>
				<span id="helBlock" class="help-block">* tidak boleh kurang dari 5 karakter dan maksimal 15 karakter</span>
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label for="password" class="col-md-4 col-md-offset-1">Password:</label>
			<div class="col-md-6">
				<input type="password" name ="password" class="form-control" id="password" placeholder="Enter Password" minlength="5" maxlength="15" required>
			</div>
		</div><!--form-group-->
		<!--input admin-->
		<input type="hidden" name="admin" value="admin">


		<button type="submit" name="_simpan" class="btn btn-primary col-md-offset-1">Simpan</button>
		<button type="reset" class="btn btn-danger">Batal</button>
	</form>
</fieldset>
<?php
	require_once '_admin.php';
?>

<!-- Menampilkan Data Admin -->

<table class="table table-bordered col-md-4" style="margin-top: 5%">
	<caption><h2 class="col-md-6">Tampilan informasi admin</h2></caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Handphone</th>
			<th>Email</th>
			<th>Username</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			require_once 'tampil_admin.php';
		?>
	</tbody>
</table>
