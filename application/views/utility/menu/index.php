<section class="content-header">
	<h1>
		Utility
		<small>Menu</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Utility</a></li>
		<li class="active">Menu</li>
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
			<h3 class="box-title">Menu 1</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmenu1">Tambah Menu</button>
			</div>
		</div>
		<div class="box-body">
			<div class="container-fluid">
				<table id="tablemenu1" class="table table-responsice table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Menu</th>
							<th>Icon</th>
							<th>Link</th>
							<th>Have Sub Menu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="tbl_data">
						<?php
							$no = 1;
							foreach ($menu1 as $row) {
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['menu_name'] ?></td>
							<td><?= $row['menu_class'] ?></td>
							<td><?= $row['menu_url'] ?></td>
							<td>
								<?php
								if ($row['have_submenu'] == 1) {
									echo '<span class="badge bg-red">Have</span>';
								}else if ($row['have_submenu'] == 0) {
									echo '<span class="badge bg-blue">Not Have</span>';
								}
								?>
							</td>
							<td>
								<button type="button" class="btn btn-info editmenu1" id="editmenu1" data-id="<?= $row['menu_id'] ?>">Edit</button>
								<button type="button" class="btn btn-danger deletemenu1" id="deletemenu1" data-id="<?= $row['menu_id'] ?>">Hapus</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Menu 2</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmenu2">Tambah Menu</button>
			</div>
		</div>
		<div class="box-body">
			<div class="container-fluid">
				<table id="tablemenu2" class="table table-responsice table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Sub Menu</th>
							<th>Sub Icon</th>
							<th>Sub Link</th>
							<th>Menu 1</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							foreach ($menu2 as $row) {
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['submenu_name'] ?></td>
							<td><?= $row['submenu_class'] ?></td>
							<td><?= $row['submenu_url'] ?></td>
							<td><?= $row['menu_name'] ?></td>
							<td>
								<button type="button" class="btn btn-info editmenu2" id="editmenu2" data-id="<?= $row['submenu_id'] ?>">Edit</button>
								<button type="button" class="btn btn-danger deletemenu2" id="deletemenu2" data-id="<?= $row['submenu_id'] ?>">Hapus</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="tambahmenu1">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('utility/store_menu1');?>" method="post" class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Menu 1</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="form-group">
								<label for="menu_name" class="col-sm-3">Menu Menu</label>
								<div class="col-sm-9">
									<input type="text" name="menu_name" id="menu_name" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menu_icon" class="col-sm-3">Menu Icon</label>
								<div class="col-sm-9">
									<input type="text" name="menu_class" id="menu_icon" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menu_link" class="col-sm-3">Menu Url</label>
								<div class="col-sm-9">
									<input type="text" name="menu_url" id="menu_link" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="have_submenu" class="col-sm-3">Have Submenu</label>
								<div class="col-sm-9">
									<select name="have_submenu" id="have_submenu" class="form-control">
										<option value="">-- pilih status --</option>
										<option value="1">Have</option>
										<option value="0">Not Have</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modaleditmenu1">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('utility/update_menu1');?>" method="post" class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Menu 1</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<input type="hidden" class="hidden" name="menuid" id="menuid">
							<div class="form-group">
								<label for="menuname" class="col-sm-3">Menu Menu</label>
								<div class="col-sm-9">
									<input type="text" name="menu_name" id="menuname" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menuicon" class="col-sm-3">Menu Icon</label>
								<div class="col-sm-9">
									<input type="text" name="menu_class" id="menuicon" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menulink" class="col-sm-3">Menu Url</label>
								<div class="col-sm-9">
									<input type="text" name="menu_url" id="menulink" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="havesubmenu" class="col-sm-3">Have Submenu</label>
								<div class="col-sm-9">
									<select name="have_submenu" id="havesubmenu" class="form-control">
										<option value="">-- pilih status --</option>
										<option value="1">Have</option>
										<option value="0">Not Have</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="tambahmenu2">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('utility/store_menu2');?>" method="post" class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Menu 2</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<input type="hidden" class="hidden" name="submenuid" id="submenu_id">
							<div class="form-group">
								<label for="menuname" class="col-sm-3">SubMenu Menu</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_name" id="submenu_name" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menuicon" class="col-sm-3">SubMenu Icon</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_class" id="submenu_icon" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menulink" class="col-sm-3">SubMenu Url</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_url" id="submenu_link" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menuid" class="col-sm-3">Menu</label>
								<div class="col-sm-9">
									<select name="menu_id" id="menu_id" class="form-control">
										<option value="">-- pilih main menu --</option>
										<?php foreach($menu1 as $row) { ?>
											<?php if($row['have_submenu'] == 1) { ?>
												<option value="<?= $row['menu_id'] ?>"><?= $row['menu_name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modaleditmenu2">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('utility/update_menu2');?>" method="post" class="form-horizontal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Menu 2</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<input type="hidden" class="hidden" name="submenuid" id="submenuid">
							<div class="form-group">
								<label for="submenuname" class="col-sm-3">SubMenu Menu</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_name" id="submenuname" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="submenuicon" class="col-sm-3">SubMenu Icon</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_class" id="submenuicon" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="submenulink" class="col-sm-3">SubMenu Url</label>
								<div class="col-sm-9">
									<input type="text" name="submenu_url" id="submenulink" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="menuid" class="col-sm-3">Menu</label>
								<div class="col-sm-9">
									<select name="menu_id" id="menu_id" class="form-control">
										<option value="">-- pilih main menu --</option>
										<?php foreach($menu1 as $row) { ?>
											<?php if($row['have_submenu'] == 1) { ?>
												<option value="<?= $row['menu_id'] ?>"><?= $row['menu_name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>