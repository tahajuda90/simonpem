<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pekerjaan extends MY_Model{
    
    var $table = 'pekerjaan';
    var $primary = 'id_pkrj';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function id_only($cond){
        $this->db->select($this->primary);
        return array_column($this->get_cond($cond,true), $this->primary);
    }
}
