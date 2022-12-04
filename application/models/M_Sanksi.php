<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends MY_Model {

    var $table = 'sanksi';
    var $primary = 'id_sknsi';

    public function __construct() {
        parent::__construct();
    }
}
