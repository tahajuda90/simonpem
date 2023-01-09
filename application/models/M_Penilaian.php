<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penilaian extends MY_Model{
    
    var $table = 'penilaian';
    var $primary = 'id_nilai';
    
    public function __construct() {
        parent::__construct();
    }
}