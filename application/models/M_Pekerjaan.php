<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pekerjaan extends MY_Model{
    
    var $table = 'pekerjaan';
    var $primary = 'id_pkrj';
    
    public function __construct() {
        parent::__construct();
    }
}
