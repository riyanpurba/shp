<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('menumodel');
	}

	public function menu(){
		$data['menu1'] = $this->menumodel->getMenu1();
		$data['menu2'] = $this->menumodel->getMenu2();
		$this->template->display('utility/menu/index', $data);
	}

	public function store_menu1() {
		$menu1['menu_name'] = $this->input->post('menu_name');
		$menu1['menu_class'] = $this->input->post('menu_class');
		$menu1['menu_url'] = $this->input->post('menu_url');
		$menu1['have_submenu'] = (int) $this->input->post('have_submenu');
		$savemenu1 = $this->menumodel->storeMenu1($menu1);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan</div>');
		redirect('utility/menu');
	}

	public function edit_menu1(){
		$id = $this->input->post('id');
		$data = $this->menumodel->getMenu1ByID($id);
		echo json_encode($data);
	}

	public function update_menu1(){
		$id = $this->input->post('menuid');
		$menu1['menu_name'] = $this->input->post('menu_name');
		$menu1['menu_class'] = $this->input->post('menu_class');
		$menu1['menu_url'] = $this->input->post('menu_url');
		$menu1['have_submenu'] = (int) $this->input->post('have_submenu');
		$updatemenu1 = $this->menumodel->updateMenu1($menu1, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah</div>');
		redirect('utility/menu');
	}

	public function delete_menu1(){
		$id = (int) $this->input->post('id');
		$data = $this->menumodel->destroyMenu1($id);
		echo json_encode($data);
	}

	public function store_menu2(){
		$menu2['menu_id'] = $this->input->post('menu_id');
		$menu2['submenu_name'] = $this->input->post('submenu_name');
		$menu2['submenu_class'] = $this->input->post('submenu_class');
		$menu2['submenu_url'] = $this->input->post('submenu_url');
		$savemenu2 = $this->menumodel->storeMenu2($menu2);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil ditambahkan</div>');
		redirect('utility/menu');
	}

	public function edit_menu2(){
		$id = $this->input->post('submenuid');
		$data = $this->menumodel->getMenu2ByID($id);
		echo json_encode($data);
	}

	public function update_menu2(){
		$id = $this->input->post('submenuid');
		$menu2['menu_id'] = $this->input->post('menu_id');
		$menu2['submenu_name'] = $this->input->post('submenu_name');
		$menu2['submenu_class'] = $this->input->post('submenu_class');
		$menu2['submenu_url'] = $this->input->post('submenu_url');
		$updatemenu2 = $this->menumodel->updateMenu2($menu2, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil diubah</div>');
		redirect('utility/menu');
	}

	public function delete_menu2(){
		$id = (int) $this->input->post('submenuid');
		$data = $this->menumodel->destroyMenu2($id);
		echo json_encode($data);
	}
}