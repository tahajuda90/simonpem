<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Paket extends MY_Model{
    
    var $table = 'paket';
    var $primary = 'id_paket';
    
    public function __construct() {
        parent::__construct();
    }
}
