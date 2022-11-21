<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekanan extends MY_Model{
    
    var $table = 'rekanan';
    var $primary = 'id_rekanan';
    
    public function __construct() {
        parent::__construct();
    }
}
