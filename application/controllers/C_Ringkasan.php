<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Ringkasan extends MY_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Ringkasan','M_Kontrak','M_Adendum','M_Pembayaran','M_Sanksi','M_PerAkhir','M_Ppk'));
        $this->load->helper('ds_helper');
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
        if(empty($no_registrasi)){
            $tgl =null;
        } else {
            $tgl =fdatetimetodb(date('d-m-Y'));
        }
        if($this->M_Kontrak->update($kontrak->id_kontrak,array('no_registrasi'=>$no_registrasi,'tgl_reg'=>$tgl ))){
            echo json_encode('success');          
        }else{
            echo json_encode('error');
        }
    }
    
    public function progress(){
        $data['kontrak'] = $this->M_Ringkasan->realisasi(array($this->M_Kontrak->table.'.kontrak_akhir >='=> fdatetimetodb(date('d-m-Y'))));
        $data['satker'] = $this->M_Satker->get_all();
        $data['page'] = 'page/ringRealisasi';
        $this->load->view('main',$data);
    }
    
    public function realisasi(){
        $data['kontrak'] = $this->M_Ringkasan->realisasi(array($this->M_Kontrak->table.'.kontrak_akhir <='=> fdatetimetodb(date('d-m-Y'))));
        $data['satker'] = $this->M_Satker->get_all();
        $data['page'] = 'page/ringRealisasi';
        $this->load->view('main',$data);
    }
    
    public function cetak($id_kontrak){
        $this->load->library('pdfgenerator');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['adendum'] = $this->M_Adendum->get_cond(array($this->M_Adendum->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
//        $data['sanksi1'] = $this->M_Sanksi->get_cond(array($this->M_Sanksi->table.'.id_kontrak'=>$data['kontrak']->id_kontrak,$this->M_Sanksi->table.'.jns_sanksi'=>1));
//        $data['sanksi2'] = $this->M_Sanksi->get_cond(array($this->M_Sanksi->table.'.id_kontrak'=>$data['kontrak']->id_kontrak,$this->M_Sanksi->table.'.jns_sanksi'=>2));
        $data['pembayaran'] = $this->M_Pembayaran->get_cond(array($this->M_Pembayaran->table,'.id_kontrak'=>$data['kontrak']->id_kontrak));
        foreach($data['pembayaran'] as $bayar){
            $bayar->potong = $this->M_Potongan->get_cond(array('id_pemb'=>$bayar->id_pemb));
        }
        $data['hitung'] = $this->M_PerAkhir->get_cond(array($this->M_PerAkhir->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['ppk'] = $this->M_Ppk->get_cond(array('ppk_id'=>$data['kontrak']->ppk_id))[0];
        $this->pdfgenerator->generate('component/template',$data);
    }
}