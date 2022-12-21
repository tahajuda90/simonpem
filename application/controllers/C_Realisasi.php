<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Realisasi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak', 'M_Laporan', 'M_Bukti'));
    }

    public function index() {
        $data['kontrak'] = $this->M_Laporan->kontrak();
        $data['page'] = 'page/realisasi';
        $this->load->view('main', $data);
    }

    public function realisasi($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['laporan'] = $this->M_Laporan->get_cond(array($this->M_Laporan->table . '.id_kontrak' => $data['kontrak']->id_kontrak));
        foreach ($data['laporan'] as $key => $lpr) {
            $data['laporan'][$key]->bukti = $this->M_Bukti->get_cond(array('id_lpr' => $lpr->id_lpr));
        }
        $data['page'] = 'page/realisasi';
        $this->load->view('main', $data);
    }

    public function realisasi_create($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['laporan'] = (object) array('rencana' => set_value('rencana'), 'realisasi' => set_value('realisasi'), 'keterangan' => set_value('keterangan'), 'kendala' => set_value('kendala'), 'minggu' => set_value('minggu'), 'tanggal_awal' => set_value('tanggal_awal'), 'tanggal_akhir' => set_value('tanggal_akhir'));
        $data['action'] = base_url('C_Realisasi/store/' . $data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $data['page'] = 'page/realisasi';
        $this->load->view('main', $data);
    }

    public function store($id_kontrak) {
        $this->form_validation->set_rules('rencana', 'Rencana', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => "error", 'msg' => validation_errors()));
        } else {
            $laporan = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir', 'kendala'));
            $laporan['id_kontrak'] = $data['kontrak']->id_kontrak;
            $id_lpr = $this->M_Laporan->insert_id($laporan);
            if (isset($id_lpr)) {
                echo json_encode(array('status' => "success", 'id_lpr' => $id_lpr));
            } else {
                echo json_encode(array('status' => "error", 'msg' => 'tidak masuk'));
            }
        }
    }

    public function realisasi_edit($id_lpr) {
//        $bukti = $this->M_Bukti->get_cond(array('id_lpr'=>$data['laporan']->id_lpr));
        $data['laporan'] = $this->M_Laporan->get_by_id($id_lpr);
        $data['bukti'] = empty($this->M_Bukti->get_cond(array('id_lpr' => $data['laporan']->id_lpr))) ? array() : $this->M_Bukti->get_cond(array('id_lpr' => $data['laporan']->id_lpr));
        $data['action'] = base_url('C_Realisasi/store_edit/' . $data['laporan']->id_lpr);
        $data['button'] = 'Ubah';
        $data['page'] = 'page/realisasi';
        $this->load->view('main', $data);
    }

    public function store_edit($id_lpr) {
        $this->form_validation->set_rules('rencana', 'Rencana', 'trim|required');
        $data['laporan'] = $this->M_Laporan->get_by_id($id_lpr);
        $pkrj = $this->input->post($this->M_LapPeker->id_only(array('id_lpr' => $data['laporan']->id_lpr)));
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => "error", 'msg' => validation_errors()));
        } else {
            $laporan = $this->input->post(array('rencana', 'realisasi', 'keterangan', 'bulan', 'minggu', 'tanggal_awal', 'tanggal_akhir', 'kendala'));
            $this->M_Laporan->update($data['laporan']->id_lpr, $laporan);
            foreach ($pkrj as $key => $val) {
                $this->M_LapPeker->update($key, array('bobot' => $val));
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
            echo json_encode(array('status' => 'success', 'imgdata' => $this->upload->data('file_name'), 'id_kontrak' => $lap->id_kontrak));
//            redirect('C_Laporan/laporan_rinci/'.$lap->id_lpr);
        } else {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array('status' => 'error', 'msg' => $error, 'id_kontrak' => $lap->id_kontrak));
//            redirect('C_Laporan/laporan_edit/'.$lap->id_lpr);
        }
    }

    public function delete_bukti($id_bkti) {
        $bukti = $this->M_Bukti->get_by_id($id_bkti);
        $id_lpr = $bukti->id_lpr;
        if (unlink(FCPATH . '/assets/gambar/' . $bukti->image)) {
            $this->M_Bukti->delete($bukti->id_bkti);
        }
        redirect('realisasi/edit/' . $id_lpr);
    }

}
