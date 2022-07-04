<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('Rupiah'))
{
    function Rupiah($angka)
    {
        $jadi = "Rp " . number_format($angka,0,',','.');
        return $jadi;
    }
}	


