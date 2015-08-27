<?php
	require_once '_connect.php';
	require_once 'fungsi/functions.php';
	require_once 'fungsi/paging.php';

?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equip="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ensiklopedia - Kuliner Banten</title>
		<link rel="icon" type="image/png" href="favicon.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/kuliner-banten.css">

		<!--[if lt IE 9]>
			<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<header>
			<div class="container bg-header">
				<?php require_once '_header.php'; ?>
			</div>
		</header>

		<div id="content">
			<div class="container bg-white gap">
				<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">

							<!--bagian Isi Informasi Kuliner-->
							<?php
								$page = (isset($_GET['page']) && $_GET['page'] != NULL) ? $_GET['page']:'';

								switch ($page) {
									case 'beranda':
										require_once 'pages/beranda.php';
										break;

									case 'kontak':
										require_once 'pages/kontak.php';
										break;

									case 'galeri_kuliner':
										require_once 'pages/galeri_kuliner.php';
										break;

									case 'kuliner':
										require_once 'pages/kuliner.php';
										break;

									case 'tangerang':
										require_once 'pages/tangerang.php';
										break; 

									case 'serang':
										require_once 'pages/serang.php';
										break;

									case 'cilegon':
										require_once 'pages/cilegon.php';
										break;

									case 'kategori_tag':
										require_once 'pages/tag.php';
										break;

									case 'detail':
										require_once 'pages/detail_kuliner.php';
										break;

									case 'detail_cari':
										require_once 'pages/detail_cari.php';
										break;

									case 'event':
										require_once 'pages/event.php';
										break;

									case 'detail_event':
										require_once 'pages/detail_event.php';
										break;

									default:
										require_once 'pages/beranda.php';
										break;
								}
							?>
						</div><!--col isi content-->

						<!--nav-left-->
						<aside class="col-md-3">
							<section class="row">
								
								<!--bagian search -->
								<?php
									require_once 'web/cari.php';
								?>

								<!--kategori tag-->
								<section class="col-md-12 col-sm-12">
									<h2>Kategori Tag</h2>
									<?php 
										require_once 'web/kategori_tag.php'; 
									?>
								</section>

								<!-- Tampilan Pemberitahuan Menjadi Member-->
								<section class="well col-md-10 col-sm-10 col-xs-10">
									<p>
									  Hallo guys! kalian juga dapat ikut berkontribusi untuk
									  mengembangkan website ensiklopedia kuliner banten ini
									  dengan mendaftarkan diri menjadi member website ini,
									  dengan memilih menu sign in.
									</p>
								</section>

								<!--bagain kuliner populer-->
								<section class="col-md-11 col-sm-11 kuliner">
									<h2>Kuliner Populer</h2>
									<?php
										require_once 'web/kuliner_populer.php';
									?>
								</section>

								<!--bagian kuliner baru-->
								<section class="col-md-11 col-sm-11 kuliner ">
									<h2>Kuliner Terbaru</h2>
									<?php
										require_once 'web/kuliner_terbaru.php';
									?>
								</section>
								
							</section>
						</aside>
				</div><!--row-->
			</div>
		</div><!--content-->

		<footer>
			<?php 
				require_once 'footer.php';
			?>
		</footer>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<!-- Tooltip -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('img').tooltip();
			});
		</script>
	</body>
</html>
