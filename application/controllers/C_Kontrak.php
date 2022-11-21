<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kontrak extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Satker','M_Rekanan','M_Ppk','M_Paket','M_Kontrak'));
    }
    
    public function index(){
        $data['page'] = 'page/kontrak';
        $this->load->view('main',$data);
    }
    
    public function create(){
        $data['page'] = 'page/kontrak';
        $data['action'] = base_url('C_Kontrak/store');
        $this->load->view('main',$data);        
    }
    
    public function store(){
        
    }
    
    public function edit(){
        
    }
    
    public function store_edit(){
        
    }
    
    public function delete(){
        
    }
    
    public function tarik($lls_id) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://projek.efm/simantaha/index.php/Pemb_api/api/" . $lls_id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if (curl_error($curl)) {
            echo curl_error($curl);
        } else {
            $result = json_decode($response);
            //print_r(json_decode($response)->data->satker);
            if($result->result){
            $satker = $result->data->satker;
            $rekanan = $result->data->rekanan;
            $ppk = $result->data->ppk;
            $pkt = $result->data->paket;
            $kntrk = $result->data->kontrak;
            $pkt->id_satker = $this->M_Satker->insert_id($satker,array('stk_id'=>$satker->stk_id));
            $this->M_Ppk->insert_id($ppk,array('ppk_id'=>$ppk->ppk_id));
            $kntrk->id_paket = $this->M_Paket->insert_id($pkt,array('lls_id'=>$pkt->lls_id));
            $kntrk->id_rekanan = $this->M_Rekanan->insert_id($rekanan,array('rkn_npwp'=>$rekanan->rkn_npwp));
            var_dump($this->M_Kontrak->insert_id($kntrk,array('lls_id'=>$kntrk->lls_id)));
            }else{
                echo $result->data;
            }
        }
    }

}
