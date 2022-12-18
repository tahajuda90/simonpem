<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'C_Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['user'] = 'Akses/index';
$route['user/create'] = 'Akses/create_user';
$route['user/update/(:any)'] = 'Akses/edit_user/$1';
$route['user/passwd'] = 'Akses/change_password';
$route['login'] = 'Akses/login';

$route['home'] = 'C_Dashboard/index';

$route['kontrak'] = 'C_Kontrak/index';
$route['kontrak/create'] = 'C_Kontrak/create';
$route['kontrak/edit/(:any)'] = 'C_Kontrak/edit/$1';

$route['skpd'] = 'C_SatuanKerja/index';
$route['skpd/create'] = 'C_SatuanKerja/create';
$route['skpd/edit/(:any)'] = 'C_SatuanKerja/edit/$1';

$route['penyedia'] = 'C_Rekanan/index';
$route['penyedia/create'] = 'C_Rekanan/create';
$route['penyedia/edit/(:any)'] = 'C_Rekanan/edit/$1';

$route['realisasi'] = 'C_Realisasi/index';
$route['realisasi/create/(:any)'] = 'C_Realisasi/realisasi_create/$1';
$route['realisasi/edit/(:any)'] = 'C_Realisasi/realisasi_edit/$1';
$route['realisasi/list/(:any)'] = 'C_Realisasi/realisasi/$1';

$route['adendum'] = 'C_Adendum/index';
$route['adendum/create/(:any)'] = 'C_Adendum/adendum_create/$1';
$route['adendum/edit/(:any)'] = 'C_Adendum/adendum_update/$1';
$route['adendum/list/(:any)'] = 'C_Adendum/adendum/$1';

$route['sanksi'] = 'C_Sanksi/index';
$route['sanksi/create/(:any)'] = 'C_Sanksi/sanksi_create/$1';
$route['sanksi/edit/(:any)'] = 'C_Sanksi/sanksi_update/$1';
$route['sanksi/list/(:any)'] = 'C_Sanksi/sanksi/$1';

$route['perhitungan'] = 'C_Perhitungan/index';
$route['perhitungan/create/(:any)'] = 'C_Perhitungan/hitung_create/$1';
$route['perhitungan/edit/(:any)'] = 'C_Perhitungan/hitung_update/$1';
$route['perhitungan/list/(:any)'] = 'C_Perhitungan/hitung/$1';

$route['ringkasan'] = 'C_Ringkasan';
$route['ringkasan/progress'] = 'C_Ringkasan/progress';
$route['ringkasan/realisasi'] = 'C_Ringkasan/realisasi';

