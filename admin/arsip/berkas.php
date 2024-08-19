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
                <label class="col-sm-2 col-form-label">Ubah Berkas</label>
				<div class="col-sm-6">
                    <input type="file" name="file" id="file" class="form-control">
				</div>
                <div class="col-sm-2">
                    <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
                    <a href="?page=data-arsip" title="Kembali" class="btn btn-secondary">Kembali</a>
				</div>
            </div>            
		</div>
		<div class="card-footer">
            <embed type="application/pdf" src="./dist/berkas/<?= $data_cek['file']; ?>" width="1000" height="600"></embed>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
    $nama_gambar    = $_FILES['file']['name'];
	$lokasi_gambar  = $_FILES['file']['tmp_name'];
	$tipe_gambar    = $_FILES['file']['type'];
	$imageFileType  = strtolower(pathinfo($nama_gambar, PATHINFO_EXTENSION));
	$newFileName = uniqid('file_', true) . "." . $imageFileType;
	move_uploaded_file($lokasi_gambar, "./dist/berkas/$newFileName");

	$sql_ubah = "UPDATE tb_arsip SET 
    file='" . $newFileName . "'
    WHERE id_arsip='" . $data_cek['id_arsip']. "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {
            window.location = 'index.php?page=lihat-berkas&kode=".$data_cek['id_arsip']."';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {
            window.location = 'index.php?page=lihat-berkas&kode=".$data_cek['id_arsip']."';
        }
      })</script>";
	}
}
