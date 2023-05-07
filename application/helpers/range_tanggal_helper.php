<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('tanggal')) {
    function randomDate()
    {
        // Convert to timetamps
        $min = new DateTime(date('Y-m-d', strtotime("-8 days")));
        $max = new DateTime(date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')));
        $interval = new DateInterval('P1D');
        $periode = new DatePeriod($min, $interval ,$max);
        $dates = date_format($periode,"D, Y-m-d");
        return $dates;
    }
}