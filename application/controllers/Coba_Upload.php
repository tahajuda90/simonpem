<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba_Upload extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Laporan'));
    }
    
    public function index(){
        $data['page'] = 'page/cobaUpload';
        $data['laporan'] = (object) array('rencana'=> set_value('rencana'),'realisasi'=> set_value('realisasi'),'keterangan'=> set_value('keterangan'),'bulan'=> set_value('bulan'),'minggu'=> set_value('minggu'),'tanggal_awal'=> set_value('tanggal_awal'),'tanggal_akhir'=> set_value('tanggal_akhir'));
        $data['action'] = base_url('Coba_Upload/store');
        $this->load->view('main',$data);
    }
    
    public function store() {
        $this->form_validation->set_rules('rencana', 'Rencana Pekerjaan', 'trim|required');
        $lapor = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir'));
        $id_lpr = $this->M_Laporan->insert_id($lapor);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => "error", 'msg' => validation_errors()));
        } else {
            if(isset($id_lpr)) {
                echo json_encode(array('status' => "success", 'id_lpr' => $id_lpr));
            } else {
                echo json_encode(array('status' => "error", 'msg' => 'tidak masuk'));
            }
        }
    }

    public function upload(){
                $uplpath = FCPATH.'/assets/gambar/';
                if(!is_dir($uplpath)){
                    mkdir($uplpath,0777,TRUE);
                }
                $config['upload_path']          = $uplpath;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
//		$config['max_size']             = 10000;
//                $config['encrypt_name']         = TRUE;
//                $config['file_name']            = 'custom';
 
		$this->load->library('upload', $config);
 
		if ($this->upload->do_upload('image')){
			$data = array('upload_data' => $this->upload->data());
			print_r($data);
		}else{
                        $error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
    }
}