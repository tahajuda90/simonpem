<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Workflow extends MY_Model{
    
    var $table = 'workflow';
    var $primary = 'id_wf';
    
    public function __construct() {
        parent::__construct();
    }
}