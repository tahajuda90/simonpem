<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kontrak extends MY_Model{
    
    var $table = 'kontrak';
    var $primary = 'id_kontrak';
    
    public function __construct() {
        parent::__construct();
    }
}


