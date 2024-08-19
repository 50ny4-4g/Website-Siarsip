<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_arsip a INNER JOIN tb_lemari b ON b.id_lemari=a.id_lemari WHERE a.id_arsip='" . $_GET['kode'] . "'";
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
					<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $data_cek['no_surat']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Berkas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nm_berkas" name="nm_berkas" value="<?php echo $data_cek['nm_berkas']; ?>" readonly>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-6">
					<select name="id_kegiatan" id="id_kegiatan" class="form-control" disabled>
						<option selected="">- Pilih Kegiatan -</option>
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
					<select name="id_lemari" id="id_lemari" class="form-control" disabled>
						<option selected="">- Pilih Lemari -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lemari";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lemari'] ?>" <?= $data_cek['id_lemari'] == $row['id_lemari'] ? "selected" : null ?>>
								<?php echo $row['nama_lemari'] ?> | <?php echo $row['rak'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Dokumen</label>
				<div class="col-sm-6">
					<select name="jenis_dokumen" id="jenis_dokumen" class="form-control" disabled>
						<option value="">-- Pilih Jenis Dokumen --</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jenis_dokumen'] == "Audit Sarana") echo "<option value='Audit Sarana' selected>Audit Sarana</option>";
						else echo "<option value='Audit Sarana'>Audit Sarana</option>";

						if ($data_cek['jenis_dokumen'] == "Pembinaan") echo "<option value='Pembinaan' selected>Pembinaan</option>";
						else echo "<option value='Pembinaan'>Pembinaan</option>";

						if ($data_cek['jenis_dokumen'] == "PSB") echo "<option value='PSB' selected>PSB</option>";
						else echo "<option value='PSB'>PSB</option>";

						if ($data_cek['jenis_dokumen'] == "IP CPPOB") echo "<option value='IP CPPOB' selected>IP CPPOB</option>";
						else echo "<option value='IP CPPOB'>IP CPPOB</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Arsip</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_arsip" name="tgl_arsip" value="<?php echo $data_cek['tgl_arsip']; ?>" readonly>
				</div>
			</div>
		</div>
	</form>
</div>