<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Sanksi extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Sanksi'));
        $this->load->helper(array('ds_helper'));
    }
    
    public function index(){
        $data['kontrak'] = $this->M_Sanksi->kontrak();
        $data['page'] = 'page/sanksi';
        $this->load->view('main',$data);
    }
    
    public function sanksi($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['sanksi'] = $this->M_Sanksi->get_cond(array($this->M_Sanksi->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['page'] = 'page/sanksi';
        $this->load->view('main',$data);
    }
    
    public function sanksi_create($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['sanksi'] = (object)array('nmr_denda'=> set_value('nmr_denda'),'tanggal'=> set_value('tanggal'),'jns_sanksi'=> set_value('jns_sanksi'),'sanksi'=> set_value('sanksi'),'denda_nilai'=> set_value('denda_nilai'),'kendala'=> set_value('kendala'),'dokumen'=> set_value('dokumen'));
        $data['page'] = 'page/sanksi';
        $data['action'] = base_url('C_Sanksi/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store($id_kontrak){
        $this->form_validation->set_rules('nmr_denda', 'Nomor Denda', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('C_Sanksi/sanksi_create/'.$data['kontrak']->id_kontrak));
        }else{
            $sanksi = $this->input->post(array('nmr_denda','tanggal','jns_sanksi','sanksi','denda_nilai','kendala'));
            $sanksi['id_kontrak'] = $data['kontrak']->id_kontrak;
            $this->upload();
            $done = true;
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $sanksi['dokumen'] = $this->upload->data('file_name');
                $this->M_Sanksi->insert($sanksi);
                $done = true;
            }else{
                $done = false;
            }
            if($done){
                redirect(base_url('C_Sanksi/sanksi/'.$data['kontrak']->id_kontrak));
            }else{
                redirect(base_url('C_Sanksi/sanksi_create/'.$data['kontrak']->id_kontrak));
            }
        }
    }
    
    public function sanksi_update($id_snksi){
        $data['sanksi'] = $this->M_Sanksi->get_by_id($id_snksi);
        $data['page'] = 'page/sanksi';
        $data['action'] = base_url('C_Sanksi/store_edit/'.$data['sanksi']->id_snksi);
        $data['button'] = 'Update';
        $this->load->view('main',$data);
    }
    
    public function store_edit($id_snksi){
        $data['sanksi'] = $this->M_Sanksi->get_by_id($id_snksi);
        $this->form_validation->set_rules('nmr_denda', 'Nomor Denda', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('C_Sanksi/sanksi_update/'.$data['sanksi']->id_snksi));
        }else{
            $sanksi = $this->input->post(array('nmr_denda','tanggal','jns_sanksi','sanksi','denda_nilai','kendala'));
            $this->upload();
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $sanksi['dokumen'] = $this->upload->data('file_name');
            }
            if($this->M_Sanksi->insert($sanksi)){
                redirect(base_url('C_Sanksi/sanksi/'.$data['sanksi']->id_kontrak));
            }else{
                redirect(base_url('C_Sanksi/sanksi_update/'.$data['sanksi']->id_snksi));
            }
        }
    }
    
    public function delete($id_snksi){
        
    }
    
    function upload(){
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