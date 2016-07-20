<?php
namespace App\Classes;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AllClass {
	public function GetID($table, $kolom, $awal) {
	 		// menjadikannya array
			$datakode = DB::table($table)->max($kolom);
			// jika $datakode
			if ($datakode) {
			// membuat variabel baru untuk mengambil kode barang mulai dari 1
			$nilaikode = substr($datakode, strlen($awal));
			// menjadikan $nilaikode ( int )
			$kode = (int) $nilaikode;
			// setiap $kode di tambah 1
			$kode = $kode + 1;
			// hasil untuk menambahkan kode 
			// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
			// atau angka sebelum $kode
			// return $nilaikode;
			return ($awal.str_pad($kode, 10, "0", STR_PAD_LEFT));
			} else {
			return ($awal."0000000001");
	  		}
	}
}