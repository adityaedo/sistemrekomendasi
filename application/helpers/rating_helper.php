<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('star_rating')) {
    function star_rating($rating) {
        $star_count = round($rating * 2) / 2;
        $output = '';

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $star_count) {
                $output .= '<i class="fa fa-star" style="color: gold;"></i>'; // Bintang penuh berwarna emas
            } elseif ($i - 0.5 <= $star_count) {
                $output .= '<i class="fa fa-star-half-alt" style="color: gold;"></i>'; // Setengah bintang berwarna emas
            } else {
                $output .= '<i class="fa fa-star" style="color: lightgray;"></i>'; // Bintang kosong berwarna abu-abu
            }
        }

        return $output;
    }
}