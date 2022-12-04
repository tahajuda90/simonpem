<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Pekerjaan','M_Laporan','M_LapPeker','M_Bukti'));
    }
    
    public function laporan($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['laporan'] = $this->M_Laporan->get_cond(array($this->M_Laporan->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['page'] = 'page/laprealisasi';
        $this->load->view('main', $data);
    }
    
    public function laporan_rinci($id_lpr){
        $data['laporan'] = $this->M_Laporan->get_by_id($id_lpr);
        $data['pekerjaan'] = $this->M_LapPeker->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['bukti'] = $this->M_Bukti->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['page'] = 'page/laprealisasi';
        $this->load->view('main', $data);
    }
    
    public function laporan_create($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['laporan'] = (object) array('rencana'=> set_value('rencana'),'realisasi'=> set_value('realisasi'),'keterangan'=> set_value('keterangan'),'kendala'=> set_value('kendala'),'bulan'=> set_value('bulan'),'minggu'=> set_value('minggu'),'tanggal_awal'=> set_value('tanggal_awal'),'tanggal_akhir'=> set_value('tanggal_akhir'));
        $data['pekerjaan'] = $this->M_Pekerjaan->get_cond(array('id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['action'] = base_url('C_Laporan/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $data['page'] = 'page/laprealisasi';
        $this->load->view('main',$data);
    }
    
    public function laporan_edit(){
        
    }
    
    public function store($id_kontrak){
        $this->form_validation->set_rules('rencana', 'Rencana', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $pkrj = $this->input->post($this->M_Pekerjaan->id_only(array('id_kontrak'=>$data['kontrak']->id_kontrak)));
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => "error", 'msg' => validation_errors()));
        } else {
            $laporan = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir', 'kendala'));
            $laporan['id_kontrak'] = $data['kontrak']->id_kontrak;
            $id_lpr = $this->M_Laporan->insert_id($laporan);
            foreach($pkrj as $key=>$val){
                $this->M_LapPeker->insert(array('id_pkrj'=>$key,'bobot'=>$val,'id_lpr'=>$id_lpr));
            }
            if(isset($id_lpr)) {
                echo json_encode(array('status' => "success", 'id_lpr' => $id_lpr));
            } else {
                echo json_encode(array('status' => "error", 'msg' => 'tidak masuk'));
            }
        }
    }
    
    public function store_edit(){
        
    }
    
    public function upload() {
        $uplpath = FCPATH . '/assets/gambar/';
        if (!is_dir($uplpath)) {
            mkdir($uplpath, 0777, TRUE);
        }
        $config['upload_path'] = $uplpath;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
//		$config['max_size']             = 10000;
        $config['encrypt_name']         = TRUE;
//                $config['file_name']            = 'custom';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $id_lpr=$this->input->post('id_lpr');
            $image=$this->upload->data('file_name');
            $this->M_Bukti->insert(array('id_lpr'=>$id_lpr,'image'=>$image));
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }

}