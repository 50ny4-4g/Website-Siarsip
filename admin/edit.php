<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_arsip WHERE id_arsip='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Arsip
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Arsip</label>
				<div class="col-sm-6">
					<input type='text' class="form-control" id="id_arsip" name="id_arsip" value="<?php echo $data_cek['id_arsip']; ?>" readonly />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $data_cek['no_surat']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Berkas</label> 
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nm_berkas" name="nm_berkas" value="<?php echo $data_cek['nm_berkas']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-6">
					<select name="id_kegiatan" id="id_kegiatan" class="form-control select2bs4" required>
						<option selected="">- Pilih Lemari -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kegiatan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kegiatan'] ?>" <?= $data_cek['id_kegiatan'] == $row['id_kegiatan'] ? "selected" : null ?>>
								<?php echo $row['judul_kegiatan'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penyimpanan</label>
				<div class="col-sm-6">
					<select name="id_lemari" id="id_lemari" class="form-control select2bs4" required>
						<option selected="">- Pilih Lemari -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lemari";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lemari'] ?>" <?= $data_cek['id_lemari'] == $row['id_lemari'] ? "selected" : null ?>>
								<?php echo $row['nama_lemari'] ?> | <?php echo $row['rak'] ?> | <?php echo $row['jenis_dokumen'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Arsip</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_arsip" name="tgl_arsip" value="<?php echo $data_cek['tgl_arsip']; ?>" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-arsip" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
$no_surat = $_POST['no_surat'];	
if($no_surat == $data_cek['no_surat']){
	$sql_ubah = "UPDATE tb_arsip SET 
    id_arsip='" . $_POST['id_arsip'] . "',
    no_surat='" . $_POST['no_surat'] . "',
    id_kegiatan='" . $_POST['id_kegiatan'] . "',
    id_lemari='" . $_POST['id_lemari'] . "',
    nm_berkas='" . $_POST['nm_berkas'] . "',
    tgl_arsip='" . $_POST['tgl_arsip'] . "'
    WHERE id_arsip='" . $_POST['id_arsip'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-arsip';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-arsip';
        }
      })</script>";
	}
} else{
	$cek_nik = mysqli_query($koneksi, "SELECT * FROM tb_arsip WHERE no_surat = '$no_surat'");
	if ((mysqli_affected_rows($koneksi)) > 0) {
			 echo "<script>
			 Swal.fire({title: 'No. Surat sudah ada!!. <br> Mohon buat No. Surat Baru',text: '',icon: 'error',confirmButtonText: 'OK'
			 }).then((result) => {if (result.value){
				 history.back();
				 }
			 })</script>";
		exit;
	}

	$sql_ubah = "UPDATE tb_arsip SET 
    id_arsip='" . $_POST['id_arsip'] . "',
    no_surat='" . $_POST['no_surat'] . "',
    id_kegiatan='" . $_POST['id_kegiatan'] . "',
    id_lemari='" . $_POST['id_lemari'] . "',
    nm_berkas='" . $_POST['nm_berkas'] . "',
    tgl_arsip='" . $_POST['tgl_arsip'] . "'
    WHERE id_arsip='" . $_POST['id_arsip'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-arsip';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-arsip';
        }
      })</script>";
	}

}
	
}
