<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Perhitungan extends MY_Controller {
    
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
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['hitung'] = $this->M_PerAkhir->get_cond(array($this->M_PerAkhir->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['page'] = 'page/perhitungan';
        $this->load->view('main',$data);
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
        $this->form_validation->set_rules('no_ba', 'Nomor Berita Acara', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('hitung/create/'.$data['kontrak']->id_kontrak));
        }else{
            $hitung = $this->input->post(array('no_ba','tanggal','prosentase','hitung_nilai','kendala'));
            $hitung['id_kontrak'] = $data['kontrak']->id_kontrak;
            $this->upload();
            $done = true;
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $hitung['dokumen'] = $this->upload->data('file_name');
                $this->M_PerAkhir->insert($hitung);
                $done = true;
            }else{
                $done = false;
            }
            if($done){
                redirect(base_url('hitung/list/'.$data['kontrak']->id_kontrak));
            }else{
                redirect(base_url('hitung/create/'.$data['kontrak']->id_kontrak));
            }
        }
    }
    
    public function hitung_update($id_prakhir){
        $data['hitung'] = $this->M_PerAkhir->get_by_id($id_prakhir);
        $data['page'] = 'page/perhitungan';
        $data['action'] = base_url('C_Perhitungan/store_update/'.$data['hitung']->id_prakhir);
        $data['button'] = 'Ubah';
        $this->load->view('main',$data);
    }
    
    public function store_edit($id_prakhir){
        $data['hitung'] = $this->M_PerAkhir->get_by_id($id_prakhir);
        $this->form_validation->set_rules('no_ba', 'Nomor Berita Acara', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('hitung/edit/'.$data['hitung']->id_prakhir));
        }else{
            $hitung = $this->input->post(array('no_ba','tanggal','prosentase','hitung_nilai','kendala'));
            $this->upload();
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $hitung['dokumen'] = $this->upload->data('file_name');
            }
            if($this->M_PerAkhir->update($data['hitung']->id_prakhir,$hitung)){
                redirect(base_url('hitung/list/'.$data['kontrak']->id_kontrak));
            }else{
                redirect(base_url('hitung/edit/'.$data['hitung']->id_prakhir));
            }
        }
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