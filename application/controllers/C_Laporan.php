<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Pekerjaan','M_Laporan'));
    }
    
    public function laporan($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['laporan'] = (object) array('rencana'=> set_value('rencana'),'realisasi'=> set_value('realisasi'),'keterangan'=> set_value('keterangan'),'kendala'=> set_value('kendala'),'bulan'=> set_value('bulan'),'minggu'=> set_value('minggu'),'tanggal_awal'=> set_value('tanggal_awal'),'tanggal_akhir'=> set_value('tanggal_akhir'));
        $data['pekerjaan'] = $this->M_Pekerjaan->get_cond(array('id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['action'] = base_url('C_Laporan/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $data['page'] = 'page/laprealisasi';
        $this->load->view('main',$data);
    }
    
    public function store($id_kontrak){
        $this->form_validation->set_rules('rencana', 'Rencana', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => "error", 'msg' => validation_errors()));
        } else {
            $laporan = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir', 'kendala'));
            $laporan['id_kontrak'] = $data['kontrak']->id_kontrak;
            $id_lpr = $this->M_Laporan->insert_id($laporan);
            if(isset($id_lpr)) {
                echo json_encode(array('status' => "success", 'id_lpr' => $id_lpr));
            } else {
                echo json_encode(array('status' => "error", 'msg' => 'tidak masuk'));
            }
        }
    }
    
    public function upload(){
        
    }
}