<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ppk extends MY_Model{
    
    var $table = 'ppk';
    var $primary = 'id_ppk';
    
    public function __construct() {
        parent::__construct();
    }
}
