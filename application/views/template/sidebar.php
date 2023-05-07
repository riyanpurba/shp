<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="">
				<a href="<?= base_url();?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<?php foreach($_getMenu1 as $menu1):?>
				<?php if($menu1->have_submenu == 1){?>
					<li class="treeview">
						<a href="<?= $menu1->menu_url ?>">
							<i class="<?= $menu1->menu_class ?>"></i> <span><?= $menu1->menu_name ?></span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<?php foreach($_getMenu2 as $menu2): ?>
								<?php if($menu2->menu_id == $menu1->menu_id) { ?>
									<li><a href="<?= base_url().$menu2->submenu_url ?>"><i class="fa fa-circle-o"></i> <?= $menu2->submenu_name ?></a></li>
								<?php } ?>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php }else { ?>
					<li>
						<a href="<?= base_url(). $menu1->menu_url ?>"><i class="<?= $menu1->menu_class ?>"></i><span><?= $menu1->menu_name ?></span></a>
					</li>
				<?php }?>
			<?php endforeach;?>
		</ul>
	</section>
</aside>