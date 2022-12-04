<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerAkhir extends MY_Model{
    
    var $table = 'perhitungan_akhir';
    var $primary = 'id_prakhir';
    
    public function __construct() {
        parent::__construct();
    }
}