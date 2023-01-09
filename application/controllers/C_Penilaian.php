<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Penilaian extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Penilaian','M_Kontrak'));
    }
    
    public function store($id_kontrak){
        $kontrak = $this->M_Kontrak->get_by_id($id_kontrak);
        $nilai = array('id_kontrak'=>$kontrak->id_kontrak,'id_rekanan'=>$kontrak->id_rekanan,'lls_id'=>$kontrak->lls_id,'rkn_id'=>$kontrak->lls_id);
        $nilai['nilai'] = $this->input->post('nilai');
        $this->upload();
        if(isset($_FILES['dokumen']['name'])){
            $this->upload->do_upload('dokumen');
            $nilai['dokumen'] = $this->upload->data('file_name');
        }
        if($this->M_Penilaian->insert($nilai)){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }
    
    
    public function assign_nilai(){
        $id_kontrak = $this->input->get('id_kontrak');
        $kontrak = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['title'] = $kontrak->pkt_nama;
        $data['action'] = base_url('C_Penilaian/store/'.$kontrak->id_kontrak);
        echo json_encode($data);
    }

    function upload() {
        $uplpath = FCPATH . '/assets/dokumen/';
        if (!is_dir($uplpath)) {
            mkdir($uplpath, 0777, TRUE);
        }
        $config['upload_path'] = $uplpath;
        $config['allowed_types'] = 'png|jpg|jpeg';
//		$config['max_size']             = 10000;
        $config['encrypt_name'] = TRUE;
//                $config['file_name']            = 'custom';

        $this->load->library('upload', $config);
    }

}
