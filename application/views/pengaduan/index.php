<section class="content-header">
	<h1>
		Pengaduan
		<small>Form</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Pengaduan</a></li>
		<li class="active">Form</li>
	</ol>
</section>
<section class="content">
<?php 
	if ($this->session->flashdata('message')) : 
		echo $this->session->flashdata( 'message' );
	endif; 
?>
	<form class="" action="<?= base_url('pengaduan/store');?>" method="post" enctype="multipart/form-data">
		<div class="box box-info">
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nama <span class="text-danger">*</span></label>
							<input type="text" name="txtNamaLengkap" value="" class="form-control" require>
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
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Tertuju <span class="text-danger">*</span></label>
							<input type="text" name="txtNamaTertuju" value="" class="form-control" require>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nama Barang <span class="text-danger">*</span></label>
							<input type="text" name="txtNamaBarang" value="" class="form-control" require>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Keterangan <span class="text-danger">*</span></label>
							<textarea name="txtKeterangan" value="" class="form-control" rows="5" require></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="upload__box">
							<div class="upload__btn-box">
								<label class="upload__btn">
									<p>Unggah Photo</p>
									<input type="file" data-max_length="20" name="foto[]" required="required" multiple class="upload__inputfile" id="upload__inputfile" />
								</label>
							</div>
							<div class="upload__img-wrap"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Next</button>
			</div>
		</div>
	</form>
</section>
