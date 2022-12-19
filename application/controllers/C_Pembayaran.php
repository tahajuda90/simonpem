<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pembayaran extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Pembayaran','M_Potongan'));
        $this->load->helper(array('ds_helper'));
    }

    public function index() {
        $data['kontrak'] = $this->M_Pembayaran ->kontrak();
        $data['page'] = 'page/pembayaran';
        $this->load->view('main',$data);
    }

    public function pembayaran($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pembayaran'] = $this->M_Pembayaran->get_cond(array($this->M_Pembayaran->table.'.id_kontrak'=>$data['kontrak']->id_kontrak));
        foreach($data['pembayaran'] as $pb){
            $pb->potongan = $this->M_Potongan->get_cond(array('id_pemb'=>$pb->id_pemb));
        }
        $data['page'] = 'page/pembayaran';
        $this->load->view('main',$data);
    }
    
    public function pembayaran_create($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pembayaran'] = (object) array('btk_pembayaran'=>$data['kontrak']->btk_pembayaran,'no_bap'=> set_value('no_bap'),'tanggal'=> set_value('tanggal'),'jns_pemb'=> set_value('jns_pemb'),'prosentase'=> set_value('prosentase'),'nilai_bayar'=> set_value('nilai_bayar'),'dokumen'=> set_value('dokumen'),'keterangan'=> set_value('keterangan'),'kendala'=>set_value('kendala'));   
        $data['page'] = 'page/pembayaran';
        $data['action'] = base_url('C_Pembayaran/store/'.$data['kontrak']->id_kontrak);
        $data['button'] = 'Simpan';
        $this->load->view('main',$data);
    }
    
    public function store($id_kontrak){
        $this->form_validation->set_rules('no_bap', 'Nomor Berita Acara Pembayaran', 'trim|required');
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('pembayaran/create/'.$data['kontrak']->id_kontrak));
        }else{
            $bayar = $this->input->post(array('no_bap','tanggal','jns_pemb','prosentase','nilai_bayar','dokumen','keterangan'));
            $bayar['id_kontrak'] = $data['kontrak']->id_kontrak;
            $this->upload();
            $done = true;
            if(isset($_FILES['dokumen']['name'])){
                $this->upload->do_upload('dokumen');
                $bayar['dokumen'] = $this->upload->data('file_name');
                $id_pemb = $this->M_Pembayaran->insert_id($bayar);
                if(!empty($this->input->post('jns_pot[]'))){
                    $jns = $this->input->post('jns_pot[]');
                    $nl = $this->input->post('nilai_pot[]');
                    foreach($jns as $key=>$value){
                        $this->M_Potongan->insert(array('id_pemb'=>$id_pemb,'id_kontrak'=>$data['kontrak']->id_kontrak,'jns_pot'=> strtolower($value),'nilai_pot'=>$nl[$key]));
                    }
                }
                $done = true;
            }else{
                $done = false;
            }
            if($done){
                redirect(base_url('pembayaran/list/'.$data['kontrak']->id_kontrak));
            }else{
                redirect(base_url('pembayaran/create/'.$data['kontrak']->id_kontrak));
            }
        }        
    }
    
    public function pembayaran_update($id_pemb){
        $data['pembayaran'] = $this->M_Pembayaran->get_by_id($id_pemb);   
        $data['potongan'] = $this->M_Potongan->get_cond(array('id_pemb'=>$data['pembayaran']->id_pemb));
        $data['page'] = 'page/pembayaran';
        $data['action'] = base_url('C_Pembayaran/store_edit/'.$data['pembayaran']->id_pemb);
        $data['button'] = 'Ubah';
        $this->load->view('main',$data);
    }
    
    public function store_edit($id_pemb){
        
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
