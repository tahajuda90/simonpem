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


function load_menu($group=null){

}
