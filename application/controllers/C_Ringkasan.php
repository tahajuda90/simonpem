<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Ringkasan extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Ringkasan'));
    }
    
    public function index (){
        $data['kontrak'] = $this->M_Ringkasan->kontrak();
        $data['page'] = 'page/ringkasan';
//        print_r($data);
        $this->load->view('main',$data);
    }
    
    public function assign_regis(){
        $id_kontrak = $this->input->get('id_kontrak');
        $kontrak = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['title'] = $kontrak->pkt_nama;
        $data['value'] = $kontrak->no_registrasi;
        $data['action'] = base_url('C_Ringkasan/update/'.$kontrak->id_kontrak);
        echo json_encode($data);
    }
    
    public function update($id_kontrak){
        $kontrak = $this->M_Kontrak->get_by_id($id_kontrak);
        $no_registrasi = $this->input->post('no_registrasi');
        if($this->M_Kontrak->update($kontrak->id_kontrak,array('no_registrasi'=>$no_registrasi))){
            echo json_encode('success');          
        }else{
            echo json_encode('error');
        }
    }
}