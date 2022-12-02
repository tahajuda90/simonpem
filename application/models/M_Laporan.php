<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends MY_Model{
    
    var $table = 'laporan';
    var $primary = 'id_lpr';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Masalah'));
    }
    
    public function kontrak(){
        return $this->M_Kontrak->get_all();
    }
    
    public function insert_id($data, $exist = null) {
        if ($data['kendala'] != null) {
            $data['id_mslh'] = $this->M_Masalah->insert_id(array('id_kontrak' => $data['id_kontrak'], 'tanggal' => $data['tanggal_awal'], 'tahapan' => 'Laporan,' . $data['minggu'] . ',' . $data['bulan'], 'keterangan' => $data['kendala']));
        }        
        unset($data['kendala']);
        $data['tanggal_awal'] = fdatetimetodb($data['tanggal_awal']);
        $data['tanggal_akhir'] = fdatetimetodb($data['tanggal_akhir']);
        return parent::insert_id($data, $exist);
    }
}