<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ringkasan extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Adendum','M_Sanksi','M_PerAkhir','M_Laporan','M_Rekanan','M_Satker','M_Paket'));
    }
    
    function base(){
        $this->db->join($this->M_Laporan->table,$this->M_Laporan->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Adendum->table,$this->M_Adendum->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Sanksi->table,$this->M_Sanksi->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_PerAkhir->table,$this->M_PerAkhir->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        
        return $this->M_Kontrak->get_all();
    }
    
    public function kontrak(){
        $this->db->select('COALESCE(sum('.$this->M_Laporan->table.'.realisasi),0) as realisasi,COALESCE(sum('.$this->M_Laporan->table.'.rencana),0) as rencana,COUNT('.$this->M_Adendum->table.'.id_addm) as jml_addm,COUNT('.$this->M_Sanksi->table.'.id_snksi) as jml_snksi,COUNT('.$this->M_PerAkhir->table.'.id_prakhir) as jml_prakhir');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->base();
    }
    
    public function realisasi($cond=null) {
        $this->db->select($this->M_Rekanan->table.'.rkn_nama,'.$this->M_Rekanan->table.'.rkn_alamat');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        $this->db->join($this->M_Rekanan->table,$this->M_Rekanan->table.'.id_rekanan = '.$this->M_Kontrak->table.'.id_rekanan','LEFT');
        if($cond != null){
            $this->db->where($cond);            
        }
        return $this->kontrak();
    }
    
    public function satker($cond=null){
        $this->db->select($this->M_Satker->table.'.stk_nama,COALESCE(sum('.$this->M_Laporan->table.'.realisasi)/count(distinct('.$this->M_Kontrak->table.'.id_kontrak)),0) realisasi,COALESCE(sum('.$this->M_Laporan->table.'.rencana)/count(distinct('.$this->M_Kontrak->table.'.id_kontrak)),0) rencana');
        $this->db->join($this->M_Paket->table,$this->M_Paket->table.'.id_paket = '.$this->M_Kontrak->table.'.id_paket','LEFT');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->M_Paket->table.'.id_satker','LEFT');
        $this->db->join($this->M_Laporan->table,$this->M_Laporan->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        if($cond != null){
            $this->db->where($cond);            
        }
        $this->db->group_by('satuan_kerja.stk_nama');
        return $this->db->get($this->M_Kontrak->table)->result();
    }
}
    
