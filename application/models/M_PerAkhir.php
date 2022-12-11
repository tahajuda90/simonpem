<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerAkhir extends MY_Model{
    
    var $table = 'perhitungan_akhir';
    var $primary = 'id_prakhir';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Masalah','M_Paket'));
    }
    
    public function kontrak(){
        $this->db->select('count('.$this->table.'.id_prakhir'.') as jml_prakhir');
        $this->db->join($this->table,$this->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->M_Kontrak->get_all();
    }
    
    public function insert($data, $exist = null) {
        if ($data['kendala'] != null) {
            $data['id_mslh'] = $this->M_Masalah->insert_id(array('id_kontrak' => $data['id_kontrak'],'tanggal' => fdatetimetodb($data['tanggal_adendum']),'tahapan' => 'perhitungan','keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
        $data['tanggal'] = fdatetimetodb($data['tanggal']);
        return parent::insert($data, $exist);
    }
    
    public function update($id, $data) {
        if ($data['kendala'] != null) {
            $prakhir = $this->get_by_id($id);
            $this->M_Masalah->update($prakhir->id_mslh,array('tanggal' => fdatetimetodb($data['tanggal_adendum']),'tahapan' => 'perhitungan','keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
         $data['tanggal'] = fdatetimetodb($data['tanggal']);
        return parent::update($id, $data);
    }
    
    public function get_cond($cond, $arr = false) {
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        return parent::get_cond($cond, $arr);
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        return parent::get_by_id($id);
    }
}