<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Potongan extends MY_Model{
    
    var $table = 'potongan';
    var $primary = 'id_pot';
    
    public function __construct() {
        parent::__construct();
    }
}