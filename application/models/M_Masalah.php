<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Masalah extends MY_Model{
    
    var $table = 'permasalahan';
    var $primary = 'id_mslh';
    
    public function __construct() {
        parent::__construct();
    }
}