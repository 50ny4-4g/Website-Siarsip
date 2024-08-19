<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Arsip Berkas
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-arsip" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nomor Surat</th>
						<th>Nama Berkas</th>
						<th>Lemari</th>
						<th>Jenis Dokumen</th>
						<th>Rak</th>
						<th>Tgl Arsip</th>
						<th>File</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_arsip a inner join tb_kegiatan b on b.id_kegiatan=a.id_kegiatan inner join tb_lemari c on c.id_lemari=a.id_lemari ");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_surat']; ?>
							</td> 
							<td>
								<?php echo $data['nm_berkas']; ?>
							</td>
							<td>
								<?php echo $data['nama_lemari']; ?>
							</td>
							<td>
								<?php echo $data['jenis_dokumen']; ?>
							</td>
							<td>
								<?php echo $data['rak']; ?>
							</td>
							<td>
								<?php echo $data['tgl_arsip']; ?>
							</td>
							<td>
								<a href="?page=lihat-berkas&kode=<?php echo $data['id_arsip']; ?>" title="Lihat" class="btn btn-primary btn-sm">
									<i class="fa fa-file"></i> Berkas
								</a>
								<!-- <a href="./dist/berkas/<?= $data['file']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-file"></i> Lihat
								</a> -->
							</td> 
							<td>
								<a href="?page=lihat-arsip&kode=<?php echo $data['id_arsip']; ?>" title="Lihat" class="btn btn-primary btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								<a href="?page=edit-arsip&kode=<?php echo $data['id_arsip']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=hapus-arsip&kode=<?php echo $data['id_arsip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->