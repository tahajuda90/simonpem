<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_LapPeker extends MY_Model {

    var $table = 'laporan_pekerjaan';
    var $primary = 'id_lpkr';

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Pekerjaan'));
    }
    
    public function get_cond($cond, $arr = false) {
        $this->db->select($this->table.".*,".$this->M_Pekerjaan->table.'.uraian_pkrj,'.$this->M_Pekerjaan->table.'.satuan');
        $this->db->join($this->M_Pekerjaan->table,$this->M_Pekerjaan->table.'.id_pkrj = '.$this->table.'.id_pkrj','LEFT');
        return parent::get_cond($cond, $arr);
    }
    
    public function id_only($cond){
        $this->db->select($this->primary);
        return array_column($this->get_cond($cond,true), $this->primary);
    }

}
