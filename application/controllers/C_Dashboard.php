<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data['page'] = 'page/dashboard';
        $this->load->view('main',$data);
    }
}