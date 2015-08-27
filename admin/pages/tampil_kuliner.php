<link rel="stylesheet" type="text/css" href="css/paging.css" />

<!-- Tampil Kuliner -->
<table class="table table-bordered col-md-12">
	<thead>
		<tr style="text-align: center">
			<th>No</th>
			<th class="col-md-2">Nama Kuliner</th>
			<th class="col-md-1">Kategori Kuliner</th>
			<th class="col-md-1">Daerah</th>
			<th class="col-md-2">Photo</th>
			<th class="col-md-2">Infomasi Kuliner</th>
			<th class="col-md-2">Lokasi Kuliner</th>
			<th class="col-md-2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			require_once '_tampil_kuliner.php';
		?>
	</tbody>
</table>
<!-- Total Jumlah Post Informasi Kuliner-->
<p><strong>Total Kuliner: <?php echo $numrows; ?></strong></p>

<?php
	echo paginate($reload, $hal, $total_hal, $adjacents);
?>
