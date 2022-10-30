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

function rating($val,$max){
    if($val!=null){$hasil = floor(($val/$max)*100);}
    $star = array(
        ['a'=>0,'b'=>10,'star'=>'<i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>10,'b'=>20,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>20,'b'=>30,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>30,'b'=>40,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>40,'b'=>50,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>50,'b'=>60,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'],
        ['a'=>60,'b'=>70,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i>'],
        ['a'=>70,'b'=>80,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>'],
        ['a'=>80,'b'=>90,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i>'],
        ['a'=>90,'b'=>100,'star'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>'],
        );
    if($val == 0){
        return '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }else{
        foreach($star as $st){
            if($hasil>$st['a'] && $hasil<=$st['b']){
                return $st['star'];
            }
        }
    }
}

function load_menu($group=null){
            $menu = [];
            
            $menu['dashboard']['menu']='Dashboard';
            $menu['dashboard']['ikon'] = '<i class="fa fa-dashboard"></i>';
            $menu['dashboard']['link'] = 'home';
            if($group == 'admin'){
            $menu['user']['menu']='Manajemen User';
            $menu['user']['ikon'] = '<i class="app-menu__icon fa fa-user-o"></i>';
            $menu['user']['link'] = 'user';
            }
            if(($group == 'admin') OR ($group == 'operator')){
            $menu['penilaian']['menu']='Indikator Penilaian';
            $menu['penilaian']['ikon'] = '<i class="app-menu__icon fa fa-tasks"></i>';
            $menu['penilaian']['sub']['group'] = 'Aspek Penilaian';
            $menu['penilaian']['sub']['kualifikasi'] = 'Kualifikasi Pekerjaan';
            
            $menu['master']['menu']='Master';
            $menu['master']['ikon'] = '<i class="app-menu__icon fa fa-bars"></i>';
            $menu['master']['sub']['satker']='Satuan Kerja';
            $menu['master']['sub']['ppk']='P. Pembuat Komitmen';
            $menu['master']['sub']['bntkusaha']='Bentuk Usaha';
            $menu['master']['sub']['metode']='Metode Pemilihan';
            $menu['master']['sub']['paket']='Paket Pekerjaan';
            
            $menu['lpse']['menu']='Data Live LPSE';
            $menu['lpse']['ikon'] = '<i class="app-menu__icon fa fa-bank"></i>';
            $menu['lpse']['sub']['tdr']='Paket Tender';
            $menu['lpse']['sub']['nontdr']='Paket Non-Tender';
            
            $menu['perusahaan']['menu']='Perusahaan';
            $menu['perusahaan']['ikon'] = '<i class="app-menu__icon fa fa-building-o"></i>';
            $menu['perusahaan']['link'] = 'rekanan';
            
            $menu['skor']['menu']='Penilaian';
            $menu['skor']['ikon'] = '<i class="app-menu__icon fa fa-bar-chart"></i>';
            $menu['skor']['link']='penilaian';}
            else{
            $menu['paket']['menu']='Paket Pekerjaan';
            $menu['paket']['ikon'] = '<i class="app-menu__icon fa fa-briefcase"></i>';
            $menu['paket']['link']='paket';
            
            $menu['skor']['menu']='Penilaian';
            $menu['skor']['ikon'] = '<i class="app-menu__icon fa fa-bar-chart"></i>';
            $menu['skor']['link']='penilaian';
                
            }
            
            return $menu;
        }
