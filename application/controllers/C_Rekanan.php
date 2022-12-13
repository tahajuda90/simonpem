<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Rekanan extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rekanan'));
    }
    
    public function index(){
        $data['rekanan'] = $this->M_Rekanan->get_all();
        $data['page'] = 'page/rekanan';
        $this->load->view('main',$data);
    }
    
    public function create(){
        $data['rekanan'] = (object) array('rkn_nama'=> set_value('rkn_nama'),'rkn_npwp'=> set_value('rkn_npwp'),'rkn_alamat'=> set_value('rkn_alamat'),'lhk_no'=> set_value('lhk_no'),'lhk_tanggal'=> set_value('lhk_tanggal'),'lhk_notaris'=> set_value('lhk_notaris'));
        $data['page'] = 'page/rekanan';
        $data['action'] = base_url('C_Rekanan/store');
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store(){
        $this->form_validation->set_rules('rkn_nama', 'Nama Rekanan ', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $rekanan = $this->input->post(array('rkn_nama','rkn_alamat','rkn_npwp','lhk_no','lhk_tanggal','lhk_notaris'));
            if($this->M_Rekanan->insert($rekanan)){
                redirect('penyedia');
            }else{
                redirect('penyedia/create');
            }
        }
    }


    public function edit($id_rekanan){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_rekanan);
        $data['page'] = 'page/rekanan';
        $data['action'] = base_url('C_Rekanan/store_edit/'.$data['rekanan']->id_rekanan);
        $data['button'] = 'Ubah';
        $this->load->view('main',$data);
    }
    
    public function store_edit(){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_rekanan);
        $this->form_validation->set_rules('rkn_nama', 'Nama Rekanan ', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->store_edit($data['rekanan']->id_rekanan);
        } else {
            $rekanan = $this->input->post(array('rkn_nama','rkn_alamat','rkn_npwp','lhk_no','lhk_tanggal','lhk_notaris'));
            if($this->M_Rekanan->update($data['rekanan']->id_rekanan,$rekanan)){
                redirect('penyedia');
            }else{
                redirect('penyedia/edit/'.$data['rekanan']->id_rekanan);
            }
        }
    }
    
    public function delete(){
        
    }
}