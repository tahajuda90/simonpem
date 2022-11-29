<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Realisasi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Pekerjaan','M_Laporan'));
    }
    
    public function index(){
        $data['kontrak'] = $this->M_Laporan->kontrak();
        $data['page'] = 'page/realisasi';
        $this->load->view('main',$data);
    }
    
    public function uraian($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['uraian'] = (object) array('uraian_pkrj'=> set_value('uraian_pkrj'),'satuan'=> set_value('satuan'),'volume'=> set_value('volume'));
        $data['pekerjaan'] = $this->M_Pekerjaan->get_cond(array('id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['action'] = base_url('C_Realisasi/uraian_store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $data['page'] = 'page/uraian';
        $this->load->view('main',$data);
    }
    
    public function uraian_store($id_kontrak){
        $this->form_validation->set_rules('uraian_pkrj', 'Uraian Pekerjaan', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            $this->uraian($data['kontrak']->id_kontrak);
        } else {
            $uraian = $this->input->post(array('uraian_pkrj', 'satuan', 'volume'));
            $uraian['id_kontrak'] = $data['kontrak']->id_kontrak;
            if($this->M_Pekerjaan->insert($uraian)){
                redirect(base_url('C_Realisasi/uraian/'.$data['kontrak']->id_kontrak));
            }else{
                $this->uraian($data['kontrak']->id_kontrak);
            }
        }
    }
    
    public function uraian_edit($id_pkrj){
        $data['uraian'] = $this->M_Pekerjaan->get_by_id($id_pkrj);
        $data['kontrak'] = $this->M_Kontrak->get_by_id($data['uraian']->id_kontrak);
        $data['action'] = base_url('C_Realisasi/uraian_store_edit/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Ubah';
        $data['page'] = 'page/uraian';
        $this->load->view('main',$data);
    }
    
    public function uraian_store_edit($id_pkrj){
        $data['uraian'] = $this->M_Pekerjaan->get_by_id($id_pkrj);
         $this->form_validation->set_rules('uraian_pkrj', 'Uraian Pekerjaan', 'trim|required');
         if ($this->form_validation->run() == FALSE) {
             $this->uraian_edit($data['uraian']->id_pkrj);
         }else{
             $uraian = $this->input->post(array('uraian_pkrj', 'satuan', 'volume'));
             if($this->M_Pekerjaan->update($data['uraian']->id_pkrj,$uraian)){
                 redirect(base_url('C_Realisasi/uraian/'.$data['kontrak']->id_kontrak));
             }else{
                 $this->uraian_edit($data['uraian']->id_pkrj);
             }
         }
    }
}