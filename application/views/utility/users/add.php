<section class="content-header">
	<h1>
		Utility
		<small>Tambah User</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Utility</a></li>
		<li class="active">Tambah User</li>
	</ol>
</section>
<section class="content">
	<form action="<?= base_url('users/store');?>" method="post">
		<div class="box box-info">
			<div class="box-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama <span class="text-danger">*</span></label>
								<input type="text" name="txtNama" value="" class="form-control" require>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Jabatan <span class="text-danger">*</span></label>
								<select class="form-control" name="txtJabatan" id="jabatam" require>
									<option value="">-- pilih jabatan --</option>
									<?php foreach($jabatan as $jab): ?>
									<option value="<?= $jab['id'] ?>"><?= $jab['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Departemen <span class="text-danger">*</span></label>
								<select class="form-control" name="txtDept" id="dept" require>
									<option value="">-- pilih departemen --</option>
									<?php foreach($department as $dept): ?>
									<option value="<?= $dept['id'] ?>"><?= $dept['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input type="email" name="txtEmail" value="" class="form-control" require>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>No. HP / No. WA <span class="text-danger">*</span></label>
								<input type="text" name="txtPhone" value="" class="form-control" require>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Username <span class="text-danger">*</span></label>
								<input type="text" name="txtUsername" value="" class="form-control" require>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Password <span class="text-danger">*</span></label>
								<input type="password" name="txtPassword" value="" class="form-control" require>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Akses User <span class="text-danger">*</span></label>
								<select name="txtAksesUser" id="aksesuser" class="form-control">
									<option value="">-- pilih group user --</option>
									<?php foreach($group_user as $gs): ?>
									<option value="<?= $gs['id'] ?>"><?= $gs['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="from-group">
								<label>Photo Profil <span class="text-danger">*</span></label>
								<div class="profile-pic-wrapper">
									<div class="pic-holder">
										<!-- uploaded pic shown here -->
										<img id="profilePic" class="pic" src="<?= base_url() . 'assets/dist/img/avatar.png'?>">

										<Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto"
											accept="image/*" style="opacity: 0;" />
										<label for="newProfilePhoto" class="upload-file-block">
											<div class="text-center">
												<div class="mb-2">
													<i class="fa fa-camera fa-2x"></i>
												</div>
												<div class="text-uppercase">
													Update <br /> Profile Photo
												</div>
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
