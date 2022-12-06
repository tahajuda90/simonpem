<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends MY_Model{
    
    var $table = 'laporan';
    var $primary = 'id_lpr';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Masalah','M_Paket','M_Pekerjaan'));
    }
    
    public function kontrak(){
        $this->db->select('count('.$this->table.'.id_lpr) as jml_lpr,count('.$this->M_Pekerjaan->table.'.id_pkrj) as jml_pkrj');
        $this->db->join($this->table,$this->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Pekerjaan->table,$this->M_Pekerjaan->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->M_Kontrak->get_all();
    }
    
    public function insert_id($data, $exist = null) {
        if ($data['kendala'] != null) {
            $data['id_mslh'] = $this->M_Masalah->insert_id(array('id_kontrak' => $data['id_kontrak'], 'tanggal' => fdatetimetodb($data['tanggal_awal']), 'tahapan' => 'Laporan,' . $data['minggu'] . ',' . $data['bulan'], 'keterangan' => $data['kendala']));
        }        
        unset($data['kendala']);
        $data['tanggal_awal'] = fdatetimetodb($data['tanggal_awal']);
        $data['tanggal_akhir'] = fdatetimetodb($data['tanggal_akhir']);
        return parent::insert_id($data, $exist);
    }
    
    public function update($id, $data) {
        if ($data['kendala'] != null) {
            $lpr = $this->get_by_id($id);
            $this->M_Masalah->update($lpr->id_mslh,array('tanggal' => fdatetimetodb($data['tanggal_awal']), 'tahapan' => 'Laporan,' . $data['minggu'] . ',' . $data['bulan'], 'keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
        $data['tanggal_awal'] = fdatetimetodb($data['tanggal_awal']);
        $data['tanggal_akhir'] = fdatetimetodb($data['tanggal_akhir']);
        return parent::update($id, $data);
    }
    
    public function get_cond($cond,$arr=false){
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        return parent::get_cond($cond, $arr);
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala,'.$this->M_Paket->table.'.pkt_nama');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        $this->db->join($this->M_Kontrak->table,$this->M_Kontrak->table.'.id_kontrak = '.$this->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->M_Kontrak->table.'.id_paket','LEFT');
        return parent::get_by_id($id);
    }
}