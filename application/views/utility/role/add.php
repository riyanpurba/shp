<section class="content-header">
	<h1>
		Utility
		<small>Role</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Utility</a></li>
		<li class="active">Role</li>
	</ol>
</section>
<section class="content">
	<?php 
	if ($this->session->flashdata('message')) : 
		echo $this->session->flashdata( 'message' );
	endif; 
?>

	<form action="<?= base_url('manajemenakses/store_role');?>" method="post">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">List User</h3>
				<div class="box-tools pull-right">
					<a href="<?= base_url() . 'manajemenakses/index'?>" class="btn btn-primary">Kembali</a>
				</div>
			</div>
			<div class="box-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="role">Nama Role</label>
								<input type="text" name="role" id="role" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</form>
</section>
