<section class="content-header">
	<h1>
		Utility
		<small>Users</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Utility</a></li>
		<li class="active">Users</li>
	</ol>
</section>
<section class="content">
	<?php 
	if ($this->session->flashdata('message')) : 
		echo $this->session->flashdata( 'message' );
	endif; 
?>
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List User</h3>
			<div class="box-tools pull-right">
				<a href="<?= base_url() . 'users/add'?>" class="btn btn-primary">Tambah User</a>
			</div>
		</div>
		<div class="box-body">
			<table id="tablejabatan" class="table table-responsice table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Department</th>
						<th>Email</th>
						<th>No. HP</th>
						<th>Group User</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>