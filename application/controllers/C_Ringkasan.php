<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Ringkasan extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Ringkasan'));
    }
    
    public function index (){
        $data['kontrak'] = $this->M_Ringkasan->kontrak();
        $data['page'] = 'page/ringkasan';
//        print_r($data);
        $this->load->view('main',$data);
    }
}