<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_KontrakUser extends MY_Model{
    
    var $table = 'kontrak_user';
    var $primary = 'id_ku';
    
    public function __construct() {
        parent::__construct();
    }
}