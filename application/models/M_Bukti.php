<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bukti extends MY_Model{
    
    var $table = 'bukti';
    var $primary = 'id_bkti';
    
    public function __construct() {
        parent::__construct();
    }
}