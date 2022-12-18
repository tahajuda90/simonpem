<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends MY_Model{
    
    var $table = 'pembayaran';
    var $primary = 'id_pemb';
    
    public function __construct() {
        parent::__construct();
    }
}