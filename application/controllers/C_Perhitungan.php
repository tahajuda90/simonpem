<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Perhitungan extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_PerAkhir'));
    }
    
    public function index(){
        $data['kontrak'] = $this->M_PerAkhir->kontrak();
        $data['page'] = 'page/perhitungan';
        $this->load->view('main',$data);
    }
    
    public function hitung($id_kontrak){
        
    }
    
    public function hitung_create($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['hitung'] = (object)array('no_ba'=> set_value('no_ba'),'tanggal'=> set_value('tanggal'),'prosentase'=> set_value('prosentase'),'hitung_nilai'=> set_value('hitung_nilai'),'kendala'=>set_value('kendala'),'dokumen'=> set_value('dokumen'));
        $data['page'] = 'page/perhitungan';
        $data['action'] = base_url('C_Perhitungan/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store($id_kontrak){
        
    }
    
    public function hitung_update($id_prakhir){
        
    }
    
    public function store_edit($id_prakhir){
        
    }
    
    public function delete($id_prakhir){
        
    }
    
    function upload() {
        $uplpath = FCPATH . '/assets/dokumen/';
        if (!is_dir($uplpath)) {
            mkdir($uplpath, 0777, TRUE);
        }
        $config['upload_path'] = $uplpath;
        $config['allowed_types'] = 'pdf';
//		$config['max_size']             = 10000;
        $config['encrypt_name'] = TRUE;
//                $config['file_name']            = 'custom';

        $this->load->library('upload', $config);
    }

}