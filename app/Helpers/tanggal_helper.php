<?php

if (!function_exists('format_tanggal_indo')) {
    /**
     * Format tanggal ke bahasa Indonesia
     * Contoh: 2026-01-20 -> 20 Januari 2026
     * 
     * @param string $date (Y-m-d)
     * @return string
     */
    function format_tanggal_indo($date)
    {
        if($date == '0000-00-00' || empty($date)) return '-';
        
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
     
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;     
        return($result);
    }
}

if (!function_exists('format_hari_tanggal')) {
    /**
     * Format hari dan tanggal ke bahasa Indonesia
     * Contoh: Senin, 20 Januari 2026
     */
    function format_hari_tanggal($date) {
        if($date == '0000-00-00' || empty($date)) return '-';

        $hari = date('D', strtotime($date));
        $daftar_hari = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        return $daftar_hari[$hari] . ', ' . format_tanggal_indo($date);
    }
}
