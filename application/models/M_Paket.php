<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Paket extends MY_Model{
    
    var $table = 'paket';
    var $primary = 'id_paket';
    
    public function __construct() {
        parent::__construct();
    }

    public function update($id, $data) {
        $data['tanggal_awal_pengadaan'] = fdatetimetodb($data['tanggal_awal_pengadaan']);
        $data['jadwal_awal_pengumuman'] = fdatetimetodb($data['jadwal_awal_pengumuman']);
        return parent::update($id, $data);
    }
}
