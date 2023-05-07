<section class="content-header">
	<h1>
		Master
		<small>Jabatan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
		<li class="active">Jabatan</li>
	</ol>
</section>
<section class="content">
	<?php 
	if ($this->session->flashdata('message')) : 
		echo $this->session->flashdata( 'message' );
	endif; 
?>
	<div class="box box-info">
		<div class="box-body">
			<table id="tablejabatan" class="table table-responsice table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Jabatan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?=
					$no = 1;
					foreach ($jabatan as $row) {
				?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $row['name'] ?></td>
						<td>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">Edit</button>
							<a href="<?= base_url() . 'jabatan/destroy' ?>" class="btn btn-danger"
								style="margin-right: 5px;">Hapus</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal modal-default fade" id="modal-info">
	<div class="modal-dialog">
		<form action="" method="post"></form>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Jabatan</h4>
			</div>
			<div class="modal-body">
				<p>One fine body&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
