<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Adendum extends MY_Model {

    var $table = 'adendum';
    var $primary = 'id_addm';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Masalah'));
    }
    
    public function kontrak(){
        $this->db->select('count('.$this->table.'.id_addm'.') as jml_addm');
        $this->db->join($this->table,$this->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->M_Kontrak->get_all();
    }
    
    public function insert($data, $exist = null) {
        $kontrak = $this->M_Kontrak->get_by_id($data['id_kontrak']);
        if ($data['kendala'] != null) {
            $data['id_mslh'] = $this->M_Masalah->insert_id(array('id_kontrak' => $data['id_kontrak'],'tanggal' => fdatetimetodb($data['tanggal_adendum']),'tahapan' => 'adendum','keterangan' => $data['kendala']));
        }        
        unset($data['kendala']);
        $data['tanggal_adendum'] = fdatetimetodb($data['tanggal_adendum']);
        $this->M_Kontrak->update($kontrak->id_kontrak,array('kontrak_mulai'=>$kontrak->kontrak_mulai,'lama_durasi_penyerahan1'=>$data['lama_durasi_penyerahan1'],'lama_durasi_pemeliharaan'=>$data['lama_durasi_pemeliharaan'],'kontrak_nilai'=>$data['kontrak_nilai'],'btk_pembayaran'=>$data['btk_pembayaran']));
        return parent::insert($data, $exist);
    }
    
    public function update($id, $data) {
        $add = $this->get_by_id($id);
        $kontrak = $this->M_Kontrak->get_by_id($add->id_kontrak);
        if ($data['kendala'] != null) {            
            $this->M_Masalah->update($add->id_mslh,array('tanggal' => fdatetimetodb($data['tanggal_adendum']),'tahapan' => 'adendum','keterangan' => $data['kendala']));
        }
        unset($data['kendala']);
        $data['tanggal_adendum'] = fdatetimetodb($data['tanggal_adendum']);
        $this->M_Kontrak->update($kontrak->id_kontrak,array('kontrak_mulai'=>$kontrak->kontrak_mulai,'lama_durasi_penyerahan1'=>$data['lama_durasi_penyerahan1'],'lama_durasi_pemeliharaan'=>$data['lama_durasi_pemeliharaan'],'kontrak_nilai'=>$data['kontrak_nilai'],'btk_pembayaran'=>$data['btk_pembayaran']));
        return parent::update($id, $data);
    }
    
    public function get_cond($cond, $arr = false) {
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        return parent::get_cond($cond, $arr);
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Masalah->table.'.keterangan as kendala');
        $this->db->join($this->M_Masalah->table,$this->M_Masalah->table.'.id_mslh = '.$this->table.'.id_mslh','LEFT');
        return parent::get_by_id($id);
    }

}
