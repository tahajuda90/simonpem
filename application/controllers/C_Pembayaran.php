<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pembayaran extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function pembayaran() {
        
    }
    
    public function pembayaran_create() {
        
    }
    
    public function store(){
        
        
    }
    
    public function pembayaran_update(){
        
    }
    
    public function store_edit(){
        
    }
    
    public function delete(){
        
    }

    function upload() {
        $uplpath = FCPATH . '/assets/dokumen/';
        if (!is_dir($uplpath)) {
            mkdir($uplpath, 0777, TRUE);
        }
        $config['upload_path'] = $uplpath;
        $config['allowed_types'] = 'pdf';
//		$config['max_size']             = 10000;
        $config['encrypt_name'] = TRUE;
//                $config['file_name']            = 'custom';

        $this->load->library('upload', $config);
    }

}
