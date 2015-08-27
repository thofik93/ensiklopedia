<?php
	session_start();
	if (!isset($_SESSION['username']) && !isset($_SESSION['hak_akses']))
	{
		echo "<script>window.location='../login.php'</script>";
	}
	elseif(isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] != 'admin')
	{
		echo "<script>window.location='../member/index.php'</script>";
	}
	require_once '_connect.php';
	require_once '../fungsi/functions.php';
	require_once '../fungsi/paging.php';
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equip="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard Admin - Kuliner Banten</title>
		<link rel="icon" type="image/png" href="../favicon.png">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

		<!--[if lt IE 9]>
			<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.php">Ensiklopedia Kuliner Khas Banten</a>
	        </div>

	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="?page=profileadmin">Profile</a></li>
	            <li><a href="?page=logout">Logout</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>

	    <div class="container-fluid">
	      <div class="row">
	      	<!--Side Bar (Menu Kiri)-->
	        <div class="col-sm-3 col-md-2 sidebar">

	          <ul class="nav nav-sidebar">
	            <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
	            <li class="dropdown">
	            	<a data-toggle="dropdown" data-target="#">
	            		Kuliner<span class="caret"></span>
	            	</a>
	            	<ul class="dropdown-menu">
	            		<li><a href="?page=kuliner">Entry Kuliner</a></li>
	            		<li><a href="?page=tampil_kuliner">Tampil Kuliner</a></li>
	            	</ul>
	            </li>
	            <li><a href="?page=kategori">Kategori</a></li>
	            <li><a href="?page=daerah">Daerah</a></li>
	            <li><a href="?page=kritik_saran">Kritik & Saran</a></li>
	            <li><a href="?page=member">Member</a></li>
	            <li><a href="?page=admin">Admin</a></li>
	            <li class="dropdown">
	            	<a data-toggle="dropdown" data-target="#">
	            		Event<span class="caret"></span>
	            	</a>
	            	<ul class="dropdown-menu">
	            		<li><a href="?page=event">Entry Event</a></li>
	            		<li><a href="?page=tampil_event">Tampil Event</a></li>
	            	</ul>
	            </li>
	          </ul>

	        </div>
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header">Dashboard</h1>
	          <!-- Form Handling -->
	          <?php
	          	// variabel untuk menyimpan halaman
	          	$v_page = (isset($_GET['page']) && $_GET['page'] != NULL)?$_GET['page']:'';

	          	if (file_exists('pages/'.$v_page.'.php'))
	          	{
	          		require_once ('pages/'.$v_page.'.php');
	          	}
	          	else
	          	{
	          		require_once('pages/home.php');
	          	}
	          ?>
	          
	        </div>
	      </div>
	    </div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
	</body>
</html>
