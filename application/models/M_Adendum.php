<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Adendum extends MY_Model {

    var $table = 'adendum';
    var $primary = 'id_addm';
    
    public function __construct() {
        parent::__construct();
    }

}
