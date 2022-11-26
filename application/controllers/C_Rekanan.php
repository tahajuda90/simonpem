<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Rekanan extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rekanan'));
    }
}