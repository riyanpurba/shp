<section class="content-header">
	<h1>
		Pengaduan
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Pengaduan</a></li>
		<li class="active">List</li>
	</ol>
</section>
<section class="content">
	<div class="box box-info">
		<div class="box-body">
			<table id="tablepengaduan" class="table table-responsice table-bordered">
				<thead>
					<tr>
						<th>No. Pengaduan</th>
						<th>Nama Pelapor</th>
						<th>Jabatan</th>
						<th>Department</th>
						<th>Nama Tertuju</th>
						<th>Nama Barang</th>
						<th>Tanggal Pengaduan</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($pengaduan as $row) { 
					?>
					<tr>
						<td><?= $row['no_pengaduan'] ?></td>
						<td><?= $row['nama_pelapor'] ?></td>
						<td><?= $row['nama_jabatan'] ?></td>
						<td><?= $row['nama_department'] ?></td>
						<td><?= $row['nama_tertuju'] ?></td>
						<td><?= $row['nama_barang'] ?></td>
						<td><?= $row['tanggal_lapor'] ?></td>
						<td>
							<?php
							if ($row['status'] == 1) {
								echo '<span class="badge bg-red">Sedang diajukan</span>';
							}else if ($row['status'] == 2) {
								echo '<span class="badge bg-blue">Sedang diproses</span>';
							}else if ($row['status'] == 3) {
								echo '<span class="badge bg-green">Selesai</span>';
							}
							?>
						</td>
						<td></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>