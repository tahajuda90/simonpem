<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends MY_Controller {
    
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
    
    public function laporan_edit($id_lpr){
//        $bukti = $this->M_Bukti->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['laporan'] = $this->M_Laporan->get_by_id($id_lpr);
        $data['lapPeker'] = $this->M_LapPeker->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['bukti'] = empty($this->M_Bukti->get_cond(array('id_lpr'=>$data['laporan']->id_lpr))) ? array() : $this->M_Bukti->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['action'] = base_url('C_Laporan/store_edit/'.$data['laporan']->id_lpr);
        $data['button'] = 'Ubah';
        $data['page'] = 'page/laprealisasi';
        $this->load->view('main',$data);
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
    
    public function store_edit($id_lpr){
        $this->form_validation->set_rules('rencana', 'Rencana', 'trim|required');
        $data['laporan'] = $this->M_Laporan->get_by_id($id_lpr);
        $pkrj = $this->input->post($this->M_LapPeker->id_only(array('id_lpr'=>$data['laporan']->id_lpr)));
        if ($this->form_validation->run() == FALSE) {
        echo json_encode(array('status' => "error", 'msg' => validation_errors()));        
        }else{
            $laporan = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir', 'kendala'));
            $this->M_Laporan->update($data['laporan']->id_lpr,$laporan);
            foreach ($pkrj as $key=>$val){
                $this->M_LapPeker->update($key,array('bobot'=>$val));
            }
            echo json_encode(array('status' => "success", 'id_lpr' => $data['laporan']->id_lpr));
        }
        
    }
    
    public function upload() {
        $uplpath = FCPATH . '/assets/gambar/';
        if (!is_dir($uplpath)) {
            mkdir($uplpath, 0777, TRUE);
        }
        $config['upload_path'] = $uplpath;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
//		$config['max_size']             = 10000;
        $config['encrypt_name'] = TRUE;
//                $config['file_name']            = 'custom';

        $this->load->library('upload', $config);

        $id_lpr = $this->input->post('id_lpr');
        $lap = $this->M_Laporan->get_by_id($id_lpr);
        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data('file_name');
            $this->M_Bukti->insert(array('id_lpr' => $id_lpr, 'image' => $image));
            echo json_encode(array('status'=>'success','imgdata'=>$this->upload->data('file_name'),'id_kontrak'=>$lap->id_kontrak));
//            redirect('C_Laporan/laporan_rinci/'.$lap->id_lpr);
            
        } else {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array('status'=>'error','msg'=>$error,'id_kontrak'=>$lap->id_kontrak));
//            redirect('C_Laporan/laporan_edit/'.$lap->id_lpr);
        }
    }
    
    public function delete_bukti($id_bkti){
        $bukti = $this->M_Bukti->get_by_id($id_bkti);
        $id_lpr = $bukti->id_lpr;
        if(unlink(FCPATH . '/assets/gambar/'.$bukti->image)){
            $this->M_Bukti->delete($bukti->id_bkti);
        }
        redirect('C_Laporan/laporan_edit/'.$id_lpr);
    }
    
    
    public function uraian($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['uraian'] = (object) array('uraian_pkrj' => set_value('uraian_pkrj'), 'satuan' => set_value('satuan'), 'volume' => set_value('volume'));
        $data['pekerjaan'] = $this->M_Pekerjaan->get_cond(array('id_kontrak' => $data['kontrak']->id_kontrak));
        $data['action'] = base_url('C_Realisasi/uraian_store/' . $data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $data['page'] = 'page/uraian';
        $this->load->view('main', $data);
//        print_r($this->uri->segment($this->uri->total_segments()));
    }

    public function uraian_store($id_kontrak) {
        $this->form_validation->set_rules('uraian_pkrj', 'Uraian Pekerjaan', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            $this->uraian($data['kontrak']->id_kontrak);
        } else {
            $uraian = $this->input->post(array('uraian_pkrj', 'satuan', 'volume'));
            $uraian['id_kontrak'] = $data['kontrak']->id_kontrak;
            if ($this->M_Pekerjaan->insert($uraian)) {
                redirect(base_url('realisasi/uraian/' . $data['kontrak']->id_kontrak));
            } else {
                redirect(base_url('realisasi/uraian/' . $data['kontrak']->id_kontrak));
            }
        }
    }

    public function uraian_edit($id_pkrj) {
        $data['uraian'] = $this->M_Pekerjaan->get_by_id($id_pkrj);
        $data['kontrak'] = $this->M_Kontrak->get_by_id($data['uraian']->id_kontrak);
        $data['action'] = base_url('C_Realisasi/uraian_store_edit/' . $data['kontrak']->id_kontrak);
        $data['button'] = 'Ubah';
        $data['page'] = 'page/uraian';
        $this->load->view('main', $data);
    }

    public function uraian_store_edit($id_pkrj) {
        $data['uraian'] = $this->M_Pekerjaan->get_by_id($id_pkrj);
        $this->form_validation->set_rules('uraian_pkrj', 'Uraian Pekerjaan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->uraian_edit($data['uraian']->id_pkrj);
        } else {
            $uraian = $this->input->post(array('uraian_pkrj', 'satuan', 'volume'));
            if ($this->M_Pekerjaan->update($data['uraian']->id_pkrj, $uraian)) {
                redirect(base_url('realisasi/uraian/' . $data['kontrak']->id_kontrak));
            } else {
                redirect(base_url('realisasi/uraian/edit/' . $data['kontrak']->id_kontrak));
            }
        }
    }

}