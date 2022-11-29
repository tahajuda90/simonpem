<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends MY_Model{
    
    var $table = 'laporan';
    var $primary = 'id_lapor';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak'));
    }
    
    public function kontrak(){
        return $this->M_Kontrak->get_all();
    }
}