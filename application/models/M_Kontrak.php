<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kontrak extends MY_Model{
    
    var $table = 'kontrak';
    var $primary = 'id_kontrak';
    var $group = '';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Satker','M_Paket','M_Rekanan','M_KontrakUser'));
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
    }
    
    public function get_all() {
        $this->db->select($this->table.'.*,'.$this->M_Satker->table.'.stk_nama,'.$this->M_Paket->table.'.*');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->table.'.id_paket','LEFT');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->M_Paket->table.'.id_satker','LEFT');
        if($this->group == 'skpd'){
            $this->db->join($this->M_KontrakUser->table, $this->table.'.id_kontrak = '.$this->M_KontrakUser->table.'.id_kontrak','LEFT');
            $this->db->where(array($this->M_KontrakUser->table.'.id_user'=>$this->ion_auth->get_user_id()));
        }
        return parent::get_all();
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Paket->table.'.*,'.$this->M_Satker->table.'.stk_nama,'.$this->M_Rekanan->table.'.*');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->table.'.id_paket','LEFT');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->M_Paket->table.'.id_satker','LEFT');
        $this->db->join($this->M_Rekanan->table,$this->M_Rekanan->table.'.id_rekanan = '.$this->table.'.id_rekanan','LEFT');
        return parent::get_by_id($id);
    }
    
    public function insert_id($data, $exist = null) {
            $data->kontrak_tanggal = fdatetimetodb($data->kontrak_tanggal);
            $data->kontrak_mulai = fdatetimetodb($data->kontrak_mulai);
            $data->kontrak_akhir = fdatetimetodb(date('Y-m-d', strtotime($data->kontrak_mulai . ' + ' . $data->lama_durasi_penyerahan1 . 'days')));
        return parent::insert_id($data, $exist);
    }
    
    public function update($id, $data) {
        $required = array('kontrak_mulai','kontrak_akhir','kontrak_tanggal');
        if(count(array_intersect_key(array_flip($required),$data)) === count($required)){
            $data['kontrak_tanggal'] = fdatetimetodb($data['kontrak_tanggal']);
            $data['kontrak_mulai'] = fdatetimetodb($data['kontrak_mulai']);
            $data['kontrak_akhir'] = fdatetimetodb(date('Y-m-d', strtotime($data['kontrak_mulai'] . ' + ' . $data['lama_durasi_penyerahan1'] . 'days')));
        }            
        return parent::update($id, $data);
    }
}


