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
    
    public function adendum($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['adendum'] = $this->M_Adendum->get_cond(array($this->M_Adendum->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        $data['page'] = 'page/adendum';
        $this->load->view('main',$data);
    }
    
    public function adendum_create($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['adendum'] = (object) array('nmr_adendum'=> set_value('nmr_adendum'),'tanggal_adendum'=> set_value('tanggal_adendum'),'lama_durasi_penyerahan1'=> set_value('lama_durasi_penyerahan1'),'lama_durasi_pemeliharaan'=> set_value('lama_durasi_pemeliharaan'),'kontrak_nilai'=> set_value('kontrak_nilai'),'btk_pembayaran'=> set_value('btk_pembayaran'),'dokumen'=> set_value('dokumen'),'kendala'=> set_value('kendala'));   
        $data['page'] = 'page/adendum';
        $data['action'] = base_url('C_Adendum/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store($id_kontrak){
        $this->form_validation->set_rules('nmr_adendum', 'Nomor Adendum', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('C_Adendum/adendum_create/'.$data['kontrak']->id_kontrak));
        }else{
            $post = $this->input->post(array('nmr_adendum','tanggal_adendum','lama_durasi_penyerahan1','lama_durasi_pemeliharaan','kontrak_nilai','btk_pembayaran','kendala'));
            $lama = array('id_kontrak'=>$data['kontrak']->id_kontrak,'durasi_lama'=>$data['kontrak']->lama_durasi_penyerahan1,'pemeliharaan_lama'=>$data['kontrak']->lama_durasi_pemeliharaan,'nilai_lama'=>$data['kontrak']->kontrak_nilai,'pbyr_lama'=>$data['kontrak']->btk_pembayaran);
            $adendum = array_merge($post,$lama);
            $this->upload();
            $done = true;
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $adendum['dokumen'] = $this->upload->data('file_name');
                $this->M_Adendum->insert($adendum);
                $done = true;
            }else{
                $done = false;
            }
            if($done){
                redirect(base_url('C_Adendum/adendum/'.$data['kontrak']->id_kontrak));
            }else{
                redirect(base_url('C_Adendum/adendum_create/'.$data['kontrak']->id_kontrak));
            }
        }
    }
    
    public function adendum_update($id_addm){    
        $data['adendum'] = $this->M_Adendum->get_by_id($id_addm);  
        $data['page'] = 'page/adendum';
        $data['action'] = base_url('C_Adendum/store_edit/'.$data['adendum']->id_addm);
        $data['button'] = 'Update';
        $this->load->view('main',$data);
    }
    
    public function store_edit(){
        
    }
    
    public function delete(){
        
    }
    
    function upload(){
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