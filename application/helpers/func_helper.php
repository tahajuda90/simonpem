<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function fdatetodb($x){
		return date('Y-m-d',strtotime($x));
	}
	function fdatetimetodb($x){
		return date('Y-m-d H:i:s',strtotime($x));
	}
	function fdate($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d-m-Y',strtotime($x));
	}
	function fdatebulan($bln){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$result = $BulanIndo[(int) $bln - 1] ;
		return $result;
	}
	function fdateindo($x){
		$dt = date('Y-m-d',strtotime($x));
		$tm = date('H:i:s',strtotime($x));
		$time = $tm=='00:00:00'?'':date(' h:i A',strtotime($tm));
		$bulan = array (1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split = explode('-', $dt);
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].$time;
	}
	function fdatetime($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d/m/Y h:i A',strtotime($x));
	}
	function fdateformat($format,$x){
		return date($format,strtotime($x));
	}
        
        function fdatetahun($x){
            return date("Y", strtotime($x));
        }
	
	function diffdate($datetime,$fix=null, $full = false) {
		if($fix==null)$fix=date('Y-m-d H:i:s');
		$now = new DateTime($fix);
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . '.' : 'just now';
	}
        function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
        }
        
        function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
         $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
         $suffix = ' Ribu';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
         $suffix = ' Juta';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
         $suffix = ' Miliar';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
         $suffix = ' Triliun';
    }
 
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format ).$suffix;
    }
 
    return $n_format;
}
function prosentase($target, $total) {
    $hasil = 0;
    if($total > 0){
        $hasil = round(($target / $total) * 100); 
    }
    return $hasil;
}

function filterArrayByKeyValue($array, $key, $keyValue) {
    return array_filter($array, function ($value) use ($key, $keyValue) {
        return $value[$key] == $keyValue;
    });
}

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
        
        function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

function load_menu($group=null){
    $menu = [];
    $menu['dashboard']['menu'] = 'Dashboard';
    $menu['dashboard']['link'] = 'home';
    switch ($group):
        case 'admin':
            $menu['user']['menu'] = 'User Manajemen';
            $menu['user']['link'] = 'user';            
            $menu['master']['menu'] = 'Master';
            $menu['master']['sub']['kontrak'] = 'Kontrak';
            $menu['master']['sub']['skpd'] = 'Satuan Kerja';
            $menu['master']['sub']['penyedia'] = 'Penyedia';
            $menu['laporan']['menu'] = 'Laporan';
            $menu['laporan']['sub']['realisasi'] = 'Realisasi Pekerjaan';
            $menu['laporan']['sub']['adendum'] = 'Adendum Pekerjaan';
            $menu['laporan']['sub']['pembayaran'] = 'Berita Acara Pembayaran';
            $menu['laporan']['sub']['perhitungan'] = 'Berita Acara Perhitungan';
            $menu['monitoring']['menu'] = 'Monitoring';
            $menu['monitoring']['sub']['ringkasan'] = 'Ringkasan Kontrak';
            $menu['monitoring']['sub']['ringkasan/progress'] = 'Ringkasan Progress Pekerjaan';
            $menu['monitoring']['sub']['ringkasan/realisasi'] = 'Ringkasan Realisasi Pekerjaan';
            break;
        case 'operator':
            $menu['master']['menu'] = 'Master';
            $menu['master']['sub']['kontrak'] = 'Kontrak';
            $menu['master']['sub']['skpd'] = 'Satuan Kerja';
            $menu['master']['sub']['penyedia'] = 'Penyedia';
            $menu['laporan']['menu']='Laporan';
            $menu['laporan']['sub']['realisasi'] = 'Realisasi Pekerjaan';
            $menu['laporan']['sub']['adendum'] = 'Adendum Pekerjaan';
            $menu['laporan']['sub']['pembayaran'] = 'Berita Acara Pembayaran';
            $menu['laporan']['sub']['perhitungan'] = 'Berita Acara Perhitungan';
            $menu['monitoring']['menu'] = 'Monitoring';
            $menu['monitoring']['sub']['ringkasan'] = 'Ringkasan Kontrak';
            $menu['monitoring']['sub']['ringkasan/progress'] = 'Ringkasan Progress Pekerjaan';
            $menu['monitoring']['sub']['ringkasan/realisasi'] = 'Ringkasan Realisasi Pekerjaan';
            break;
        case 'skpd':
            $menu['kontrak']['menu'] = 'Kontrak';
            $menu['kontrak']['link'] = 'kontrak'; 
            $menu['laporan']['menu'] = 'Laporan';
            $menu['laporan']['sub']['realisasi'] = 'Realisasi Pekerjaan';
            $menu['laporan']['sub']['adendum'] = 'Adendum Pekerjaan';
            $menu['laporan']['sub']['pembayaran'] = 'Berita Acara Pembayaran';
            $menu['laporan']['sub']['perhitungan'] = 'Berita Acara Perhitungan';
            $menu['monitoring']['menu'] = 'Monitoring';
            $menu['monitoring']['sub']['ringkasan'] = 'Ringkasan Kontrak';
            $menu['monitoring']['sub']['ringkasan/progress'] = 'Ringkasan Progress Pekerjaan';
            $menu['monitoring']['sub']['ringkasan/realisasi'] = 'Ringkasan Realisasi Pekerjaan';
            break;
        case 'auditor':
            $menu['laporan']['menu'] = 'Laporan';
            $menu['laporan']['sub']['realisasi'] = 'Realisasi Pekerjaan';
            $menu['laporan']['sub']['adendum'] = 'Adendum Pekerjaan';
            $menu['laporan']['sub']['pembayaran'] = 'Berita Acara Pembayaran';
            $menu['laporan']['sub']['perhitungan'] = 'Berita Acara Perhitungan';
            $menu['monitoring']['menu'] = 'Monitoring';
            $menu['monitoring']['sub']['ringkasan'] = 'Ringkasan Kontrak';
            $menu['monitoring']['sub']['ringkasan/progress'] = 'Ringkasan Progress Pekerjaan';
            $menu['monitoring']['sub']['ringkasan/realisasi'] = 'Ringkasan Realisasi Pekerjaan';
            break;
    endswitch;
    return $menu;
}
