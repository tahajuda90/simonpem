<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Adendum extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Adendum'));
        $this->load->helper(array('ds_helper'));
    }
    
    public function index(){
        $data['kontrak'] = $this->M_Adendum ->kontrak();
        $data['page'] = 'page/adendum';
        $this->load->view('main',$data);
    }
    
    public function adendum(){
        
    }
    
    public function adendum_create($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['adendum'] = (object) array('nmr_adendum'=> set_value('nmr_adendum'),'tanggal_adendum'=> set_value('tanggal_adendum'),'lama_durasi_penyerahan1'=> set_value('lama_durasi_penyerahan1'),'lama_durasi_pemeliharaan'=> set_value('lama_durasi_pemeliharaan'),'kontrak_nilai'=> set_value('kontrak_nilai'),'btk_pembayaran'=> set_value('btk_pembayaran'),'dokumen'=> set_value('dokumen'),'kendala'=> set_value('kendala'));   
        $data['page'] = 'page/adendum';
        $data['action'] = base_url('C_Adendum/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store(){
        
    }
    
    public function adendum_update(){
        
    }
    
    public function store_edit(){
        
    }
    
    public function delete(){
        
    }
}