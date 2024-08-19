<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: beranda.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI Database
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Si ARSIP| BPOM KOTA PEKANBARU</title>
	<link rel="icon" href="dist/img/LOGO.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="https://cdn.datatables.net/v/dt/dt-2.1.3/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-red navbar-light" style="background-color: white">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="teal">
							<b>SISTEM ARSIP BPOM KOTA PEKANBARU</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #3795BD">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/LOGO.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9">
				<font color="white">
				<span class="brand-text"> Si ARSIP</span>
				</font>
			</a>

			<!-- Sidebar untuk level petugas/kabid-->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<?php
					if ($data_level == "Administrator") {
					?>
						<div class="image">
							<img src="dist/img/profil.PNG" alt="AdminLTE Logo" class="brand-image">
						</div>

					<?php
					} elseif ($data_level == "Pegawai") {
					?>
						<div class="image">
							<img src="dist/img/profil.PNG" alt="AdminLTE Logo" class="brand-image">
						</div>
					<?php
					}
					?>

					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  KABID-->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=data-kegiatan" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Data Kegiatan
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=data-penyimpanan" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Data Penyimpanan
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=data-arsip" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Data Arsip Berkas
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=laporan-arsip" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Laporan Arsip</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Data User
									</p>
								</a>
							</li>
							
						<?php
						} else{
						?>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=data-kegiatan" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Data Kegiatan
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=data-arsip" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Data Arsip Berkas
									</p>
								</a>
							</li>
							<li class="nav-header">Setting</li>
							</li>
						<?php } ?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Kegiatan
							case 'data-kegiatan':
								include "admin/kegiatan/data.php";
								break;
							case 'add-kegiatan':
								include "admin/kegiatan/tambah.php";
								break;
							case 'edit-kegiatan':
								include "admin/kegiatan/edit.php";
								break;
							case 'hapus-kegiatan':
								include "admin/kegiatan/hapus.php";
								break;

								//Galeri
							case 'data-galeri':
								include "admin/galeri/data.php";
								break;
							case 'add-galeri':
								include "admin/galeri/tambah.php";
								break;
							case 'edit-galeri':
								include "admin/galeri/edit.php";
								break;
							case 'hapus-galeri':
								include "admin/galeri/hapus.php";
								break;

								//Penyimpanan
							case 'data-penyimpanan':
								include "admin/penyimpanan/data.php";
								break;
							case 'add-penyimpanan':
								include "admin/penyimpanan/tambah.php";
								break;
							case 'edit-penyimpanan':
								include "admin/penyimpanan/edit.php";
								break;
							case 'hapus-penyimpanan':
								include "admin/penyimpanan/hapus.php";
								break;

								//Arsip
							case 'data-arsip':
								include "admin/arsip/data.php";
								break;
							case 'lihat-arsip':
								include "admin/arsip/lihat.php";
								break;
							case 'add-arsip':
								include "admin/arsip/tambah.php";
								break;
							case 'lihat-berkas':
								include "admin/arsip/berkas.php";
								break;
							case 'edit-arsip':
								include "admin/arsip/edit.php";
								break;
							case 'hapus-arsip':
								include "admin/arsip/hapus.php";
								break;

								// Pencarian data Laporan
							case 'v_data_arsip':
								include "laporan/v_data_arsip.php";
								break;

							case 'v_arsip_tgl':
								include "laporan/v_arsip_tgl.php";
								break;

								//laporan
							
							case 'laporan-arsip':
								include "laporan/data_arsip.php";
								break;


								//default/false
							default:
								echo "<center><b>FITUR IKI DURUNG DADI BOSS, TERIMA KASIH!</b></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Pegawai") {
							include "home/pegawai.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="#">
					<strong> BPOM PEKANBARU</strong>
				</a>
				2024.
			</div>
			<b>Note : template sb admin 2</b>
			<a href="https://startbootstrap.com/theme/sb-admin-2">Kilik disini</a>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example").DataTable({
				layout: {
					topStart: {
						buttons: ['excel', 'pdf', 'print']
					}
				}
			});
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});

		});
	</script>


	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<?php
	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	} ?>

</body>

</html>