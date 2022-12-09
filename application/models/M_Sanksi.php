<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sanksi extends MY_Model {

    var $table = 'sanksi';
    var $primary = 'id_snksi';

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Masalah','M_Paket'));
    }
    
     public function kontrak(){
        $this->db->select('count('.$this->table.'.id_snksi'.') as jml_snksi');
        $this->db->join($this->table,$this->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->M_Kontrak->get_all();
    }
    
    public function insert($data, $exist = null) {
        if ($data['kendala'] != null) {
            $data['id_mslh'] = $this->M_Masalah->insert_id(array('id_kontrak' => $data['id_kontrak'],'tanggal' => fdatetimetodb($data['tanggal_adendum']),'tahapan' => 'denda','keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
        $data['tanggal'] = fdatetimetodb($data['tanggal']);
        parent::insert($data, $exist);
    }
    
    public function update($id, $data) {
        if ($data['kendala'] != null) {
            $snksi = $this->get_by_id($id);
            $this->M_Masalah->update($snksi->id_mslh,array('tanggal' => fdatetimetodb($data['tanggal']),'tahapan' => 'denda','keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
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
