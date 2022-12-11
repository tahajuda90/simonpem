<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ringkasan extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Adendum','M_Sanksi','M_PerAkhir','M_Laporan'));
    }
    
    public function kontrak(){
        $this->db->select('COALESCE(sum('.$this->M_Laporan->table.'.realisasi),0) as realisasi,COALESCE(sum('.$this->M_Laporan->table.'.rencana),0) as rencana,COUNT('.$this->M_Adendum->table.'.id_addm) as jml_addm,COUNT('.$this->M_Sanksi->table.'.id_snksi) as jml_snksi,COUNT('.$this->M_PerAkhir->table.'.id_prakhir) as jml_prakhir');
        $this->db->join($this->M_Laporan->table,$this->M_Laporan->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Adendum->table,$this->M_Adendum->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_Sanksi->table,$this->M_Sanksi->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->join($this->M_PerAkhir->table,$this->M_PerAkhir->table.'.id_kontrak = '.$this->M_Kontrak->table.'.id_kontrak','LEFT');
        $this->db->group_by($this->M_Kontrak->table.'.id_kontrak');
        return $this->M_Kontrak->get_all();
    }
}
    
