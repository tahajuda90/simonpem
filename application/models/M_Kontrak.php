<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kontrak extends MY_Model{
    
    var $table = 'kontrak';
    var $primary = 'id_kontrak';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Satker','M_Paket'));
    }
    
    public function get_all() {
        $this->db->select($this->table.'.*,'.$this->M_Satker->table.'.stk_nama,'.$this->M_Paket->table.'.*');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->table.'.id_paket','LEFT');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->M_Paket->table.'.id_satker','LEFT');
        return parent::get_all();
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Paket->table.'.*');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->table.'.id_paket','LEFT');
        return parent::get_by_id($id);
    }
    
    public function update($id, $data) {
        $data['kontrak_tanggal'] = fdatetimetodb($data['kontrak_tanggal']);
        $data['kontrak_mulai'] = fdatetimetodb($data['kontrak_mulai']);
        $data['kontrak_akhir'] = fdatetimetodb($data['kontrak_akhir']);
        return parent::update($id, $data);
    }
}


