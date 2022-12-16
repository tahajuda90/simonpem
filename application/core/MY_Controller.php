<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Controller extends CI_Controller{
    var $group = '';
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('akses/login', 'refresh');
        }
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
    }
}