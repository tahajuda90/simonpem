<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SatuanKerja extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Satker'));
    }
    
    public function index(){
        $data['satker'] = $this->M_Satker->get_all();
        $data['page'] = 'page/satuankerja';
        $this->load->view('main',$data);
    }
    
    public function create(){
        $data['satker'] = (object) array('stk_nama'=> set_value('stk_nama'),'stk_alamat'=> set_value('stk_alamat'),'stk_telepon'=> set_value('stk_telepon'));
        $data['page'] = 'page/satuankerja';
        $data['action'] = base_url('C_SatuanKerja/store');
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store(){
        $this->form_validation->set_rules('stk_nama', 'Nama Satuan Kerja', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $satker = $this->input->post(array('stk_nama','stk_alamat','stk_telepon'));
            if($this->M_Satker->insert($satker)){
                $this->index();
            }else{
                $this->create();
            }
        }
    }
    
    public function edit($id_satker){
        $data['satker'] = $this->M_Satker->get_by_id($id_satker);
        $data['page'] = 'page/satuankerja';
        $data['action'] = base_url('C_SatuanKerja/store_edit/'.$data['satker']->id_satker);
        $data['button'] = 'Ubah';
        $this->load->view('main',$data);
    }
    
    public function store_edit($id_satker){
        $data['satker'] = $this->M_Satker->get_by_id($id_satker);
        $this->form_validation->set_rules('stk_nama', 'Nama Satuan Kerja', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($data['satker']->id_satker);
        }else{            
            $satker = $this->input->post(array('stk_nama','stk_alamat','stk_telepon'));
            if($this->M_Satker->update($data['satker']->id_satker,$satker)){
                $this->index();
            }else{
                $this->edit($data['satker']->id_satker);
            }
        }
    }
    
    public function delete(){
        
    }
}