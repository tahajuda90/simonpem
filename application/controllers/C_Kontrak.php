<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kontrak extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Satker','M_Rekanan','M_Ppk','M_Paket','M_Kontrak'));
        $this->load->helper(array('ds_helper'));
    }
    
    public function index(){
        $data['kontrak'] = $this->M_Kontrak->get_all();
        $data['page'] = 'page/kontrak';
        $data['action'] = base_url('C_Kontrak/tarik');
        $this->load->view('main',$data);
    }
    
    public function create(){
        $data['paket'] = (object) array('id_satker'=> set_value('id_satker'),'pkt_id'=> set_value('pkt_id'),'stk_id'=> set_value('stk_id'),'ppk_id'=> set_value('ppk_id'),'lls_id'=> set_value('lls_id'),'rup_id'=> set_value('rup_id'),'metode_pengadaan'=> set_value('metode_pengadaan'),'sbd_id'=> set_value('sbd_id'),'ang_tahun'=> set_value('ang_tahun'),
        'pkt_nama'=> set_value('pkt_nama'),'pkt_pagu'=> set_value('pkt_pagu'),'tanggal_awal_pengadaan'=> set_value('tanggal_awal_pengadaan'), 'jadwal_awal_pengumuman'=> set_value('jadwal_awal_pengumuman'),'pkt_lokasi'=> set_value('pkt_lokasi'),'alamat_lokasi'=> set_value('alamat_lokasi'),'latitude'=> set_value('latitude'),'longitude'=> set_value('longitude'));
        $data['kontrak'] = (object) array('id_paket'=> set_value('id_paket'),'id_rekanan'=> set_value('id_rekanan'),'lls_id'=> set_value('lls_id'),'rkn_id'=> set_value('rkn_id'),'kontrak_no'=> set_value('kontrak_no'),'kontrak_tanggal'=> set_value('kontrak_tanggal'),'kontrak_nilai'=> set_value('kontrak_nilai'),'kontrak_mulai'=> set_value('kontrak_mulai'),'kontrak_akhir'=> set_value('kontrak_akhir'),'kode_akun_kegiatan'=> set_value('kode_akun_kegiatan'),'kontrak_jabatan_wakil'=> set_value('kontrak_jabatan_wakil'),'kontrak_wakil_penyedia'=> set_value('kontrak_wakil_penyedia'),'lama_durasi_penyerahan1'=> set_value('lama_durasi_penyerahan1'),'lama_durasi_pemeliharaan'=> set_value('lama_durasi_pemeliharaan'),'kontrak_norekening'=> set_value('kontrak_norekening'),
'kontrak_namarekening'=> set_value('kontrak_namarekening'),
'btk_pembayaran'=> set_value('btk_pembayaran'));      
        $data['rekanan'] = (object) array('id_rekanan'=> set_value('id_rekanan'),'rkn_nama'=> set_value('rkn_nama'),'rkn_alamat'=> set_value('rkn_alamat'),'rkn_npwp'=> set_value('rkn_npwp'),'lhk_no'=> set_value('lhk_no'),'lhk_tanggal'=> set_value('lhk_tanggal'),'lhk_notaris'=> set_value('lhk_notaris'),);
        $data['sel'] = array('satker'=> $this->M_Satker->get_all());
        $data['page'] = 'page/kontrak';
        $data['action'] = base_url('C_Kontrak/store');
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);        
    }
    
    public function store(){
        $this->form_validation->set_rules('lls_id', 'Kode Tender', 'trim|required');
        $this->form_validation->set_rules('kontrak_no', 'Nomor Kontrak', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $paket = $this->input->post(array('id_satker', 'lls_id', 'rup_id', 'metode_pengadaan', 'sbd_id', 'ang_tahun', 'pkt_nama', 'pkt_pagu', 'tanggal_awal_pengadaan', 'jadwal_awal_pengumuman', 'pkt_lokasi', 'alamat_lokasi', 'latitude', 'longitude',));
            $rekanan = $this->input->post(array('rkn_nama', 'rkn_alamat', 'rkn_npwp', 'lhk_no', 'lhk_tanggal', 'lhk_notaris'));
            $kontrak = $this->input->post(array('kontrak_no', 'kontrak_tanggal', 'kontrak_nilai', 'kontrak_mulai', 'kode_akun_kegiatan', 'kontrak_jabatan_wakil', 'kontrak_wakil_penyedia', 'lama_durasi_penyerahan1', 'lama_durasi_pemeliharaan'));
            $kontrak['id_paket'] = $this->M_Paket->insert_id($paket, array('lls_id' => $paket['lls_id']));
            $kontrak['id_rekanan'] = $this->M_Rekanan->insert_id($rekanan, array('rkn_npwp' => $rekanan['rkn_npwp']));
            if($this->M_Kontrak->insert($kontrak,array('kontrak_no'=>$kontrak['kontrak_no']))) {
                $this->index();
            } else {
                $this->create();
            }
        }
    }
    
    public function edit($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['paket'] = $this->M_Paket->get_by_id($data['kontrak']->id_paket);
        $data['rekanan']= $this->M_Rekanan->get_by_id($data['kontrak']->id_rekanan);
        $data['sel'] = array('satker'=> $this->M_Satker->get_all());
        $data['page'] = 'page/kontrak';
        $data['action'] = base_url('C_Kontrak/store_edit/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Ubah';
        $this->load->view('main',$data);  
    }
    
    public function store_edit($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $this->form_validation->set_rules('lls_id', 'Kode Tender', 'trim|required');
        $this->form_validation->set_rules('kontrak_no', 'Nomor Kontrak', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($data['kontrak']->id_kontrak);
        } else {
            $paket = $this->input->post(array('id_satker', 'lls_id', 'rup_id', 'metode_pengadaan', 'sbd_id', 'ang_tahun', 'pkt_nama', 'pkt_pagu', 'tanggal_awal_pengadaan', 'jadwal_awal_pengumuman', 'pkt_lokasi', 'alamat_lokasi', 'latitude', 'longitude',));
            $rekanan = $this->input->post(array('rkn_nama', 'rkn_alamat', 'rkn_npwp', 'lhk_no', 'lhk_tanggal', 'lhk_notaris'));
            $kontrak = $this->input->post(array('kontrak_no', 'kontrak_tanggal', 'kontrak_nilai', 'kontrak_mulai', 'kode_akun_kegiatan', 'kontrak_jabatan_wakil', 'kontrak_wakil_penyedia', 'lama_durasi_penyerahan1', 'lama_durasi_pemeliharaan'));
            $msuk = $this->M_Paket->update($data['kontrak']->id_paket,$paket) && $this->M_Rekanan->update($data['kontrak']->id_rekanan,$rekanan);
            if($msuk && $this->M_Kontrak->update($data['kontrak']->id_kontrak,$kontrak)){
                $this->index();
            }else{
                $this->edit($data['kontrak']->id_kontrak);
            }
        }
    }
    
    public function delete(){
        
    }
    
    public function tarik() {
        $lls_id = $this->input->get('lls_id');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://projek.efm/simantaha/index.php/Pemb_api/api/" . $lls_id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if (curl_error($curl)) {
            echo curl_error($curl);
        } else {
            $result = json_decode($response);
            //print_r(json_decode($response)->data->satker);
            if ($result->result) {
                $satker = $result->data->satker;
                $rekanan = $result->data->rekanan;
                $ppk = $result->data->ppk;
                $pkt = $result->data->paket;
                $kntrk = $result->data->kontrak;
                $pkt->id_satker = $this->M_Satker->insert_id($satker, array('stk_id' => $satker->stk_id));
                $this->M_Ppk->insert_id($ppk, array('ppk_id' => $ppk->ppk_id));
                $kntrk->id_paket = $this->M_Paket->insert_id($pkt, array('lls_id' => $pkt->lls_id));
                $kntrk->id_rekanan = $this->M_Rekanan->insert_id($rekanan, array('rkn_npwp' => $rekanan->rkn_npwp));
                $kntrk->kontrak_akhir = fdatetimetodb(date('Y-m-d', strtotime($kntrk->kontrak_mulai.' + '.$kntrk->lama_durasi_penyerahan1.' days')));
                $this->session->set_flashdata('success', 'Data Berhasil Ditarik');
                $this->edit($this->M_Kontrak->insert_id($kntrk, array('lls_id' => $kntrk->lls_id)));
            } else {
                $this->session->set_flashdata('error_tarik',$result->data);
                redirect('C_Kontrak');
            }
        }
    }

}
