<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('pengaduanmodel');
		$this->load->model('jabatanmodel');
		$this->load->model('departmentmodel');
		$this->load->model('uploadimagemodel');
	}

	public function index(){
		$data['jabatan'] = $this->jabatanmodel->getJabatan();
		$data['department'] = $this->departmentmodel->getDepartment();
		$this->template->display('pengaduan/index', $data);
	}

	public function list() {
		$data['pengaduan'] = $this->pengaduanmodel->getPengaduan();
		$this->template->display('pengaduan/list', $data);
	}

	public function store () {
		$query = $this->db->query("SELECT COUNT(id) as total FROM tbl_pengaduan");
		$no_pengaduan = "";
		if($query->num_rows()>0){
			foreach($query->result() as $k){
				$tmp = ((int)$k->total)+1;
				$no = sprintf("%04s", $tmp);
			}
		}else{
			$no = "0001";
		}

		$nomor_pengaduan = "NP".$no;

		$data['no_pengaduan'] = $nomor_pengaduan;
		$data['nama_pelapor'] = $this->input->post('txtNamaLengkap');
		$data['jabatan'] = $this->input->post('txtJabatan');
		$data['departemen'] = $this->input->post('txtDept');
		$data['nama_tertuju'] = $this->input->post('txtNamaTertuju');
		$data['nama_barang'] = $this->input->post('txtNamaBarang');
		$data['status'] = 1;
		$data['keterangan'] = $this->input->post('txtKeterangan');
		$data['tanggal_lapor'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->session->userdata('userid');
		$data['created_date'] = date('Y-m-d H:i:s');

		$savedata = $this->pengaduanmodel->store($data);

		// Create the upload directory
    $upload_dir = './uploads/' . date('d-m-Y');
    if (!file_exists($upload_dir)) {
      mkdir($upload_dir, 0777, true);
    }

    $files = $_FILES['foto'];

    $dataimage = array();

    // Loop through the uploaded files
    for ($i = 0; $i < count($files['name']); $i++) {
			$file_name = $files['name'][$i];
			$file_tmp = $files['tmp_name'][$i];
			$file_type = $files['type'][$i];
			$file_size = $files['size'][$i];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $disk_name = $file_name;
      $file_name = date('d-m-Y') . '_' . uniqid() . '.' . $file_ext;
      $file_path = $upload_dir . '/' . $file_name;
      $compress_path = $upload_dir . '/compress_' . $file_name;
      $base64_str = '';

      // Compress the image
      $this->compress_image($files['tmp_name'][$i], $compress_path);

      // Convert the compressed image to base64
      $base64_str = $this->image_to_base64($compress_path);

      // Move the compressed image to the upload directory
      rename($compress_path, $file_path);

      // Save the image details to the database
      // $this->image_model->save_image($disk_name, $file_name, $base64_str);

      $dataimage[] = array(
				'no_pengaduan' => $nomor_pengaduan,
        'disk_name' => $disk_name,
        'file_name' => $file_name,
        'base64' => $base64_str,
				'created_by' => $this->session->userdata('userid'),
				'created_date' => date('Y-m-d H:i:s'),
      );
    }
		$this->db->insert_batch('tbl_image_pengaduan', $dataimage);

		$this->session->set_flashdata('message',"<div class='alert alert-success'><i class='fa fa-success'>&nbsp;</i><h4><strong>$nomor_pengaduan</strong></h4><p>Harap catat kode diatas untuk melakukan pengecekan sendiri melalui kolom pencarian.</p></div>");
		redirect('pengaduan');

		// var_dump($data);
		// $data = [
		// 	'nama_pelapor' => $this->input->post('txtNamaLengkap'),
		// 	'jabatan' => $this->input->post('txtJabatan'),
		// 	'department' => $this->input->post('txtDept'),
		// 	'nama_tertuju' => $this->input->post('txtNamaTertuju'),
		// 	'nama_barang' => $this->input->post('txtNamaBarang'),
		// 	'keterangan' => $this->input->post('txtKeterangan'),
		// 	'status' => 1,
		// 	'tanggal_lapor' => date('Y-m-d H:i:s'),
		// 	'created_by' => $this->session->userdata('userid'),
		// 	'created_date' => date('Y-m-d H:i:s'),
		// ];
		// // Create the uploads directory with today's date as its name
    // $uploads_dir = './uploads/' . date('d-m-Y') . '/';
    // if (!is_dir($uploads_dir)) {
    //   mkdir($uploads_dir, 0777, true);
    // }
		// $data = array();
    // $files = $_FILES['foto'];
    // $count = count($files['name']);

    // for ($i = 0; $i < $count; $i++) {
    //   if ($files['error'][$i] == UPLOAD_ERR_OK) {
    //     // Compress the image
    //     $config['image_library'] = 'gd2';
    //     $config['source_image'] = $files['tmp_name'][$i];
    //     $config['quality'] = '60%';
    //     $config['new_image'] = $uploads_dir . $files['name'][$i];
    //     $this->load->library('image_lib', $config);
    //     $this->image_lib->resize();

    //     // Convert the image to base64 with its format
    //     $base64_str = $this->image_to_base64($uploads_dir . $files['name'][$i]);

    //     // Save the image to the uploads directory
    //     move_uploaded_file($files['tmp_name'][$i], $uploads_dir . $files['name'][$i]);

    //     // Save the image information to the database
    //     $this->save_image_to_database($files['name'][$i], $uploads_dir . $files['name'][$i], $base64_str);
    //   }
    // }
		// $path = './uploads/'.date('d-m-Y').'/';
		// if (!is_dir($path)) {
		// 	mkdir($path, 0777, TRUE);
		// }
		// $files = $_FILES['foto'];
		// $count_files = count($files['name']);
		// for ($i=0; $i < $count_files; $i++) { 
		// 	$file_name = $files['name'][$i];
		// 	$file_tmp = $files['tmp_name'][$i];
		// 	$file_type = $files['type'][$i];
		// 	$file_size = $files['size'][$i];
		// 	$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
		// 	$image_str = file_get_contents($file_name);
		// 	$base64_str = 'data:image/' . $file_ext . ';base64,' . base64_encode($image_str);
		// 	$name_dist = $file_name;
		// 	$name_file = date("Ymd") . "_" . uniqid() . "." . $file_ext;
		// 	var_dump($base64_str);
		// }
	}

	private function compress_image($source_file, $destination_file, $quality = 80) {
    $info = getimagesize($source_file);
    if ($info['mime'] == 'image/jpeg') {
      $image = imagecreatefromjpeg($source_file);
    } elseif ($info['mime'] == 'image/gif') {
      $image = imagecreatefromgif($source_file);
    } elseif ($info['mime'] == 'image/png') {
      $image = imagecreatefrompng($source_file);
    }
    imagejpeg($image, $destination_file, $quality);
    imagedestroy($image);
  }

  private function image_to_base64($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $img_str = file_get_contents($filename);
    $base64_str = 'data:image/' . $extension . ';base64,' . base64_encode($img_str);
    return $base64_str;
  }
}