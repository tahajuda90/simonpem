<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Ringkasan'));
    }
    
    public function index(){
        $data['page'] = 'page/dashboard';
        $data['satker'] = $this->M_Satker->get_all();
        $data['grafik'] = $this->data(array($this->M_Kontrak->table.'.kontrak_akhir <='=> fdatetimetodb(date('d-m-Y'))));
        $this->load->view('main',$data);
    }
    
    function data($cond=null){
        $data = $this->M_Ringkasan->satker($cond);
        $stk = array_column($data, 'stk_nama');
        $rcn = array_column($data, 'rencana');
        $rls = array_column($data, 'realisasi');
//        print_r(json_encode(array('legend'=>array('Rencana','Realisasi'),'label'=>$stk,'data1'=>$rcn,'data2'=>$rls)));
        return json_encode(array('label'=>$stk,'legend'=>array('Rencana','Realisasi'),'data'=>array($rcn,$rls)));
    }
}