<section class="content-header">
	<h1>
		Utility
		<small>Manajemen Akses</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Utility</a></li>
		<li class="active">Manajemen Akses</li>
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
			<h3 class="box-title">Manajemen Akses</h3>
			<div class="box-tools pull-right">
				<a href="<?= base_url() . 'manajemenakses/add_role'?>" class="btn btn-primary">Tambah Role User</a>
			</div>
		</div>
		<div class="box-body">
			<div class="container">
				<div class="row">
					<div class="col-md-6 mx-auto">
						<div class="form-group">
							<label for="groupuser" class="col-sm-2 control-label mb-0">Role</label>
							<div class="col-sm-10">
								<select name="groupuser" id="groupuser" class="form-control">
								<option value="">-- pilih role --</option>
								<?php foreach($groupuser as $row) { ?>
								<option value="<?= $row['id'] ?>" class="text-capitale"><?= $row['name'] ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$.ajax({
		url: '<?= base_url() . 'users/getUsers' ?>',
		type: 'POST',
		dataType: 'json',
		data: {groupuser: $('#groupuser').val()},
		success: function(data) {
			console.log(data);
		}
	});
</script>
