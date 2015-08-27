<?php
	require_once '_profileadmin.php';
?>
<fieldset class="col-md-8 col-md-offset-2">
	<form method="post" class="form-horizontal bg-success" role="form">
		<legend class="text-center">Form Ubah Password</legend>
		
		<div class="form-group">
			<label for="passwordLama" class="col-md-3 col-md-offset-1">Password Lama</label>
			<div class="col-md-5">
				<input type="password" name="old_password" id="passwordLama" class="form-control" required />
			</div>
		</div>
		
		<div class="form-group">
			<label for="passwordBaru" class="col-md-3 col-md-offset-1">Password Baru</label>
			<div class="col-md-5">
				<input type="password" name="new_password" id="passwordBaru" class="form-control" required />
			</div>
		</div>

		<div class="form-group">
			<label for="passwordUlang" class="col-md-3 col-md-offset-1">Ulangi Password</label>
			<div class="col-md-5">
				<input type="password" name="password_ulang" id="passwordUlang" class="form-control" required />
				<?php if(isset($error)) echo "<p class='text-danger'>Password baru belum sama</p>"; ?>
			</div>
		</div>
		
		<p></p>
		<input type="submit" class="btn btn-primary col-md-offset-1" name="button" value="Ubah" />
		<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	</form>
</fieldset>

