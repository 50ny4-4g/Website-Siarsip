<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan Nomor Surat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Berkas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nm_berkas" name="nm_berkas" placeholder="Masukkan Nama Berkas" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-6">
					<select name="id_kegiatan" id="id_kegiatan" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Kegiatan -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kegiatan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kegiatan'] ?>">
								<?php echo $row['judul_kegiatan'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lemari</label>
				<div class="col-sm-6">
					<select name="id_lemari" id="id_lemari" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Lemari -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lemari";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lemari'] ?>">
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
					<input type="date" class="form-control" id="tgl_arsip" name="tgl_arsip" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload File</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file" name="file" placeholder="Masukkan Nama Berkas" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-arsip" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

if (isset($_POST['Simpan'])) {
    function generateRandomNumber($length) {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9); // mt_rand() menghasilkan angka acak antara 0 dan 9
        }
        return $result;
    }
    
    $length = 10; // Ganti dengan panjang karakter yang diinginkan
    $randomNumber = generateRandomNumber($length);

	$nama_gambar    = $_FILES['file']['name'];
	$lokasi_gambar  = $_FILES['file']['tmp_name'];
	$tipe_gambar    = $_FILES['file']['type'];
	$imageFileType  = strtolower(pathinfo($nama_gambar, PATHINFO_EXTENSION));
	$newFileName = uniqid('file_', true) . "." . $imageFileType;
	move_uploaded_file($lokasi_gambar, "./dist/berkas/$newFileName");

	$no_surat = $_POST['no_surat'];
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

	$sql_simpan = "INSERT INTO tb_arsip (id_arsip, no_surat, id_lemari, id_kegiatan, nm_berkas, tgl_arsip, file) VALUES (
            '" . $randomNumber . "',
            '" . $_POST['no_surat'] . "',
            '" . $_POST['id_lemari'] . "',
            '" . $_POST['id_kegiatan'] . "',
            '" . $_POST['nm_berkas'] . "',
            '" . $_POST['tgl_arsip'] . "',
			'" . $newFileName . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) { 
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-arsip';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-arsip';
          }
      })</script>";
	}
}
     //selesai proses simpan data
