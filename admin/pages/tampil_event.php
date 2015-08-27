<link rel="stylesheet" type="text/css" href="css/paging.css" />

<table class="table table-bordered col-md-12">
	<thead>
		<tr style="text-align: center">
			<th class="col-md-2">Nama Event</th>
			<th class="col-md-2">Photo Event</th>
			<th class="col-md-2">Alamat</th>
			<th class="col-md-2">Tanggal Event</th>
			<th class="col-md-2">Infomasi Event</th>
			<th class="col-md-2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			require_once '_tampil_event.php';
		?>
	</tbody>
</table>
<!-- Total Jumlah Informasi Event-->
<p><strong>Total Event: <?php echo $numrows; ?></strong></p>

<?php
	echo paginate($reload, $hal, $total_hal, $adjacents);
?>
